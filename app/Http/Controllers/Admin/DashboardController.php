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
    protected $feesTypes = [
        'engravery' => [
            'name' => 'Top Engravery Set Up',
            'price' => 80
        ],
        'topprint' => [
            'name' => 'Top Print Set Up',
            'price' => 120
        ],
        'bottomprint' => [
            'name' => 'Bottom Print Set Up',
            'price' => 120
        ],
        'carton' => [
            'name' => 'Box print Set Up',
            'price' => 120
        ],
        'cardboard' => [
            'name' => 'Cardboard Set Up',
            'price' => 500
        ],
        // Grip tapes
        'top_print' => [
            'name' => 'Grip Top Print',
            'price' => 30
        ],
        'die_cut' => [
            'name' => 'Grip tape die_cut',
            'price' => 80
        ],
        'carton_print' => [
            'name' => 'Griptape Carton Print',
            'price' => 95
        ],
        'backpaper_print' => [
            'name' => 'Griptape Backpaper Print',
            'price' => 45
        ],
        // Wheel 
        'top_print' => [
            'name' => 'Wheel Top Print',
            'price' => 30
        ],
        'back_print' => [
            'name' => 'Grip tape die_cut',
            'price' => 80
        ],
        'cardboard_print' => [
            'name' => 'Griptape Carton Print',
            'price' => 95
        ],
        'shape_print' => [
            'name' => 'Griptape Backpaper Print',
            'price' => 45
        ],
    ];
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

        $startdate = "";
        $enddate = "";
        
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $shipinfo = ShipInfo::where('created_by','=',$user['id'])->first();
            $users = User::select('email','name')->get();

            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');

            if($startdate)
                $startdate_temp = $startdate;
            else
                $startdate_temp = "1900-01-01";
            if($enddate)
                $enddate_temp = $enddate;
            else
                $enddate_temp = '2199-12-31';

            $bottomprint_order = Order::whereNotNull('bottomprint')->where('bottomprint','<>','null')->where('bottomprint','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $topprint_order = Order::whereNotNull('topprint')->where('topprint','<>','null')->where('topprint','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $engravery_order = Order::whereNotNull('engravery')->where('engravery','<>','null')->where('engravery','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $cardboard_order = Order::whereNotNull('cardboard')->where('cardboard','<>','null')->where('cardboard','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $carton_order = Order::whereNotNull('carton')->where('carton','<>','null')->where('carton','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

            $orderfile_count = $bottomprint_order + $topprint_order + $engravery_order + $cardboard_order + $carton_order;

            $bottomprint_grip = GripTape::whereNotNull('backpaper_print')->where('backpaper_print','<>','null')->where('backpaper_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $topprint_grip = GripTape::whereNotNull('top_print')->where('top_print','<>','null')->where('top_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $die_grip = GripTape::whereNotNull('die_cut')->where('die_cut','<>','null')->where('die_cut','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $carton_grip = GripTape::whereNotNull('carton_print')->where('carton_print','<>','null')->where('carton_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

            $gripfile_count = $bottomprint_grip + $topprint_grip + $die_grip + $carton_grip;

            $bottomprint_wheel = Wheel::whereNotNull('back_print')->where('back_print','<>','null')->where('back_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $topprint_wheel = Wheel::whereNotNull('top_print')->where('top_print','<>','null')->where('top_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $shape_wheel = Wheel::whereNotNull('shape_print')->where('shape_print','<>','null')->where('shape_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $cardboard_wheel = Wheel::whereNotNull('cardboard_print')->where('cardboard_print','<>','null')->where('cardboard_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $carton_wheel = Wheel::whereNotNull('carton_print')->where('carton_print','<>','null')->where('carton_print','<>','undefined')->where('created_by','=',$user['id'])->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

            $wheelfile_count = $bottomprint_wheel + $topprint_wheel + $shape_wheel + $cardboard_wheel + $carton_wheel;

            $totalfile_count = $orderfile_count + $gripfile_count + $wheelfile_count;
            return view('admin.userdata', ['user' => $user, 'shipinfo' => $shipinfo, 'users' => $users, 'file_upload'=>$totalfile_count, 'startdate' => $startdate, 'enddate' => $enddate]);
            
        }
        $user = Auth::user();
        $shipinfo = ShipInfo::auth()->first();
        session()->flash('error', 'Your order has been successfully sent!');
        $users = User::select('email','name')->get();
        
        $bottomprint_order = Order::auth()->whereNotNull('bottomprint')->where('bottomprint','<>','null')->where('bottomprint','<>','undefined')->count();
        $topprint_order = Order::auth()->whereNotNull('topprint')->where('topprint','<>','null')->where('topprint','<>','undefined')->count();
        $engravery_order = Order::auth()->whereNotNull('engravery')->where('engravery','<>','null')->where('engravery','<>','undefined')->count();
        $cardboard_order = Order::auth()->whereNotNull('cardboard')->where('cardboard','<>','null')->where('cardboard','<>','undefined')->count();
        $carton_order = Order::auth()->whereNotNull('carton')->where('carton','<>','null')->where('carton','<>','undefined')->count();

        $orderfile_count = $bottomprint_order + $topprint_order + $engravery_order + $cardboard_order + $carton_order;

        $bottomprint_grip = GripTape::auth()->whereNotNull('backpaper_print')->where('backpaper_print','<>','null')->where('backpaper_print','<>','undefined')->count();
        $topprint_grip = GripTape::auth()->whereNotNull('top_print')->where('top_print','<>','null')->where('top_print','<>','undefined')->count();
        $die_grip = GripTape::auth()->whereNotNull('die_cut')->where('die_cut','<>','null')->where('die_cut','<>','undefined')->count();
        $carton_grip = GripTape::auth()->whereNotNull('carton_print')->where('carton_print','<>','null')->where('carton_print','<>','undefined')->count();

        $gripfile_count = $bottomprint_grip + $topprint_grip + $die_grip + $carton_grip;

        $bottomprint_wheel = Wheel::auth()->whereNotNull('back_print')->where('back_print','<>','null')->where('back_print','<>','undefined')->count();
        $topprint_wheel = Wheel::auth()->whereNotNull('top_print')->where('top_print','<>','null')->where('top_print','<>','undefined')->count();
        $shape_wheel = Wheel::auth()->whereNotNull('shape_print')->where('shape_print','<>','null')->where('shape_print','<>','undefined')->count();
        $cardboard_wheel = Wheel::auth()->whereNotNull('cardboard_print')->where('cardboard_print','<>','null')->where('cardboard_print','<>','undefined')->count();
        $carton_wheel = Wheel::auth()->whereNotNull('carton_print')->where('carton_print','<>','null')->where('carton_print','<>','undefined')->count();

        $wheelfile_count = $bottomprint_wheel + $topprint_wheel + $shape_wheel + $cardboard_wheel + $carton_wheel;

        $totalfile_count = $orderfile_count + $gripfile_count + $wheelfile_count;

        return view('admin.userdata', ['user' => $user, 'shipinfo' => $shipinfo, 'users' => $users, 'file_upload'=>$totalfile_count, 'startdate' => $startdate, 'enddate' => $enddate]);
        
    }
    public function getSavedBatches(Request $request){
        $user = Auth::user();
        $users = User::select('email','name')->get();

        if($request->isMethod('post')){
            
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
        }
        $createdBy = $user->id;
        $savedOrderBatches = Order::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedGripBatches = GripTape::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedWheelBatches = Wheel::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        return view('admin.savedbatch',compact( 'savedOrderBatches', 'savedGripBatches', 'savedWheelBatches','users','user'));
    }
    public function getSubmitOrder(Request $request ){
        $user = Auth::user();
        if($request->isMethod('post')){
            $saved_date = $request->input('order_id');
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $ordersQuery = Order::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date);
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date);
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date);
            
        }
        else{
            $ordersQuery = Order::auth()->where('submit','=',1);
            $gripQuery = GripTape::auth()->where('submit','=',1);
            $wheelQuery = Wheel::auth()->where('submit','=',1);
        }
        
        $returnorder = $ordersQuery->get();
        $returngrip = $gripQuery->get();
        $returnwheel = $wheelQuery->get();

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
        $users = User::select('email','name')->get();
        //return view('admin.submittedorder', ['fees' => $fees, 'totalOrders' => $totalOrders, 'returnorder'=> $returnorder, 'returngrip'=> $returngrip, 'returnwheel'=> $returnwheel, 'users' => $users, 'user' => $user]);
        
        $user = Auth::user();
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
           $user = User::where('email','=',$email)->first();
           $createdBy = $user['id'];
        }
        else{
            $createdBy = auth()->id();
        }

        $queryOrders = Order::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $queryGrips = GripTape::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $queryWheels = Wheel::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $querySubmitOrders = clone $queryOrders;
        $querySubmitGrips = clone $queryGrips;
        $querySubmitWheels = clone $queryWheels;

        $unSubmitOrders = $queryOrders->where('submit', 0)->get();

        $unSubmitOrders = $unSubmitOrders->toBase()->merge($queryWheels->where('submit', 0)->get());

        $queryGrips->where('submit', 0)->get()->each(function($grip) use (&$unSubmitOrders) {
            $unSubmitOrders->push($grip);
        });

        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();
        
        $querySubmitGrips->where('submit', 1)->addSelect('invoice_number')->get()->each(function($grip) use (&$submitorders) {
            $submitorders->push($grip);
        });

        $submitorders = $submitorders->toBase()->merge($querySubmitWheels->addSelect('invoice_number')->get());

        $shipinfo = ShipInfo::auth()->first();
        $users = User::select('email','name')->get();
        return view('admin.submittedorder', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'users','user', 'fees', 'totalOrders', 'returnorder', 'returngrip', 'returnwheel'));
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
        $user = Auth::user();
        if($request->isMethod('post')){
            $saved_date = $request->input('order_id');
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $ordersQuery = Order::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date);
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date);
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date);
            
        }
        else{
            $ordersQuery = Order::auth()->where('submit','=',0);
            $gripQuery = GripTape::auth()->where('submit','=',0);
            $wheelQuery = Wheel::auth()->where('submit','=',0);
        }
        
        $returnorder = $ordersQuery->get();
        $returngrip = $gripQuery->get();
        $returnwheel = $wheelQuery->get();
        
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
        $totalOrders = $ordersQuery->sum('total') + $gripQuery->sum('total') + $wheelQuery->sum('total') + $sum_fees;

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
        
        $users = User::select('email','name')->get();
        //return view('admin.savedorder', ['fees' => $fees, 'totalOrders' => $totalOrders, 'user' => $user, 'returnorder'=> $returnorder, 'returngrip'=> $returngrip, 'returnwheel'=> $returnwheel, 'users' => $users]);
        
        $user = Auth::user();
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
           $user = User::where('email','=',$email)->first();
           $createdBy = $user['id'];
        }
        else{
            $createdBy = auth()->id();
        }

        $queryOrders = Order::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $queryGrips = GripTape::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $queryWheels = Wheel::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $querySubmitOrders = clone $queryOrders;
        $querySubmitGrips = clone $queryGrips;
        $querySubmitWheels = clone $queryWheels;

        $unSubmitOrders = $queryOrders->where('submit', 0)->get();

        $unSubmitOrders = $unSubmitOrders->toBase()->merge($queryWheels->where('submit', 0)->get());

        $queryGrips->where('submit', 0)->get()->each(function($grip) use (&$unSubmitOrders) {
            $unSubmitOrders->push($grip);
        });

        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();
        
        $querySubmitGrips->where('submit', 1)->addSelect('invoice_number')->get()->each(function($grip) use (&$submitorders) {
            $submitorders->push($grip);
        });

        $submitorders = $submitorders->toBase()->merge($querySubmitWheels->addSelect('invoice_number')->get());

        $shipinfo = ShipInfo::auth()->first();
        $users = User::select('email','name')->get();
        //return view('admin.savedorder', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'users','user'));
        return view('admin.savedorder', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'users','user', 'fees', 'totalOrders', 'returnorder', 'returngrip', 'returnwheel'));
    }


    public function getAnalystic(Request $request){

        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        if($startdate)
            $startdate_temp = $startdate;
        else
            $startdate_temp = "1900-01-01";
        if($enddate)
            $enddate_temp = $enddate;
        else
            $enddate_temp = '2199-12-31';

        $user_count = User::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

        $user_times = User::select('created_at')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->get();
        $total = 0;
        foreach($user_times as $user_time){

            
            $now = strtotime("now");
            $created_at = $user_time['created_at'];
            $created_date = strtotime($created_at);
            $interval = $now - $created_date;
            $total += $interval;
        }

        $order_count = Order::where('submit','=',0)->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

        $bottomprint_order = Order::whereNotNull('bottomprint')->where('bottomprint','<>','null')->where('bottomprint','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $topprint_order = Order::whereNotNull('topprint')->where('topprint','<>','null')->where('topprint','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $engravery_order = Order::whereNotNull('engravery')->where('engravery','<>','null')->where('engravery','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $cardboard_order = Order::whereNotNull('cardboard')->where('cardboard','<>','null')->where('cardboard','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $carton_order = Order::whereNotNull('carton')->where('carton','<>','null')->where('carton','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

        $orderfile_count = $bottomprint_order + $topprint_order + $engravery_order + $cardboard_order + $carton_order;

        $bottomprint_grip = GripTape::whereNotNull('backpaper_print')->where('backpaper_print','<>','null')->where('backpaper_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $topprint_grip = GripTape::whereNotNull('top_print')->where('top_print','<>','null')->where('top_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $die_grip = GripTape::whereNotNull('die_cut')->where('die_cut','<>','null')->where('die_cut','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $carton_grip = GripTape::whereNotNull('carton_print')->where('carton_print','<>','null')->where('carton_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

        $gripfile_count = $bottomprint_grip + $topprint_grip + $die_grip + $carton_grip;

        $bottomprint_wheel = Wheel::whereNotNull('back_print')->where('back_print','<>','null')->where('back_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $topprint_wheel = Wheel::whereNotNull('top_print')->where('top_print','<>','null')->where('top_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $shape_wheel = Wheel::whereNotNull('shape_print')->where('shape_print','<>','null')->where('shape_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $cardboard_wheel = Wheel::whereNotNull('cardboard_print')->where('cardboard_print','<>','null')->where('cardboard_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
        $carton_wheel = Wheel::whereNotNull('carton_print')->where('carton_print','<>','null')->where('carton_print','<>','undefined')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();

        $wheelfile_count = $bottomprint_wheel + $topprint_wheel + $shape_wheel + $cardboard_wheel + $carton_wheel;

        $totalfile_count = $orderfile_count + $gripfile_count + $wheelfile_count;

        return view('admin.analystic', ['user_count' => $user_count, 'order_count' => $order_count, 'filecount' => $totalfile_count, 'total_time' => $total, 'startdate' => $startdate, 'enddate' => $enddate]);
    }

    public function getUploadFiles(Request $request){
        $user = Auth::user();
        $startdate = "";
        $enddate = "";
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();

            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');

            $ordersQuery = Order::where('created_by','=',$user['id']);
            $gripQuery = GripTape::where('created_by','=',$user['id']);
            $wheelQuery = Wheel::where('created_by','=',$user['id']);

            if($startdate){
                $ordersQuery = $ordersQuery->where('created_at','>=',$startdate);
                $gripQuery = $gripQuery->where('created_at','>=',$startdate);
                $wheelQuery = $wheelQuery->where('created_at','>=',$startdate);
            }
            if($enddate){
                $ordersQuery = $ordersQuery->where('created_at','<=',$enddate);
                $gripQuery = $gripQuery->where('created_at','<=',$enddate);
                $wheelQuery = $wheelQuery->where('created_at','<=',$enddate);
            }
            
        }
        else{
            $ordersQuery = Order::auth();
            $gripQuery = GripTape::auth();
            $wheelQuery = Wheel::auth();
        }
        
        $fees = [];
        $sum_fees = 0;

        
        
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
        
        $wheels = (clone $wheelQuery)
            ->get()
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();
        
        $count = 0;
        
        foreach ($orders as $index => $order) {
            $index += 1;
            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes)) continue;
        

                $fees[$count++] = [
                    'image'    => $value,
                    'product'  => 'S.B Deck',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $order['created_at'],
                ];
            }
        }

        foreach ($gripTapes as $index => $grip) {
            $index += 1;

            foreach ($grip as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $fees[$count++] = [
                    'image'    => $value,
                    'product'  => 'S.B Grips',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $grip['created_at'],
                ];

            }
        }

        foreach ($wheels as $index => $wheel) {
            $index += 1;

            foreach ($wheel as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $fees[$count++] = [
                    'image'    => $value,
                    'product'  => 'S.B Wheels',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $wheel['created_at'],
                ];

            }
        }

        
        $users = User::select('email','name')->get();
        return view('admin.uploadfile', compact('users','user', 'fees', 'startdate','enddate'));
    }
}
