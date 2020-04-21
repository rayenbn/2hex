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
use App\Models\{Order, GripTape, Bearing, Wheel\Wheel, ProductionComment, Session, PaidFile, ProductionDate};
use Cookie;
use Itlead\Promocodes\Models\Promocode;
use App\Mail\CommentAddedEmail;
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
            'name' => 'Top Print',
            'price' => 30
        ],
        'die_cut' => [
            'name' => 'Die_cut',
            'price' => 80
        ],
        'carton_print' => [
            'name' => 'Carton Print',
            'price' => 95
        ],
        'backpaper_print' => [
            'name' => 'Backpaper Print',
            'price' => 45
        ],
        // Wheel 
        'back_print' => [
            'name' => 'Back Print',
            'price' => 80
        ],
        'cardboard_print' => [
            'name' => 'CardBoard Print',
            'price' => 95
        ],
        'shape_print' => [
            'name' => 'Shape Print',
            'price' => 45
        ],

        //Bearing
        'race_print' => [
            'name' => 'Race Print',
            'price' => 0
        ],
        'shield_brand_print' => [
            'name' => 'Shield Brand Print',
            'price' => 0
        ],
        'pantone_print' => [
            'name' => 'Packing Print',
            'price' => 0
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

    protected function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function getUserdata(Request $request )
    {

        $startdate = date('Y-m-d',strtotime("-1 years"));
        $enddate = date('Y-m-d',strtotime("+1 days"));
        
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
                $startdate_temp = date('Y-m-d',strtotime("-1 years"));
            if($enddate)
                $enddate_temp = $enddate;
            else
                $enddate_temp = date('Y-m-d',strtotime("+1 days"));

            /*
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
            */

            $ordersQuery = Order::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by','=',$user['id']);
            $gripQuery = GripTape::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by','=',$user['id']);
            $wheelQuery = Wheel::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by','=',$user['id']);
            $bearingQuery = Bearing::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by','=',$user['id']);

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

            $bearings = (clone $bearingQuery)
                ->get()
                ->map(function($bearing) {
                    return array_filter($bearing->attributesToArray());
                })
                ->toArray();
            
            $count = 0;
            
            $totalsize = 0;
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

                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    $folder_name = str_replace('print','',$key);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count - 1]['size'] = $size;
                        $totalsize += $size;
                    }
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

                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    $folder_name = str_replace('_print','',$key);
                    $folder_name = str_replace('_','',$folder_name);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count - 1]['size'] = $size;
                        $totalsize += $size;
                    }
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

                    $folder_name = str_replace('_print','',$key);
                    $folder_name = str_replace('top','front',$folder_name);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count - 1]['size'] = $size;
                        $totalsize += $size;
                    }

                }
            }

            foreach ($bearings as $index => $bearing) {
                $index += 1;

                foreach ($bearing as $key => $value) {

                    if (!array_key_exists($key,  $this->feesTypes)) continue;

                    $fees[$count++] = [
                        'image'    => $value,
                        'product'  => 'S.B Bearing',
                        'type'     => $this->feesTypes[$key]['name'],
                        'date' => $bearing['created_at'],
                    ];

                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    $folder_name = str_replace('_print','',$key);
                    $folder_name = str_replace('_','',$folder_name);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count - 1]['size'] = $size;
                        $totalsize += $size;
                    }
                }
            }

            //$totalsize = $this->formatSizeUnits($totalsize);
            $_data = array();
            foreach ($fees as $v) {
                if (isset($_data[$v['image']])) {
                    // found duplicate
                    continue;
                }
                // remember unique item
                $_data[$v['image']] = $v;
            }
            // if you need a zero-based array, otheriwse work with $_data
            $fees = array_values($_data);

            $count = count($fees);


            $totalsize = $this->formatSizeUnits(array_sum(array_column($fees, 'size')));


            $loginDays = Session::select(\DB::raw('Date(created_at) as date'))->groupBy('date')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by',$user->id)->where('action','login')->get();
            $click = Session::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by',$user->id)->where('action','clicked')->get();
            $clickByDays = Session::select(\DB::raw('Date(created_at) as date'), \DB::raw('count(*) as counts'))->groupBy('date')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by',$user->id)->where('action','clicked')->get();
            $lastlogin = Session::select('created_at')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by',$user->id)->where('action','login')->orderBy('created_at','desc')->first()['created_at'];

            return view('admin.userdata', ['user' => $user, 'shipinfo' => $shipinfo, 'users' => $users, 'file_upload'=>$count, 'startdate' => $startdate, 'click' => $click, 'enddate' => $enddate, 'totalsize' => $totalsize, 'loginDays' => $loginDays, 'lastlogin' => $lastlogin, 'clickByDays' => $clickByDays]);
            
        }
        $user = Auth::user();
        $shipinfo = ShipInfo::auth()->first();
        session()->flash('error', 'Your order has been successfully sent!');
        $users = User::select('email','name')->get();
        /*
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

        */

        $ordersQuery = Order::auth(false);
        $gripQuery = GripTape::auth(false);
        $wheelQuery = Wheel::auth(false);
        $bearingQuery = Bearing::auth(false);

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
        
        $bearings = (clone $bearingQuery)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
            })
            ->toArray();
        
        $count = 0;
        $totalsize = 0;
        
        
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

                //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                $folder_name = str_replace('print','',$key);
                $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                if(\File::exists($path)){
                    $size = \File::size($path);
                    $fees[$count - 1]['size'] = $size;
                    $totalsize += $size;
                }
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

                //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                $folder_name = str_replace('_print','',$key);
                $folder_name = str_replace('_','',$folder_name);
                $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                if(\File::exists($path)){
                    $size = \File::size($path);
                    $fees[$count - 1]['size'] = $size;
                    $totalsize += $size;
                }
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

                //$folder_name = str_replace('_print','',$key);
                //$folder_name = str_replace('top','front',$folder_name);
                //$path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);

                $folder_name = str_replace('_print','',$key);
                $folder_name = str_replace('top','front',$folder_name);
                $path = public_path('uploads/' . $user->name .  '/wheel-' . $folder_name . '/' . $value);
                //$down_path = '/'.'uploads/' . $user->name . '/wheel-' . $folder_name . '/' . $value;
                $size = 0;
                //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                if(\File::exists($path)){
                    $size = \File::size($path);
                    $fees[$count - 1]['size'] = $size;
                    $totalsize += $size;
                }

            }
        }
        
        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $fees[$count++] = [
                    'image'    => $value,
                    'product'  => 'S.B Bearing',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $bearing['created_at'],
                ];

                //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                $folder_name = str_replace('_print','',$key);
                $folder_name = str_replace('_','',$folder_name);
                $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                if(\File::exists($path)){
                    $size = \File::size($path);
                    $fees[$count - 1]['size'] = $size;
                    $totalsize += $size;
                }
            }
        }


        $_data = array();
        foreach ($fees as $v) {
            if (isset($_data[$v['image']])) {
                // found duplicate
                continue;
            }
            // remember unique item
            $_data[$v['image']] = $v;
        }
        // if you need a zero-based array, otheriwse work with $_data
        $fees = array_values($_data);

        $count = count($fees);

        
        
        $totalsize = $this->formatSizeUnits(array_sum(array_column($fees, 'size')));

        //$totalsize = $this->formatSizeUnits($totalsize);
        $loginDays = Session::select(\DB::raw('Date(created_at) as date'))->groupBy('date')->where('created_by',$user->id)->where('action','login')->get();
        $click = Session::where('created_by',$user->id)->where('action','clicked')->get();
        $lastlogin = Session::select('created_at')->where('created_by',$user->id)->where('action','login')->orderBy('created_at','desc')->first()['created_at'];
        $clickByDays = Session::select(\DB::raw('Date(created_at) as date'), \DB::raw('count(*) as counts'))->groupBy('date')->where('created_by',$user->id)->where('action','clicked')->get();
        return view('admin.userdata', ['user' => $user, 'shipinfo' => $shipinfo, 'users' => $users, 'file_upload'=>$count, 'startdate' => $startdate, 'enddate' => $enddate, 'totalsize' => $totalsize, 'loginDays' => $loginDays, 'click' => $click, 'lastlogin' => $lastlogin, 'clickByDays' => $clickByDays]);
        
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
        $savedBearingBatches = Bearing::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $fees = [];

        $orders = Order::where('created_by', $createdBy)->where('saved_batch', 1)
            ->get()
            ->map(function($order) {
                return array_filter($order->attributesToArray());
            })
            ->toArray();


        // Fetching all desing by griptapes
        $gripTapes = GripTape::where('created_by', $createdBy)->where('saved_batch', 1)
            ->get()
            ->map(function($grip) {
                return array_filter($grip->attributesToArray());
            })
            ->toArray();

        $wheels = Wheel::where('created_by', $createdBy)->where('saved_batch', 1)
            ->get()
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();

        $bearings = Bearing::where('created_by', $createdBy)->where('saved_batch', 1)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
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

                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
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

                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        foreach ($wheels as $index => $wheel) {
            $index += 1;

            foreach ($wheel as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $wheel['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if ($key === 'top_print' || $key === 'back_print') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * 20 * 1.5;
                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $fees[$key][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $fees[$key][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $fees[$key][$value]['price'] = 80 * $fees[$key][$value]['color'];
                } else if ($key === 'shape_print'){
                    $fees[$key][$value]['price'] = 2000;
                } else {
                    $fees[$key][$value]['price'] = 0;
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bearing)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $bearing['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bearing['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_color', $bearing)) {
                    switch ($bearing[str_replace('_print','',$key). '_color']) {
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

                if($key != "pantone_print")
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                else if($key == "pantone_print"){
                    $panthone = json_decode($bearing['pantone_color'], true);
                    switch($panthone['title']){
                        case '1 Color':
                            $fees[$key][$value]['price'] = 90;
                            break;
                        case '2 Color':
                            $fees[$key][$value]['price'] = 180;
                            break;
                        case '3 Color':
                            $fees[$key][$value]['price'] = 270;
                            break;
                        case '4 Color':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        default:
                            $fees[$key][$value]['price'] = 0;
                            break;
                    }
                }

                if(!empty(PaidFile::where('created_by', $bearing['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        return view('admin.savedbatch',compact( 'savedOrderBatches', 'savedGripBatches', 'savedWheelBatches', 'savedBearingBatches','users','user', 'fees'));
    }
    public function getSubmitOrder(Request $request ){

        $save_data['usenow'] = 0;

        $user = Auth::user();
        $saved_date = "";
        if($request->isMethod('post')){
            $saved_date = $request->input('order_id');
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $ordersQuery = Order::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            $bearingQuery = Bearing::where('created_by','=',$user['id'])->where('submit','=',1)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            /*Order::where('created_by','=',(string)$user['id'])->where('usenow', '=', 1)->update(['usenow'=>0]);
            GripTape::where('created_by','=',(string)$user['id'])->where('usenow', '=', 1)->update(['usenow'=>0]);
            Wheel::where('created_by','=',(string)$user['id'])->where('usenow', '=', 1)->update(['usenow'=>0]);

            $data = Order::where('created_by','=',$user['id'])->where('saved_date', '=', $saved_date)->get();
            $grips = GripTape::where('created_by','=',$user['id'])->where('saved_date', '=', $saved_date)->get();
            $wheels = Wheel::where('created_by','=',$user['id'])->where('saved_date', '=', $saved_date)->get();

            for($i = 0; $i < count($data); $i ++){
                unset($data[$i]['id']);
                unset($data[$i]['saved_date']);
                unset($data[$i]['usenow']);
                unset($data[$i]['submit']);
                $array = json_decode(json_encode($data[$i]), true);
                Order::insert($array);
            }

            for($i = 0; $i < count($grips); $i ++){
                unset($grips[$i]['id']);
                unset($grips[$i]['saved_date']);
                unset($grips[$i]['usenow']);
                unset($grips[$i]['submit']);
                $array = json_decode(json_encode($grips[$i]), true);
                GripTape::insert($array);
            }

            for($i = 0; $i < count($wheels); $i ++){
                unset($wheels[$i]['wheel_id']);
                unset($wheels[$i]['saved_date']);
                unset($wheels[$i]['usenow']);
                unset($wheels[$i]['submit']);
                $array = json_decode(json_encode($wheels[$i]), true);
                Wheel::insert($array);
            }
            $ordersQuery = Order::where('created_by','=',$user['id'])->where('usenow','=',1);
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('usenow','=',1);
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('usenow','=',1); */
        }
        else{
            $ordersQuery = Order::auth()->where('submit',1)->whereNotNull('saved_date');
            $gripQuery = GripTape::auth()->where('submit',1)->whereNotNull('saved_date');
            $wheelQuery = Wheel::auth()->where('submit',1)->whereNotNull('saved_date');
            $bearingQuery = Bearing::auth()->where('submit',1)->whereNotNull('saved_date');
        }
        
        
        

        

        $returnorder = $ordersQuery->get();
        $returngrip = $gripQuery->get();
        $returnwheel = $wheelQuery->get();
        $returnbearing = $bearingQuery->get();

        $fees = [];
        $sum_fees = 0;

        
        
        // Set wheel fix cost to main fees array
        
        //$this->calculateWheelFixCost($fees, 1);

        // Order weight
        $gripWeight = (clone $gripQuery)->get()->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        $wheelWeight = (clone $wheelQuery)
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
        
        $wheels = (clone $wheelQuery)
            ->get()
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();

        $bearings = (clone $bearingQuery)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
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

                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
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

                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        foreach ($wheels as $index => $wheel) {
            $index += 1;

            foreach ($wheel as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $wheel['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if ($key === 'top_print' || $key === 'back_print') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * 20 * 1.5;
                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $fees[$key][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $fees[$key][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $fees[$key][$value]['price'] = 80 * $fees[$key][$value]['color'];
                } else if ($key === 'shape_print'){
                    $fees[$key][$value]['price'] = 2000;
                } else {
                    $fees[$key][$value]['price'] = 0;
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }


        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bearing)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $bearing['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bearing['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $bearing)) {
                    switch ($bearing[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if($key != "pantone_print")
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                else if($key == "pantone_print"){
                    $panthone = json_decode($bearing['pantone_color'], true);
                    switch($panthone['title']){
                        case '1 Color':
                            $fees[$key][$value]['price'] = 90;
                            break;
                        case '2 Color':
                            $fees[$key][$value]['price'] = 180;
                            break;
                        case '3 Color':
                            $fees[$key][$value]['price'] = 270;
                            break;
                        case '4 Color':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        default:
                            $fees[$key][$value]['price'] = 0;
                            break;
                    }
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        // Set Global delivery
        if (($ordersQuery->count() || $gripQuery->count() || $wheelQuery->count() || $bearingQuery->count()) && $saved_date) {
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
        $totalOrders = $ordersQuery->sum('total') + GripTape::auth()->sum('total') + Wheel::auth()->sum('total') + Bearing::auth()->sum('total') + $sum_fees;

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

        $queryBearings = Bearing::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $querySubmitOrders = clone $queryOrders;
        $querySubmitGrips = clone $queryGrips;
        $querySubmitWheels = clone $queryWheels;
        $querySubmitBearings = clone $queryBearings;

        $unSubmitOrders = $queryOrders->where('submit', 0)->get();

        $unSubmitOrders = $unSubmitOrders->toBase()->merge($queryWheels->where('submit', 0)->get());

        $queryGrips->where('submit', 0)->get()->each(function($grip) use (&$unSubmitOrders) {
            $unSubmitOrders->push($grip);
        });

        $queryBearings->where('submit', 0)->get()->each(function($bearing) use (&$unSubmitOrders) {
            $unSubmitOrders->push($bearing);
        });

        $unSubmitOrders = $unSubmitOrders->unique('saved_date');

        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();
        
        $querySubmitGrips->where('submit', 1)->addSelect('invoice_number')->get()->each(function($grip) use (&$submitorders) {
            $submitorders->push($grip);
        });
        $querySubmitBearings->where('submit', 1)->get()->each(function($bearing) use (&$unSubmitOrders) {
            $unSubmitOrders->push($bearing);
        });

        $submitorders = $submitorders->toBase()->merge($querySubmitWheels->where('submit',1)->addSelect('invoice_number')->get());

        $submitorders = $submitorders->unique('saved_date');
        $submitorders = (Array)json_decode(json_encode($submitorders));
        
        usort($submitorders, function($a, $b) {return strcmp($b->saved_date, $a->saved_date);});

        $shipinfo = ShipInfo::auth()->first();
        $users = User::select('email','name')->get();
        return view('admin.submittedorder', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'users','user', 'fees', 'totalOrders', 'returnorder', 'returngrip', 'returnwheel', 'returnbearing'));
    }
    public function deleteSubmitOrder($id){

        $queryOrders = Order::query()
            ->where('saved_date', $id)
            ->where('submit',1)->delete();

        $queryGrips = GripTape::query()
            ->where('saved_date', $id)
            ->where('submit',1)->delete();

        $queryWheels = Wheel::query()
            ->where('saved_date', $id)
            ->where('submit',1)->delete();
        
        $queryBearings = Wheel::query()
            ->where('saved_date', $id)
            ->where('submit',1)->delete();

        return redirect()->back();

    }
    protected function calculateWheelFixCost(array &$fees, $submit = 2)
    {
        if($submit != 2)
            $wheelQuery = Wheel::auth(false)->where('submit',$submit)->whereNotNull('saved_date');
        else
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

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
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
        $save_data['usenow'] = 0;

        $user = Auth::user();
        $saved_date = "";
        if($request->isMethod('post')){
            $saved_date = $request->input('order_id');
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $ordersQuery = Order::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            $bearingQuery = Bearing::where('created_by','=',$user['id'])->where('submit','=',0)->where('saved_date', '=', $saved_date)->whereNotNull('saved_date');
            
            /*Order::where('created_by','=',(string)$user['id'])->where('usenow', '=', 1)->update(['usenow'=>0]);
            GripTape::where('created_by','=',(string)$user['id'])->where('usenow', '=', 1)->update(['usenow'=>0]);
            Wheel::where('created_by','=',(string)$user['id'])->where('usenow', '=', 1)->update(['usenow'=>0]);
            */
            /*
            $data = Order::where('created_by','=',$user['id'])->where('saved_date', '=', $saved_date)->get();
            $grips = GripTape::where('created_by','=',$user['id'])->where('saved_date', '=', $saved_date)->get();
            $wheels = Wheel::where('created_by','=',$user['id'])->where('saved_date', '=', $saved_date)->get();

            for($i = 0; $i < count($data); $i ++){
                unset($data[$i]['id']);
                unset($data[$i]['saved_date']);
                unset($data[$i]['usenow']);
                unset($data[$i]['submit']);
                $array = json_decode(json_encode($data[$i]), true);
                Order::insert($array);
            }

            for($i = 0; $i < count($grips); $i ++){
                unset($grips[$i]['id']);
                unset($grips[$i]['saved_date']);
                unset($grips[$i]['usenow']);
                unset($grips[$i]['submit']);
                $array = json_decode(json_encode($grips[$i]), true);
                GripTape::insert($array);
            }

            for($i = 0; $i < count($wheels); $i ++){
                unset($wheels[$i]['wheel_id']);
                unset($wheels[$i]['saved_date']);
                unset($wheels[$i]['usenow']);
                unset($wheels[$i]['submit']);
                $array = json_decode(json_encode($wheels[$i]), true);
                Wheel::insert($array);
            }
            $ordersQuery = Order::where('created_by','=',$user['id'])->where('usenow','=',1);
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('usenow','=',1);
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('usenow','=',1);*/
        }
        else{
            $ordersQuery = Order::auth()->whereNotNull('saved_date')->where('submit',0);
            $gripQuery = GripTape::auth()->whereNotNull('saved_date')->where('submit',0);
            $wheelQuery = Wheel::auth()->whereNotNull('saved_date')->where('submit',0);
            $bearingQuery = Bearing::auth()->whereNotNull('saved_date')->where('submit',0);
        }
        
        
        

        

        $returnorder = $ordersQuery->get();
        $returngrip = $gripQuery->get();
        $returnwheel = $wheelQuery->get();
        $returnbearing = $wheelQuery->get();

        $fees = [];
        $sum_fees = 0;

        
        
        // Set wheel fix cost to main fees array
        //$this->calculateWheelFixCost($fees, 0);

        // Order weight
        $gripWeight = (clone $gripQuery)->get()->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        $wheelWeight = (clone $wheelQuery)
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

        $wheels = (clone $wheelQuery)
            ->get()
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();
        
        $bearings = (clone $bearingQuery)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
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

                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
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
                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        

        foreach ($wheels as $index => $wheel) {
            $index += 1;

            foreach ($wheel as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $wheel['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if ($key === 'top_print' || $key === 'back_print') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * 20 * 1.5;
                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $fees[$key][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $fees[$key][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $fees[$key][$value]['price'] = 80 * $fees[$key][$value]['color'];
                } else if ($key === 'shape_print'){
                    $fees[$key][$value]['price'] = 2000;
                } else {
                    $fees[$key][$value]['price'] = 0;
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }


        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bearing)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $bearing['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bearing['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $bearing)) {
                    switch ($bearing[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if($key != "pantone_print")
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                else if($key == "pantone_print"){
                    $panthone = json_decode($bearing['pantone_color'], true);
                    switch($panthone['title']){
                        case '1 Color':
                            $fees[$key][$value]['price'] = 90;
                            break;
                        case '2 Color':
                            $fees[$key][$value]['price'] = 180;
                            break;
                        case '3 Color':
                            $fees[$key][$value]['price'] = 270;
                            break;
                        case '4 Color':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        default:
                            $fees[$key][$value]['price'] = 0;
                            break;
                    }
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        // Set Global delivery
        if (($ordersQuery->count() || $gripQuery->count() || $wheelQuery->count() || $bearingQuery->count()) && $saved_date) {
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
        $totalOrders = $ordersQuery->sum('total') + GripTape::auth()->sum('total') + Wheel::auth()->sum('total') + Bearing::auth()->sum('total') + $sum_fees;

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
        
        $createdBy = $user['id'];

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

        $queryBearings = Bearing::query()
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
        $queryBearings->where('submit', 0)->get()->each(function($bearing) use (&$unSubmitOrders) {
            $unSubmitOrders->push($bearing);
        });

        $unSubmitOrders = $unSubmitOrders->unique('saved_date');
        $unSubmitOrders = json_decode(json_encode($unSubmitOrders));

        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();
        
        $querySubmitGrips->where('submit', 1)->addSelect('invoice_number')->get()->each(function($grip) use (&$submitorders) {
            $submitorders->push($grip);
        });
        $queryBearings->where('submit', 1)->get()->each(function($bearing) use (&$unSubmitOrders) {
            $unSubmitOrders->push($bearing);
        });

        $submitorders = $submitorders->toBase()->merge($querySubmitWheels->where('submit',1)->addSelect('invoice_number')->get());

        $submitorders = $submitorders->unique('saved_date');

        $shipinfo = ShipInfo::auth()->first();
        $users = User::select('email','name')->get();

        usort($unSubmitOrders, function($a, $b) {return strcmp($b->saved_date, $a->saved_date);});
        return view('admin.savedorder', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'users','user', 'fees', 'totalOrders', 'returnorder', 'returngrip', 'returnwheel', 'returnbearing'));
    }


    public function getAnalystic(Request $request){
        
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        if($startdate)
            $startdate_temp = $startdate;
        else{
            $startdate_temp = date('Y-m-d',strtotime("-1 years"));
            $startdate = date('Y-m-d',strtotime("-1 years"));
        }
        if($enddate)
            $enddate_temp = $enddate;
        else{
            $enddate_temp = date('Y-m-d',strtotime("+1 days"));
            $enddate = date('Y-m-d',strtotime("+1 days"));
        }

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


        $clicks = Session::select(\DB::raw('count(*) as click'), \DB::raw('count(*) as total'), 'created_by')->where('action','clicked')->groupBy('created_by')->get();
        $orders = Order::select(\DB::raw('count(*) as savedorder'), \DB::raw('count(*) as total'), 'saved_date', 'created_by')->groupBy('saved_date','created_by')->where('submit',0)->where('usenow',0)->get();

        
        
        /*
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

        */

        $ordersQuery = Order::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp);
        $gripQuery = GripTape::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp);
        $wheelQuery = Wheel::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp);
        $bearingQuery = Bearing::where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp);

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

        $bearings = (clone $bearingQuery)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
            })
            ->toArray();
        
        $count = 0;
        
        $totalsize = 0;
        
        
        foreach ($orders as $index => $order) {
            $index += 1;
            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes)) continue;
        

                $fees[$count++] = [
                    'image'    => $value,
                    'product'  => 'S.B Deck',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $order['created_at'],
                    'created_by' => $order['created_by']
                ];

                $user = User::where('id',$order['created_by'])->first();
                if($user){
                    $folder_name = str_replace('print','',$key);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count-1]['size'] = $size;
                        $totalsize += $size;
                    }
                }
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
                    'created_by' => $grip['created_by']
                ];
                $user = User::where('id',$grip['created_by'])->first();
                if($user){
                    $folder_name = str_replace('_print','',$key);
                    $folder_name = str_replace('_','',$folder_name);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count-1]['size'] = $size;
                        $totalsize += $size;
                    }
                }
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
                    'created_by' => $wheel['created_by']
                ];
                $user = User::where('id',$wheel['created_by'])->first();
                if($user){
                    $folder_name = str_replace('_print','',$key);
                    $folder_name = str_replace('top','front',$folder_name);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count-1]['size'] = $size;
                        $totalsize += $size;
                    }
                }

            }
        }

        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $fees[$count++] = [
                    'image'    => $value,
                    'product'  => 'S.B Bearing',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $bearing['created_at'],
                    'created_by' => $bearing['created_by']
                ];
                $user = User::where('id',$bearing['created_by'])->first();
                if($user){
                    $folder_name = str_replace('_print','',$key);
                    $folder_name = str_replace('_','',$folder_name);
                    $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                    //$path = public_path('uploads/' . $user->name . '/' . $key . '/' . $value);
                    if(\File::exists($path)){
                        $size = \File::size($path);
                        $fees[$count-1]['size'] = $size;
                        $totalsize += $size;
                    }
                }

            }
        }

        $_data = array();
        // foreach ($fees as $v) {
        //     if (isset($_data[$v['image']])) {
        //         // found duplicate
        //         continue;
        //     }
        //     // remember unique item
        //     $_data[$v['image']] = $v;
        // }
        // // if you need a zero-based array, otheriwse work with $_data
        // $fees = array_values($_data);
        $users = User::all();
        $activeDatas = [];

        $count = 0;
        $userids = User::pluck('id');
        
        foreach ($fees as $fee) {

            for($i = 0; $i < count($_data); $i ++){
                if($_data[$i]['image'] == $fee['image'] && $_data[$i]['created_by'] == $fee['created_by'])
                    break;
            }
            if($i == count($_data)){
                $_data[$count] = $fee;
                //if(is_numeric($fee['created_by']) && $fee['created_by'] > 0 && $fee['created_by'] == round($fee['created_by'],0)){
                if(in_array($fee['created_by'], json_decode(json_encode($userids)))){
                    if(isset($activeDatas[$fee['created_by']]['upload'])){
                        $activeDatas[$fee['created_by']]['upload'] ++;
                    }
                    else{
                        $activeDatas[$fee['created_by']] = [];
                        $activeDatas[$fee['created_by']]['upload'] = 1;
                    }
                }                
                $count ++;
            }

        }
        

        //$count = count($fees);


        
        foreach($users as $user){
            $id = $user->id;
            if(!isset($activeDatas[$id]))
                $activeDatas[$id] = [];
            $activeDatas[$id]['name'] = $user->name;
            $activeDatas[$id]['email'] = $user->email;
            $activeDatas[$id]['click'] = Session::where('action','clicked')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by', $id)->count();

            $queryOrders = Order::query()
            ->where('created_by', $id)
            ->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

            $queryGrips = GripTape::query()
                ->where('created_by', $id)
                ->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)
                ->groupBy('saved_date', 'invoice_number', 'saved_name')
                ->whereNotNull('saved_date')
                ->select(['saved_date', 'saved_name']);

            $queryWheels = Wheel::query()
                ->where('created_by', $id)
                ->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)
                ->groupBy('saved_date', 'invoice_number', 'saved_name')
                ->whereNotNull('saved_date')
                ->select(['saved_date', 'saved_name']);

            $queryBearings = Bearing::query()
                ->where('created_by', $id)
                ->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)
                ->groupBy('saved_date', 'invoice_number', 'saved_name')
                ->whereNotNull('saved_date')
                ->select(['saved_date', 'saved_name']);

            $querySubmitOrders = clone $queryOrders;
            $querySubmitGrips = clone $queryGrips;
            $querySubmitWheels = clone $queryWheels;
            $querySubmitBearings = clone $queryBearings;

            $unSubmitOrders = $queryOrders->where('submit', 0)->get();

            $unSubmitOrders = $unSubmitOrders->toBase()->merge($queryWheels->where('submit', 0)->get());

            $queryGrips->where('submit', 0)->get()->each(function($grip) use (&$unSubmitOrders) {
                $unSubmitOrders->push($grip);
            });
            $queryBearings->where('submit', 0)->get()->each(function($bearing) use (&$unSubmitOrders) {
                $unSubmitOrders->push($bearing);
            });

            $unSubmitOrders = $unSubmitOrders->unique('saved_date');

            $activeDatas[$id]['saved_order'] = count($unSubmitOrders);
            $activeDatas[$id]['saved_batch'] = Order::where('created_by', $id)->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('saved_batch', 1)->count() + GripTape::where('created_by', $id)->where('saved_batch', 1)->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count() + Wheel::where('created_by', $id)->where('saved_batch', 1)->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->count();
            $login = Session::select(\DB::raw('Date(created_at) as date'))->groupBy('date')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->where('created_by',$id)->where('action','login')->get();
            $activeDatas[$id]['login_days'] = count($login);

        }


        // var_dump($activeDatas);
        // exit();


        $totalsize = $this->formatSizeUnits(array_sum(array_column($fees, 'size')));

        $signupByDays = User::select(\DB::raw('Date(created_at) as date'), \DB::raw('count(*) as counts'))->groupBy('date')->where('created_at','>=', $startdate_temp)->where('created_at','<=',$enddate_temp)->get();
        
        return view('admin.analystic', ['user_count' => $user_count, 'order_count' => $order_count, 'filecount' => $count, 'total_time' => $total, 'startdate' => $startdate, 'enddate' => $enddate, 'totalsize' => $totalsize, 'signupByDays' => $signupByDays, 'activeDatas' => $activeDatas]);
    }

    public function getUploadFiles(Request $request){
        $user = Auth::user();
        $startdate = date('Y-m-d',strtotime("-1 years"));
        $enddate = date('Y-m-d',strtotime("+1 days"));
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();

            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');

            $ordersQuery = Order::where('created_by','=',$user['id']);
            $gripQuery = GripTape::where('created_by','=',$user['id']);
            $wheelQuery = Wheel::where('created_by','=',$user['id']);
            $bearingQuery = Bearing::where('created_by','=',$user['id']);

            if($startdate){
                $ordersQuery = $ordersQuery->where('created_at','>=',$startdate);
                $gripQuery = $gripQuery->where('created_at','>=',$startdate);
                $wheelQuery = $wheelQuery->where('created_at','>=',$startdate);
                $bearingQuery = $bearingQuery->where('created_at','>=',$startdate);
            }
            if($enddate){
                $ordersQuery = $ordersQuery->where('created_at','<=',$enddate);
                $gripQuery = $gripQuery->where('created_at','<=',$enddate);
                $wheelQuery = $wheelQuery->where('created_at','<=',$enddate);
                $bearingQuery = $bearingQuery->where('created_at','<=',$enddate);
            }
            
        }
        else{
            $ordersQuery = Order::auth(false);
            $gripQuery = GripTape::auth(false);
            $wheelQuery = Wheel::auth(false);
            $bearingQuery = Bearing::auth(false);
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

        $bearings = (clone $bearingQuery)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
            })
            ->toArray();
        
        $count = 0;
        $totalsize = 0;
        
        foreach ($orders as $index => $order) {
            $index += 1;
            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes)) continue;
        

                $folder_name = str_replace('print','',$key);
                $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                $down_path = '/'.'uploads/' . $user->name . '/' . $folder_name . '/' . $value;
                $size = 0;
                if(\File::exists($path)){
                    
                    
                    $size = \File::size($path);
                    
                }
                $totalsize += $size;

                $fees[$count] = [
                    'image'    => $value,
                    'product'  => 'S.B Deck',
                    'type'     => $this->feesTypes[$key]['name'],
                    'key'      => $key,
                    'id'       => $order['id'],
                    'date'     => $order['created_at'],
                    'path'     => $down_path,
                    'size'     => $size,
                    'color'    => 1,
                    'created_by' => $order['created_by']
                ];
                if (array_key_exists($key . '_color', $order)) {
                    switch ($order[$key . '_color']) {
                        case '1 color':
                            $fees[$count]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$count]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$count]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$count]['color'] = 4;
                            break;
                    }
                }
                $count ++;
            }
        }
        foreach ($gripTapes as $index => $grip) {
            $index += 1;

            foreach ($grip as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $folder_name = str_replace('_print','',$key);
                $folder_name = str_replace('_','',$folder_name);
                $path = public_path('uploads/' . $user->name . '/' . $folder_name . '/' . $value);
                $down_path = '/'.'uploads/' . $user->name . '/' . $folder_name . '/' . $value;
                $size = 0;
                if(\File::exists($path))
                    $size = \File::size($path);
                $totalsize += $size;
                $fees[$count] = [
                    'image'    => $value,
                    'product'  => 'S.B Grips',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $grip['created_at'],
                    'key'      => $key,
                    'id'       => $grip['id'],
                    'path'     => $down_path,
                    'size'     => $size,
                    'color'    => 1,
                    'created_by' => $grip['created_by']
                ];

                if (array_key_exists($key . '_color', $grip)) {
                    switch ($grip[$key . '_color']) {
                        case '1 color':
                            $fees[$count]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$count]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$count]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$count]['color'] = 4;
                            break;
                    }
                }
                $count ++;

            }
        }

        foreach ($wheels as $index => $wheel) {
            $index += 1;

            foreach ($wheel as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $folder_name = str_replace('_print','',$key);
                $folder_name = str_replace('top','front',$folder_name);
                $path = public_path('uploads/' . $user->name .  '/wheel-' . $folder_name . '/' . $value);
                $down_path = '/'.'uploads/' . $user->name . '/wheel-' . $folder_name . '/' . $value;
                $size = 0;
                if(\File::exists($path))
                    $size = \File::size($path);
                $totalsize += $size;
                $fees[$count] = [
                    'image'    => $value,
                    'product'  => 'S.B Wheels',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $wheel['created_at'],
                    'key'      => $key,
                    'id'       => $wheel['wheel_id'],
                    'path'     => $down_path,
                    'size'     => $size,
                    'color'    => 1,
                    'created_by' => $order['created_by']
                ];
                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
                        case '1 color':
                            $fees[$count]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$count]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$count]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$count]['color'] = 4;
                            break;
                    }
                }
                $count ++;

            }
        }


        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                $folder_name = str_replace('_print','',$key);
                $folder_name = str_replace('top','front',$folder_name);
                $path = public_path('uploads/' . $user->name .  '/' . $folder_name . '/' . $value);
                $down_path = '/'.'uploads/' . $user->name . '/' . $folder_name . '/' . $value;
                $size = 0;
                if(\File::exists($path))
                    $size = \File::size($path);
                $totalsize += $size;
                $fees[$count] = [
                    'image'    => $value,
                    'product'  => 'S.B Bearing',
                    'type'     => $this->feesTypes[$key]['name'],
                    'date' => $bearing['created_at'],
                    'key'      => $key,
                    'id'       => $bearing['id'],
                    'path'     => $down_path,
                    'size'     => $size,
                    'color'    => 1,
                    'created_by' => $order['created_by']
                ];
                if (array_key_exists(str_replace('_print','',$key) . '_colors', $bearing)) {
                    switch ($bearing[str_replace('_print','',$key) . '_colors']) {
                        case '1 color':
                            $fees[$count]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$count]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$count]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$count]['color'] = 4;
                            break;
                    }
                }
                $count ++;

            }
        }

        //var_dump('first',$fees);
        
        $_data = array();
        $count = 0;
        $totalsize = 0;
        foreach ($fees as $fee) {

            for($i = 0; $i < count($_data); $i ++){
                if($_data[$i]['image'] == $fee['image'] && $_data[$i]['created_by'] == $fee['created_by'])
                    break;
            }
            if($i == count($_data)){
                $_data[$count] = $fee;
                $totalsize += $_data[$count]['size'];
                $_data[$count]['size'] = $this->formatSizeUnits($_data[$count]['size']);
                $imageinfo = PaidFile::where('file_name', $fee['image'])->where('created_by',$fee['created_by'])->first();
                if(isset($imageinfo)){
                    $_data[$count]['paid_date'] = $imageinfo['date'];
                    $_data[$count]['color_qty'] = $imageinfo['color_qty'];
                    $_data[$count]['color_code'] = $imageinfo['color_code'];
                    
                    
                }
                $count ++;
            }

        }

        $fees = $_data;
        $totalsize = $this->formatSizeUnits($totalsize);

        usort($fees, function($a, $b) {return strcmp($b['date'], $a['date']);});


        $users = User::select('email','name')->get();
        return view('admin.uploadfile', compact('users','user', 'fees', 'startdate','enddate', 'totalsize'));
    }

    public function getProduction(Request $request){
        $user = Auth::user();
        $users = User::select('email','name')->get();
        $startdate = date('Y-m-d',strtotime("-1 years"));
        $enddate = date('Y-m-d',strtotime("+1 days"));
        if($request->isMethod('post')){
            
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();
            $selected_order = $request->input('select_order');
            $selected_date = $request->input('select_date');
            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
            $content = $request->input('content');
            $remove_id = $request->input('remove_comment');
            
            $product_date = ProductionDate::where('invoice_name', $selected_order)->first();
            if(isset($product_date['id'])){
                ProductionDate::where('id',$product_date['id'])->update(['start_date'=>$startdate, 'finish_date'=>$enddate]);
            }
            else{
                ProductionDate::insert(['start_date'=>$startdate, 'finish_date'=>$enddate, 'invoice_name'=>$selected_order]);
            }


            if(isset($remove_id)){
                ProductionComment::where('id', $remove_id)->delete();   
            }            
            else if(isset($content) && isset($selected_date)){
                //$exists_comment = ProductionComment::where('date',$selected_date)->where('created_number', $selected_order)->get();
                if(isset($exists_comment) && count($exists_comment) > 0){
                    ProductionComment::where('id',$exists_comment[0]['id'])->update(['comment' => $content]);
                }
                else{
                    ProductionComment::insert(
                        ['date' => $selected_date, 'comment' => $content, 'order_id' => '1', 'created_at' => date("Y-m-d H:i:s"), 'created_number' => $selected_order]
                    );

                    \Mail::to($email)->send(new CommentAddedEmail(['date' => $selected_date, 'comment' => $content,'created_number' => $selected_order, 'name' => $user->name]));
                }
                
            }
            
        }



        $returnorder = Order::where('created_by','=',$user['id'])->select('invoice_number')->where('submit','=',1)->groupBy('invoice_number','saved_date')->orderBy('saved_date','DESC')->get();
        if(!isset($selected_order) && count($returnorder) > 0){
            $selected_order = $returnorder[0]['invoice_number'];
        }

        $product_date = ProductionDate::where('invoice_name', $selected_order)->first();
        $startdate = $product_date['start_date'];
        $enddate = $product_date['finish_date'];

        if(!isset($startdate))
            $startdate = date('Y-m-d',strtotime("-6 months"));
        if(!isset($enddate))
            $enddate = date('Y-m-d',strtotime("+6 months"));

        $dates = $this->date_range($startdate, $enddate);
        
        if(!isset($selected_date)){
            $selected_date = date('Y-m-d');
        }
        $comments = ProductionComment::where('created_number',$selected_order)->where('date','>=',$startdate)->where('date','<=',$enddate)->orderBy('date', 'desc')->get();


        return view('admin.production',compact( 'users','user', 'returnorder', 'selected_order','startdate','enddate','dates','selected_date','comments'));
    }
    protected function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);
    
        while( $current <= $last ) {
    
            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }
    
        return $dates;
    }
    public function getSummary(Request $request){
        $user = Auth::user();
        $startdate = date('Y-m-d',strtotime("-1 years"));
        $enddate = date('Y-m-d',strtotime("+1 days"));
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            $user = User::where('email','=',$email)->first();

            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');

            $ordersQuery = Order::where('created_by','=',$user['id'])->where('usenow',1);
            $gripQuery = GripTape::where('created_by','=',$user['id'])->where('usenow',1);
            $wheelQuery = Wheel::where('created_by','=',$user['id'])->where('usenow',1);
            $bearingQuery = Bearing::where('created_by','=',$user['id'])->where('usenow',1);

            if($startdate){
                $ordersQuery = $ordersQuery->where('created_at','>=',$startdate);
                $gripQuery = $gripQuery->where('created_at','>=',$startdate);
                $wheelQuery = $wheelQuery->where('created_at','>=',$startdate);
                $bearingQuery = $bearingQuery->where('created_at','>=',$startdate);
            }
            if($enddate){
                $ordersQuery = $ordersQuery->where('created_at','<=',$enddate);
                $gripQuery = $gripQuery->where('created_at','<=',$enddate);
                $wheelQuery = $wheelQuery->where('created_at','<=',$enddate);
                $bearingQuery = $bearingQuery->where('created_at','<=',$enddate);
            }
            
        }
        else{
            $ordersQuery = Order::auth();
            $gripQuery = GripTape::auth();
            $wheelQuery = Wheel::auth();
            $bearingQuery = Bearing::auth();
        }

        $returnorder = $ordersQuery->get();
        $returngrip = $gripQuery->get();
        $returnwheel = $wheelQuery->get();
        $returnbearing = $bearingQuery->get();

        $fees = [];
        $sum_fees = 0;

        // Set wheel fix cost to main fees array
        //$this->calculateWheelFixCost($fees);

        // Order weight
        $gripWeight = (clone $gripQuery)->get()->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        $wheelWeight = (clone $wheelQuery)
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

        $wheels = (clone $wheelQuery)
            ->get()
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();

        $bearings = (clone $bearingQuery)
            ->get()
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
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

                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
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

                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        foreach ($wheels as $index => $wheel) {
            $index += 1;

            foreach ($wheel as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $wheel['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if ($key === 'top_print' || $key === 'back_print') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * 20 * 1.5;
                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $fees[$key][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $fees[$key][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $fees[$key][$value]['price'] = 80 * $fees[$key][$value]['color'];
                } else if ($key === 'shape_print'){
                    $fees[$key][$value]['price'] = 2000;
                } else {
                    $fees[$key][$value]['price'] = 0;
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }


        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bearing)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $bearing['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bearing['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $bearing)) {
                    switch ($bearing[str_replace('_print','',$key) . '_colors']) {
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

                //$fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];

                if($key != "pantone_print")
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                else if($key == "pantone_print"){
                    $panthone = json_decode($bearing['pantone_color'], true);
                    switch($panthone['title']){
                        case '1 Color':
                            $fees[$key][$value]['price'] = 90;
                            break;
                        case '2 Color':
                            $fees[$key][$value]['price'] = 180;
                            break;
                        case '3 Color':
                            $fees[$key][$value]['price'] = 270;
                            break;
                        case '4 Color':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['price'] = 360;
                            break;
                        default:
                            $fees[$key][$value]['price'] = 0;
                            break;
                    }
                }


                if(!empty(PaidFile::where('created_by', $bearing['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        // Set Global delivery
        if ($ordersQuery->count() || $gripQuery->count() || $wheelQuery->count() || $bearingQuery->count()) {
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
        $totalOrders = $ordersQuery->sum('total') + GripTape::auth()->sum('total') + Wheel::auth()->sum('total') + Bearing::auth()->sum('total') + $sum_fees;

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
        
        return view('admin.summary', compact('fees', 'totalOrders','returnorder','returngrip','returnwheel','returnbearing','users','user','startdate','enddate'));
    }

    public function getAction(Request $request){
        $user = Auth::user();
        $startdate = date('Y-m-d',strtotime("-7 days"));
        $enddate = date('Y-m-d',strtotime("+1 days"));
        if($request->isMethod('post')){
            $email = $request->input('filter_email');
            if($email != 'all')
                $user = User::where('email','=',$email)->first();

            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
        }
        if($startdate)
            $startdate_temp = $startdate;
        else
            $startdate_temp = date('Y-m-d',strtotime("-7 days"));
        if($enddate)
            $enddate_temp = $enddate;
        else
            $enddate_temp = date('Y-m-d',strtotime("+1 days"));
        $users = User::select('email','name')->get();
        $isall = false;
        if(isset($email) && $email == 'all'){
            $sessions = Session::leftjoin('users','users.id','=','sessions.created_by')->select('sessions.*', 'users.email')->where('action','<>','clicked')->orderBy('created_at','desc')->get();
            $isall = true;
        }
        else
            $sessions = Session::where('created_by', $user->id)->leftjoin('users','users.id','=','sessions.created_by')->select('sessions.*', 'users.email')->where('action','<>','clicked')->orderBy('created_at','desc')->get();
        
        return view('admin.action', compact('user','users', 'startdate','enddate', 'sessions', 'isall'));
        
    }
    public function addUpload(Request $request){
        $conditions = $request->input('selected');
        $type = $request->input('type');
        $value = $request->input('value');
        
        foreach($conditions as $condition){
            $paidfile = PaidFile::where('file_name', $condition['name'])->where('created_by', $condition['created_by'])->first();

            if($type == 'color_qty'){
                $selected_order = [];
            
                $order = Order::where('created_by', $condition['created_by'])->where(function($query) use ($condition){
                    $query->where('bottomprint', $condition['name'])->orwhere('topprint', $condition['name'])->orwhere('engravery', $condition['name'])->orwhere('cardboard', $condition['name'])->where('carton', $condition['name']);
                })->pluck('id');
                $grip = GripTape::where('created_by', $condition['created_by'])->where(function($query) use ($condition){
                    $query->where('backpaper_print', $condition['name'])->orwhere('top_print', $condition['name'])->orwhere('die_cut', $condition['name'])->orwhere('carton_print', $condition['name']);
                })->pluck('id');
                $wheel = Wheel::where('created_by', $condition['created_by'])->where(function($query) use ($condition){
                    $query->where('back_print', $condition['name'])->orwhere('top_print', $condition['name'])->orwhere('shape_print', $condition['name'])->orwhere('cardboard_print', $condition['name'])->where('carton_print', $condition['name']);
                })->pluck('wheel_id');
                $bearing = Bearing::where('created_by', $condition['created_by'])->where(function($query) use ($condition){
                    $query->where('race_print', $condition['name'])->orwhere('shield_brand_print', $condition['name'])->orwhere('pantone_print', $condition['name']);
                })->pluck('id');

                // $order = Order::where('bottomprint', $condition['name'])->orwhere('topprint', $condition['name'])->orwhere('engravery', $condition['name'])->orwhere('cardboard', $condition['name'])->where('carton', $condition['name'])->where('created_by',$condition['created_by'])->pluck('id');
                // $grip = GripTape::where('backpaper_print', $condition['name'])->orwhere('top_print', $condition['name'])->orwhere('die_cut', $condition['name'])->orwhere('carton_print', $condition['name'])->where('created_by',$condition['created_by'])->pluck('id');
                // $wheel = Wheel::where('back_print', $condition['name'])->orwhere('top_print', $condition['name'])->orwhere('shape_print', $condition['name'])->orwhere('cardboard_print', $condition['name'])->where('carton_print', $condition['name'])->where('created_by',$condition['created_by'])->pluck('wheel_id');

                $selected_order['order'] = $order;
                $selected_order['grip'] = $grip;
                $selected_order['wheel'] = $wheel;
                $selected_order['bearing'] = $bearing;

                $orders = Order::where('created_by', $condition['created_by'])->get()->map(function($order) {
                    return array_filter($order->attributesToArray());
                })
                ->toArray();
                foreach($orders as $order){
                    foreach($order as $key => $value1){
                        
                        if($value1 == $condition['name']){
                            if(isset($order[$key.'_color']))
                                Order::where('id', $order['id'])->update([$key.'_color'=> $value==4?'CMYK':$value.' color']);
                        }
                    }
                }

                $grips = GripTape::where('created_by', $condition['created_by'])->get()->map(function($grip) {
                    return array_filter($grip->attributesToArray());
                })
                ->toArray();
                foreach($grips as $grip){
                    foreach($grip as $key => $value1){
                        if($value1 == $condition['name']){
                            if(isset($grip[$key.'_color']))
                                GripTape::where('id', $grip['id'])->update([$key.'_color'=> $value==4?'CMYK':$value.' color']);
                        }
                    }
                }

                $wheels = Wheel::where('created_by', $condition['created_by'])->get()->map(function($wheel) {
                    return array_filter($wheel->attributesToArray());
                })
                ->toArray();
                foreach($wheels as $wheel){
                    foreach($wheel as $key => $value1){
                        if($value1 == $condition['name']){
                            if(isset($wheel[str_replace('_print','',$key).'_colors']))
                                Wheel::where('wheel_id', $wheel['wheel_id'])->update([str_replace('_print','',$key).'_colors'=> $value==4?'CMYK':$value.' color']);
                        }
                    }
                }

                $bearings = Bearing::where('created_by', $condition['created_by'])->get()->map(function($bearing) {
                    return array_filter($bearing->attributesToArray());
                })
                ->toArray();
                foreach($bearings as $bearing){
                    foreach($bearing as $key => $value1){
                        if($value1 == $condition['name']){
                            if(isset($bearing[str_replace('_print','',$key).'_colors']))
                                Bearing::where('id', $bearing['id'])->update([str_replace('_print','',$key).'_colors'=> $value==4?'CMYK':$value.' color']);
                        }
                    }
                }
            }
            

            //var_dump(json_encode($selected_order));
            

            if($paidfile == null){
                if(isset($selected_order))
                    PaidFile::insert(['file_name' => $condition['name'], 'created_by' => $condition['created_by'], $type => $value, $selected_order => json_encode($selected_order)]);
                else
                    PaidFile::insert(['file_name' => $condition['name'], 'created_by' => $condition['created_by'], $type => $value]);
            }
            else{
                if(isset($selected_order))
                    PaidFile::where('file_name', $condition['name'])->where('created_by', $condition['created_by'])->update([$type => $value, 'selected_orders' => json_encode($selected_order)]);
                else
                    PaidFile::where('file_name', $condition['name'])->where('created_by', $condition['created_by'])->update([$type => $value]);
            }
        }   
        return response('success');
    }
    public function deleteUpload(Request $request){
        $conditions = $request->input('selected');
        $type = $request->input('type');
        foreach($conditions as $condition){
            if($type == 'color_code' || $type == 'date')
                PaidFile::where('file_name', $condition['name'])->where('created_by', $condition['created_by'])->update([$type => '']);
            else if($type == 'color_qty')
                PaidFile::where('file_name', $condition['name'])->where('created_by', $condition['created_by'])->update([$type => '', 'selected_orders' => '']);
            else if($type == 'file'){
                $orders = Order::where('created_by', $condition['created_by'])->get()->map(function($order) {
                    return array_filter($order->attributesToArray());
                })
                ->toArray();
                foreach($orders as $order){
                    foreach($order as $key => $value1){
                        
                        if($value1 == $condition['name']){
                            Order::where('id', $order['id'])->update([$key=> '']);
                        }
                    }
                }

                $grips = GripTape::where('created_by', $condition['created_by'])->get()->map(function($grip) {
                    return array_filter($grip->attributesToArray());
                })
                ->toArray();
                foreach($grips as $grip){
                    foreach($grip as $key => $value1){
                        if($value1 == $condition['name']){
                            GripTape::where('id', $grip['id'])->update([$key=> '']);
                        }
                    }
                }

                $wheels = Wheel::where('created_by', $condition['created_by'])->get()->map(function($wheel) {
                    return array_filter($wheel->attributesToArray());
                })
                ->toArray();
                foreach($wheels as $wheel){
                    foreach($wheel as $key => $value1){
                        if($value1 == $condition['name']){
                            Wheel::where('wheel_id', $wheel['wheel_id'])->update([$key=> '']);
                        }
                    }
                }

                $bearings = Bearing::where('created_by', $condition['created_by'])->get()->map(function($bearing) {
                    return array_filter($bearing->attributesToArray());
                })
                ->toArray();
                foreach($bearings as $bearing){
                    foreach($bearing as $key => $value1){
                        if($value1 == $condition['name']){
                            Bearing::where('id', $bearing['id'])->update([$key=> '']);
                        }
                    }
                }
            }
            // else if($type == 'date')
            //     PaidFile::where('file_name', $condition['name'])->where('created_by', $condition['created_by'])->update([$type => '']);
        }
    }
}
