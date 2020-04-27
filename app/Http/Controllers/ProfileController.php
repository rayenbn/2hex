<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;
use App\Models\{Order, GripTape, Wheel\Wheel,ProductionComment, ProductionDate, PaidFile, Bearing};
use Session;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function index()
    {
        $createdBy = auth()->check() ? auth()->id() : csrf_token();

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
        $querySubmitBearings->where('submit', 1)->addSelect('invoice_number')->get()->each(function($bearing) use (&$submitorders) {
            $submitorders->push($bearing);
        });

        $submitorders = $submitorders->toBase()->merge($querySubmitWheels->where('submit',1)->addSelect('invoice_number')->get());

        $submitorders = $submitorders->unique('saved_date');

        $shipinfo = ShipInfo::auth()->first();

        $savedOrderBatches = Order::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedGripBatches = GripTape::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedWheelBatches = Wheel::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedBearingBatches = Bearing::where('created_by', $createdBy)->where('saved_batch', 1)->get();

        $returnorder = Order::where('created_by','=',$createdBy)->select('invoice_number')->where('submit','=',1)->groupBy('invoice_number')->get();

        GripTape::where('created_by','=',$createdBy)->select('invoice_number')->where('submit','=',1)->groupBy('invoice_number','saved_date')->orderBy('saved_date','DESC')->get()->each(function($griptape) use (&$returnorder) {
            $check = 1;
            foreach($returnorder as $each_order){
                if($each_order['invoice_number'] == $griptape['invoice_number'])
                    $check = 0;
            }
            if($check == 1)
                $returnorder->push($griptape);
        });
        Wheel::where('created_by','=',$createdBy)->select('invoice_number')->where('submit','=',1)->groupBy('invoice_number','saved_date')->orderBy('saved_date','DESC')->get()->each(function($wheel) use (&$returnorder) {
            $check = 1;
            foreach($returnorder as $each_order){
                if($each_order['invoice_number'] == $wheel['invoice_number'])
                    $check = 0;
            }
            if($check == 1)
                $returnorder->push($wheel);
        });
        Bearing::where('created_by','=',$createdBy)->select('invoice_number')->where('submit','=',1)->groupBy('invoice_number','saved_date')->orderBy('saved_date','DESC')->get()->each(function($bearing) use (&$returnorder) {
            $check = 1;
            foreach($returnorder as $each_order){
                if($each_order['invoice_number'] == $bearing['invoice_number'])
                    $check = 0;
            }
            if($check == 1)
                $returnorder->push($bearing);
        });

        $selected_order = Session::get('selected_order');

        
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

        // $startdate = Session::get('startdate');
        // $enddate = Session::get('enddate');

        // if(isset($startdate))
        //     $startdate_temp = $startdate;
        // else{
        //     $startdate_temp = date('Y-m-d',strtotime("-1 years"));
        //     $startdate = date('Y-m-d',strtotime("-1 years"));
        // }
        // if(isset($enddate))
        //     $enddate_temp = $enddate;
        // else{
        //     $enddate_temp = date('Y-m-d');
        //     $enddate = date('Y-m-d');
        // }

        

        $comments = ProductionComment::where('created_number',$selected_order)->where('date','>=',$startdate)->where('date','<=',$enddate)->orderBy('date', 'desc')->get();
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

                if (array_key_exists($key . '_color', $wheel)) {
                    switch ($wheel[$key . '_color']) {
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

                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        if($key == "material" && $value == "Chrome Balls"){
                            $fees[$key][$value]['price'] += 2.51;
                        }
                        if($key == "abec" && $value == "Abec7"){
                            $fees[$key][$value]['price'] += 2.51;
                        }
                        if($key == "abec" && $value == "Abec9"){
                            $fees[$key][$value]['price'] += 2.59;
                        }
                        if($key == "shield_brand" && $value == "Emboss"){
                            $fees[$key][$value]['price'] += 149.9;
                        }
                        if(isset($fees[$key][$value]['quantity']))
                            $fees[$key][$value]['quantity'] += $bearing['quantity'];
                        if($key == 'pantone_color'){

                        }
                        if($key == 'pantone_color'){
                            $panthone = json_decode($bearing['pantone_color'], true);
                            switch($panthone['title']){
                                case '1 Color on outer cartons':
                                    $fees[$key][$value]['price'] += 90;
                                    break;
                                case '2 Color on outer cartons':
                                    $fees[$key][$value]['price'] += 180;
                                    break;
                                case '3 Color on outer cartons':
                                    $fees[$key][$value]['price'] += 270;
                                    break;
                                case '4 Color on outer cartons':
                                    $fees[$key][$value]['price'] += 360;
                                    break;
                                case 'CMYK photo print on outer carton':
                                    $fees[$key][$value]['price'] += 360;
                                    break;
                                default:
                                    $fees[$key][$value]['price'] += 0;
                                    break;
                            }
                        }
                        continue;
                    }
                } 

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bearing)) {
                    if($key == "material" && $value == "Chrome Balls")
                    {
                        $fees[$key][$value] = [
                            'image'    => $value,
                            'type'     => "Material",
                            'batches'  => (string) $index,
                            'price'    => 2.51
                        ];
                    }
                    if($key == "abec" && $value == "Abec7"){
                        $fees[$key][$value] = [
                            'image'    => $value,
                            'batches'  => (string) $index,
                            'type'     => "Abec",
                            'price'    => 2.51
                        ];
                    }
                    if($key == "abec" && $value == "Abec9"){
                        $fees[$key][$value] = [
                            'image'    => $value,
                            'type'     => "Abec",
                            'batches'  => (string) $index,
                            'price'    => 2.59
                        ];
                    }
                    if($key == "shield_brand" && $value == "Emboss"){
                        $fees[$key][$value] = [
                            'image'    => $value,
                            'type'     => "Shield Brand",
                            'batches'  => (string) $index,
                            'price'    => 149.9
                        ];
                    }
                    if($key == 'pantone_color'){
                        $panthone = json_decode($bearing['pantone_color'], true);
                        switch($panthone['title']){
                            case '1 Color on outer cartons':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "1 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 90
                                ];
                                break;
                            case '2 Color on outer cartons':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "2 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 180
                                ];
                                break;
                            case '3 Color on outer cartons':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "3 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 270
                                ];
                                break;
                            case '4 Color on outer cartons':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "4 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 360
                                ];
                                break;
                            case 'CMYK photo print on outer carton':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "CMYK",
                                    'batches'  => (string) $index,
                                    'price'    => 360
                                ];
                                break;
                            default:
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "No Color",
                                    'batches'  => (string) $index,
                                    'price'    => 0
                                ];
                                break;
                        }
                    }
                    
                    continue;
                }

                // If same design
                
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bearing['quantity'],
                    'color'    => 1
                ];

                $fees[$key][$value]['price'] = 0;


                if(!empty(PaidFile::where('created_by', $bearing['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        
        $unSubmitOrders = json_decode(json_encode($unSubmitOrders), true);
        $submitorders = json_decode(json_encode($submitorders), true);
        $unSubmitOrders = array_values($unSubmitOrders);
        $submitorders = array_values($submitorders);
        usort($unSubmitOrders, function($a, $b) {return strcmp($b['saved_date'], $a['saved_date']);});
        usort($submitorders, function($a, $b) {return strcmp($b['saved_date'], $a['saved_date']);});
        return view('profile', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'savedOrderBatches', 'savedGripBatches', 'savedWheelBatches', 'savedBearingBatches', 'returnorder','startdate','enddate','selected_order', 'comments', 'fees'));
    }

    public function store_address(Request $request)
    {
        $data = $request->all();
        if(Auth::user())
            $data['created_by'] = (string) auth()->id();
        else
            $data['created_by'] = csrf_token();

        $origin = ShipInfo::where('created_by', $data['created_by']);

        if($origin->count() == 0){
            ShipInfo::insert($data);
        } else{
            ShipInfo::where('created_by','=',$data['created_by'])->update($data);
        }

        return redirect()->route('profile');
    }

    public function detail_save(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        if(auth()->check()) {
            $user = User::where('id','=', auth()->id())->update($data);
        }
        
        return redirect()->route('profile');
    }

    public function production_filter(Request $request){
        $selected_order = $request->input('select_order');
        //$startdate = $request->input('startdate');
        //$enddate = $request->input('enddate');

        return redirect()->route('profile',['#submitted_orders'])->with(['selected_order' => $selected_order]);
    }
}
