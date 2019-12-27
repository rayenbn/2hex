<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;
use Arcanedev\LogViewer\Entities\Log;
use Arcanedev\LogViewer\Entities\LogEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use App\Models\ShipInfo;
use App\Models\{Order, GripTape, Wheel\Wheel};
use Cookie;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users' => \DB::table('users')->count(),
            'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
            'users_inactive' => \DB::table('users')->where('active', false)->count(),
            'protected_pages' => 0,
        ];

        foreach (\Route::getRoutes() as $route) {
            foreach ($route->middleware() as $middleware) {
                if (preg_match("/protection/", $middleware, $matches)) $counts['protected_pages']++;
            }
        }

        return view('admin.dashboard', ['counts' => $counts]);
    }


    public function getLogChartData(Request $request)
    {
        \Validator::make($request->all(), [
            'start' => 'required|date|before_or_equal:now',
            'end' => 'required|date|after_or_equal:start',
        ])->validate();

        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $dates = collect(\LogViewer::dates())->filter(function ($value, $key) use ($start, $end) {
            $value = new Carbon($value);
            return $value->timestamp >= $start->timestamp && $value->timestamp <= $end->timestamp;
        });


        $levels = \LogViewer::levels();

        $data = [];

        while ($start->diffInDays($end, false) >= 0) {

            foreach ($levels as $level) {
                $data[$level][$start->format('Y-m-d')] = 0;
            }

            if ($dates->contains($start->format('Y-m-d'))) {
                /** @var  $log Log */
                $logs = \LogViewer::get($start->format('Y-m-d'));

                /** @var  $log LogEntry */
                foreach ($logs->entries() as $log) {
                    $data[$log->level][$log->datetime->format($start->format('Y-m-d'))] += 1;
                }
            }

            $start->addDay();
        }

        return response($data);
    }

    public function getRegistrationChartData()
    {

        $data = [
            'registration_form' => User::whereDoesntHave('providers')->count(),
            'google' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'google');
            })->count(),
            'facebook' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'facebook');
            })->count(),
            'twitter' => User::whereHas('providers', function ($query) {
                $query->where('provider', 'twitter');
            })->count(),
        ];

        return response($data);
    }

    public function getUserdata(Request $request )
    {
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $shipinfo = ShipInfo::where('created_by','=',$user['id'])->first();
            return view('admin.userdata', ['user' => $user, 'shipinfo' => $shipinfo]);
        }
        $user = Auth::user();
        $shipinfo = ShipInfo::auth()->first();
        session()->flash('error', 'Your order has been successfully sent!');
        return view('admin.userdata', ['user' => $user, 'shipinfo' => $shipinfo]);
        
    }
    public function getSavedBatches(){
        return view('admin.savedbatch');
    }
    public function getSubmitOrder(Request $request ){
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $ordersQuery = Order::where('created_by','=',$user['id']);
            $gripQuery = GripTape::where('created_by','=',$user['id']);
            $wheelQuery = Wheel::where('created_by','=',$user['id']);
        }
        else{
            $ordersQuery = Order::auth();
            $gripQuery = GripTape::auth();
            $wheelQuery = Wheel::auth();
        }
        $fees = [];
        $sum_fees = 0;

        // Set wheel fix cost to main fees array
        $this->calculateWheelFixCost($fees);

        // Order weight
        $gripWeight = (clone $gripQuery)->get()->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        $wheelWeight = $wheelQuery
            ->selectRaw('SUM(quantity * ?) as weight')
            ->addBinding(Wheel::WHEEL_WEIGHT, 'select')
            ->first()
            ->weight;

        // total weight
        $weight = ($ordersQuery->sum('quantity') * Order::SKATEBOARD_WEIGHT) + $gripWeight + $wheelWeight;

        // Fetching all desing by orders
        $orders = (clone $ordersQuery)
            ->get()
            ->map(function($order) {
                return array_filter($order->attributesToArray());
            })
            ->toArray();


        // Fetching all desing by griptapes
        $gripTapes = (clone $gripQuery)
            ->get()
            ->map(function($grip) {
                return array_filter($grip->attributesToArray());
            })
            ->toArray();


        foreach ($orders as $index => $order) {
            $index += 1;
            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $order)) continue;
                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $order['quantity'];
                        continue;
                    }
                } 

                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $order['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $order)) {
                    switch ($order[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'bottomprint' || $key === 'topprint') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * Order::COLOR_COST;
                } else {
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];
                }
            }
        }

        foreach ($gripTapes as $index => $grip) {
            $index += 1;

            foreach ($grip as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $grip)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $grip['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $grip['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $grip)) {
                    switch ($grip[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];
            }
        }

        // Set Global delivery
        if ($ordersQuery->count() || $gripQuery->count() || Wheel::auth()->count()) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image' => auth()->check() ? $weight . ' KG' : '$?.??', 
                'batches' => '', 
                'price' => get_global_delivery($weight), 
                'type' => $weight <= 110 ? 'Worldwide 10-day airfreight' : 'Ocean freight'
            ]);
        }

        // Calculate total price
        foreach ($fees as $key => $value) {
            array_walk($value, function($f, $k) use(&$sum_fees){
                $sum_fees += $f['price'];
            });
        }

        // calculate total 
        $totalOrders = $ordersQuery->sum('total') + GripTape::auth()->sum('total') + Wheel::auth()->sum('total') + $sum_fees;

        $promocode = $ordersQuery->count() ? $ordersQuery->first()->promocode : false;

        if ($promocode) {
            
            $promocode = json_decode($promocode);

            switch ($promocode->type) {
                case Promocode::FIXED :
                    $totalOrders -= $promocode->reward;
                    break;
                
                case Promocode::PERCENT:
                    $totalOrders -= $totalOrders * $promocode->reward / 100;
                    break;
            }
        }

        Cookie::queue('orderTotal', $totalOrders);

        return view('admin.submittedorder', compact('fees', 'totalOrders'));
    }
    protected function calculateWheelFixCost(array &$fees)
    {
        $wheelQuery = Wheel::auth();

        // Fetching all desing by orders
        $wheels = (clone $wheelQuery)
            ->get()
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();

        $feesTypes = [
            'top_print' => [
                'name' => 'SB Wheel Top Print',
            ],
            'back_print' => [
                'name' => 'SB Wheel Back Print',
            ],
            'cardboard_print' => [
                'name' => ' SB Wheel Cardboard Print',
            ],
            'carton_print' => [
                'name' => 'SB Wheel Carton Print',
            ],
            'shape_print' => [
                'name' => 'SB Wheel Сustom Shape',
            ],
        ];

        foreach ($wheels as $index => $wheel) {
            $index += 1;
            foreach ($wheel as $key => $value) {
                if (!array_key_exists($key,  $feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                $wheelKey = 'wheel_' . $key;

                // If same design
                if (array_key_exists($wheelKey, $fees)) {
                    if (array_key_exists($value, $fees[$wheelKey])) {
                        $fees[$wheelKey][$value]['batches'] .= ",{$index}";
                        $fees[$wheelKey][$value]['quantity'] += $wheel['quantity'];
                        continue;
                    }
                } 

                $fees[$wheelKey][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $feesTypes[$key]['name'],
                    'quantity' => $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_colors', $wheel)) {
                    switch ($wheel[$key . '_colors']) {
                        case '1 color':
                            $fees[$wheelKey][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$wheelKey][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$wheelKey][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$wheelKey][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'top_print' || $key === 'back_print') {
                    $fees[$wheelKey][$value]['price'] = $fees[$wheelKey][$value]['color'] * 20 * 1.5;
                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $fees[$wheelKey][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $fees[$wheelKey][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $fees[$wheelKey][$value]['price'] = 80 * $fees[$wheelKey][$value]['color'];
                } else if ($key === 'shape_print'){
                    $fees[$wheelKey][$value]['price'] = 2000;
                } else {
                    $fees[$wheelKey][$value]['price'] = 0;
                }
            }
        }
    }
    public function getSavedOrder(Request $request ){
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $ordersQuery = Order::where('created_by','=',$user['id']);
            $gripQuery = GripTape::where('created_by','=',$user['id']);
            $wheelQuery = Wheel::where('created_by','=',$user['id']);
        }
        else{
            $ordersQuery = Order::auth();
            $gripQuery = GripTape::auth();
            $wheelQuery = Wheel::auth();
        }
        $fees = [];
        $sum_fees = 0;

        // Set wheel fix cost to main fees array
        $this->calculateWheelFixCost($fees);

        // Order weight
        $gripWeight = (clone $gripQuery)->get()->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        $wheelWeight = $wheelQuery
            ->selectRaw('SUM(quantity * ?) as weight')
            ->addBinding(Wheel::WHEEL_WEIGHT, 'select')
            ->first()
            ->weight;

        // total weight
        $weight = ($ordersQuery->sum('quantity') * Order::SKATEBOARD_WEIGHT) + $gripWeight + $wheelWeight;

        // Fetching all desing by orders
        $orders = (clone $ordersQuery)
            ->get()
            ->map(function($order) {
                return array_filter($order->attributesToArray());
            })
            ->toArray();


        // Fetching all desing by griptapes
        $gripTapes = (clone $gripQuery)
            ->get()
            ->map(function($grip) {
                return array_filter($grip->attributesToArray());
            })
            ->toArray();


        foreach ($orders as $index => $order) {
            $index += 1;
            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $order)) continue;
                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $order['quantity'];
                        continue;
                    }
                } 

                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $order['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $order)) {
                    switch ($order[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'bottomprint' || $key === 'topprint') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * Order::COLOR_COST;
                } else {
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];
                }
            }
        }

        foreach ($gripTapes as $index => $grip) {
            $index += 1;

            foreach ($grip as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $grip)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $grip['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $grip['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $grip)) {
                    switch ($grip[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];
            }
        }

        // Set Global delivery
        if ($ordersQuery->count() || $gripQuery->count() || Wheel::auth()->count()) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image' => auth()->check() ? $weight . ' KG' : '$?.??', 
                'batches' => '', 
                'price' => get_global_delivery($weight), 
                'type' => $weight <= 110 ? 'Worldwide 10-day airfreight' : 'Ocean freight'
            ]);
        }

        // Calculate total price
        foreach ($fees as $key => $value) {
            array_walk($value, function($f, $k) use(&$sum_fees){
                $sum_fees += $f['price'];
            });
        }

        // calculate total 
        $totalOrders = $ordersQuery->sum('total') + GripTape::auth()->sum('total') + Wheel::auth()->sum('total') + $sum_fees;

        $promocode = $ordersQuery->count() ? $ordersQuery->first()->promocode : false;

        if ($promocode) {
            
            $promocode = json_decode($promocode);

            switch ($promocode->type) {
                case Promocode::FIXED :
                    $totalOrders -= $promocode->reward;
                    break;
                
                case Promocode::PERCENT:
                    $totalOrders -= $totalOrders * $promocode->reward / 100;
                    break;
            }
        }

        Cookie::queue('orderTotal', $totalOrders);

        return view('admin.savedorder', compact('fees', 'totalOrders'));
    }
}
