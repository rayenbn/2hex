<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{HeatTransfer\HeatTransfer, Order, GripTape, Bearing, Wheel\Wheel, PaidFile};
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;
use Itlead\Promocodes\Models\Promocode;
use App\Jobs\RecalculateOrders;
use Cookie;

class SummaryController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        dispatch(
            new RecalculateOrders(
                Order::auth()->where('submit', 0)->get(), 
                GripTape::auth()->where('submit', 0)->get(),
                Wheel::auth()->where('submit', 0)->get(),
                Bearing::auth()->where('submit', 0)->get()
            )
        );
        $ordersQuery = Order::auth();
        $gripQuery = GripTape::auth();
        $wheelQuery = Wheel::auth();
        $transfers = HeatTransfer::auth()->get();
        $bearingQuery = Bearing::auth();
        
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
                                case '1 Color':
                                    $fees[$key][$value]['price'] += 90;
                                    break;
                                case '2 Color':
                                    $fees[$key][$value]['price'] += 180;
                                    break;
                                case '3 Color':
                                    $fees[$key][$value]['price'] += 270;
                                    break;
                                case '4 Color':
                                    $fees[$key][$value]['price'] += 360;
                                    break;
                                case 'CMYK':
                                    $fees[$key][$value]['price'] += 360;
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
                            case '1 Color':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "1 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 90
                                ];
                                break;
                            case '2 Color':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "2 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 180
                                ];
                                break;
                            case '3 Color':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "2 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 270
                                ];
                                break;
                            case '4 Color':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "2 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 360
                                ];
                                break;
                            case 'CMYK':
                                $fees[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "2 Color",
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
                $fees[$key][$value]['price'] = 0;


                if(!empty(PaidFile::where('created_by', $bearing['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
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

        return view('summary', compact('fees', 'totalOrders', 'transfers'));
    }

    /**
     * Calculate fix cost for active wheels
     *
     * @param array $fees
     *
     * @return void
     */
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

                if ($key === 'top_print') {
                    $fees[$wheelKey][$value]['price'] = $fees[$wheelKey][$value]['color'] * 20 * 1.5;
                } else if ($key === 'back_print') {
                    // Set a free cost if exist same top print
                    if (isset($fees['wheel_top_print']) && array_key_exists($value, $fees['wheel_top_print'])) {
                        $fees[$wheelKey][$value]['price'] = 0;
                    } else {
                        $fees[$wheelKey][$value]['price'] = $fees[$wheelKey][$value]['color'] * 20 * 1.5;
                    }

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

                if (!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])) {
                    $fees[$wheelKey][$value]['price'] = 0;
                    $fees[$wheelKey][$value]['paid'] = 1;
                }
            }
        }
    }

    public function exportcsv()
    {
        $queryOrders = Order::auth();
        $gripQuery = GripTape::auth();
        $wheelQuery = Wheel::auth();
        $bearingQuery = Bearing::auth();

        // TODO add wheels to invoice

        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX(
            $queryOrders->get(), 
            $gripQuery->get(), 
            $wheelQuery->get(),
            $bearingQuery->get()

        ));

        $queryOrders->update(['invoice_number' => $exporter->getInvoiceNumber()]);

        return response()->download($exporter->getPathInvoice());
    }

    public function exportcsvbyid($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        $created_by = (string) (auth()->check() ? auth()->id() : csrf_token());

        /*Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        Wheel::auth()->update($save_data);*/
        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        Wheel::auth()->delete();
        Bearing::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();

        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $grips = GripTape::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $wheels = Wheel::where('created_by','=', $created_by)->where('saved_date', '=', $id)->get();
        $bearings = Bearing::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();

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

        for($i = 0; $i < count($bearings); $i ++){
            unset($bearings[$i]['id']);
            unset($bearings[$i]['saved_date']);
            unset($bearings[$i]['usenow']);
            unset($bearings[$i]['submit']);
            $array = json_decode(json_encode($bearings[$i]), true);
            Bearing::insert($array);
        }

        $orders = Order::auth()->get();
        $grips = GripTape::auth()->get();
        $wheels = Wheel::auth()->get();
        $bearing = Bearing::auth()->get();

        // TODO add wheels to invoice

        $exporter = new \App\Jobs\GenerateInvoicesXLSX($orders, $grips, $wheels);

        if ($orders->count()) {
            $model = $orders->first();

        } else if ($grips->count()) {
            $model = $grips->first();
        } else {
            $model =$wheels->first();
        }

        $exporter->setInvoiceNumber($model->invoice_number);

        $exporter->setDate($model->created_at->timestamp);

        dispatch($exporter);
        
        return response()->download($exporter->getPathInvoice());
    }

    public function submitOrder()
    {
        $info = ShipInfo::auth()->select('invoice_name')->first(); 
        $queryOrders = Order::auth();
        $queryGripTapes = GripTape::auth();
        $queryWheels = Wheel::auth();
        $queryBearings = Bearing::auth();

        Mail::to(auth()->user())->send($mailer = new \App\Mail\OrderSubmit($info->toArray()));

        $invoiceNumber = $mailer->getInvoiceNumber();

        $now = now();

        $queryOrders->update([
            'submit' => 1,
            'saved_date' => $now,
            'usenow' => 0
        ]);

        $queryGripTapes->update([
            'submit' => 1,
            'saved_date' => $now,
            'usenow' => 0
        ]);

        $queryWheels->update([
            'submit' => 1,
            'saved_date' => $now,
            'usenow' => 0
        ]);

        $queryBearings->update([
            'submit' => 1,
            'saved_date' => $now,
            'usenow' => 0
        ]);

        session()->flash('success', 'Your order has been successfully sent!');
        session()->flash('invoiceNumber', $invoiceNumber); 
        
        ProductionDate::insert(['start_date'=>date('Y-m-d'), 'finish_date'=>$enddate = date('Y-m-d',strtotime("+3 months")), 'invoice_name'=>$invoiceNumber]);

        ProductionComment::insert(
            ['date' => date("Y-m-d"), 'comment' => 'Order submitted', 'order_id' => '1', 'created_at' => date("Y-m-d H:i:s"), 'created_number' => $invoiceNumber]
        );

        ProductionComment::insert(
            ['date' => date("Y-m-d"), 'comment' => 'Waiting for payment', 'order_id' => '1', 'created_at' => date("Y-m-d H:i:s"), 'created_number' => $invoiceNumber]
        );
        
        return redirect()->route('ordersuccess');
    }

    public function saveOrder(Request $request)
    {
        $this->validate($request, ['name' => 'required|string']);

        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }

        $data = Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->get();
        $grips = GripTape::where('created_by', '=', $created_by)->where('usenow', '=', 1)->get();
        $wheels = Wheel::auth()->get();
        $bearings = Bearing::where('created_by','=',$created_by)->where('usenow', '=', 1)->get();

        $save_data['usenow'] = 0;
        $save_data['saved_date'] = now();
        $save_data['saved_name'] = $request->get('name', $save_data['saved_date']);

        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        Wheel::auth()->update($save_data);
        Bearing::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);

        for($i = 0; $i < count($data); $i ++){
            unset($data[$i]['id']);
            unset($data[$i]['saved_date']);
            unset($data[$i]['invoice_number']);
            $array = json_decode(json_encode($data[$i]), true);

            Order::insert($array);
        }

        for($i = 0; $i < count($grips); $i ++){
            unset($grips[$i]['id']);
            unset($grips[$i]['saved_date']);
            unset($grips[$i]['invoice_number']);
            $array = json_decode(json_encode($grips[$i]), true);
            GripTape::insert($array);
        }

        for($i = 0; $i < count($wheels); $i ++){
            unset($wheels[$i]['wheel_id']);
            unset($wheels[$i]['saved_date']);
            unset($wheels[$i]['invoice_number']);
            $array = json_decode(json_encode($wheels[$i]), true);
            Wheel::insert($array);
        }
        
        for($i = 0; $i < count($bearings); $i ++){
            unset($bearings[$i]['id']);
            unset($bearings[$i]['saved_date']);
            unset($bearings[$i]['usenow']);
            unset($bearings[$i]['submit']);
            $array = json_decode(json_encode($bearings[$i]), true);
            Bearing::insert($array);
        }

        return redirect()->route('profile', ['#saved_orders']);
    }
    public function load($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }
        //Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        //GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        //Wheel::auth()->update($save_data);
        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();        
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        Wheel::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        Bearing::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        

        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $grips = GripTape::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $wheels = Wheel::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $bearings = Wheel::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();

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

        for($i = 0; $i < count($bearings); $i ++){
            unset($bearings[$i]['id']);
            unset($bearings[$i]['saved_date']);
            unset($bearings[$i]['usenow']);
            unset($bearings[$i]['submit']);
            $array = json_decode(json_encode($bearings[$i]), true);
            Bearing::insert($array);
        }

        return redirect()->route('summary');
    } 
    public function view($id)
    {
        $save_data['usenow'] = 0;
        //$save_data['saved_date'] =new \DateTime();

        
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }
        /*Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        Wheel::auth()->update($save_data);*/
        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        Wheel::auth()->delete();
        Bearing::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();

        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $grips = GripTape::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $wheels = Wheel::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $bearings = Wheel::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();

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
        for($i = 0; $i < count($bearings); $i ++){
            unset($bearings[$i]['id']);
            unset($bearings[$i]['saved_date']);
            unset($bearings[$i]['usenow']);
            unset($bearings[$i]['submit']);
            $array = json_decode(json_encode($bearings[$i]), true);
            Bearing::insert($array);
        }

        return redirect()->route('summary')->with(['viewonly'=>1]);   
    }
    public function removeOrder($id)
    {
        if(Auth::user()){
            $created_by = (string) auth()->id();
        }
        else{
            $created_by = csrf_token();
        }
        Order::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();
        GripTape::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();
        Wheel::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();
        Bearing::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();

        return redirect()->route('profile');
    }
    public function deleteSummary(Request $request){
        $ordersQuery = Order::auth()->delete();
        $gripQuery = GripTape::auth()->delete();
        $wheelQuery = Wheel::auth()->delete();
        $transfers = HeatTransfer::auth()->delete();
        $bearingQuery = Bearing::auth()->delete();
        return redirect()->route('summary');
    }
    public function applyPromocode(Request $request)
    {
        $this->validate($request, ['promocode' => 'required|min:2']);

        $checkCode = $request->get('promocode', '');

        $promocode = \Promocodes::check($checkCode);

        if (!$promocode) {
            return response()->json(["errors" => "The given data was invalid."], 400);
        }

        $queryOrders = Order::auth();
        $totalOrders = $queryOrders->sum('total');

        if (($promocode->is_supplement && $totalOrders >= 300) 
            || (!$promocode->is_supplement && $totalOrders >= 500)
        ) {
            $response = \Promocodes::apply($checkCode);

            list($code, $promocode) = $response;

            // set discount for all orders
            $queryOrders->update([
                'promocode' => json_encode(
                    array_merge($promocode->toArray(), ['code' => $code])
                )
            ]);

            return response()->json($code);
        }

        return response()->json(["errors" => "The given data was invalid."], 400);
    }
    public function addFromBatch(Request $request){
        $order_checked = $request->input('orderBatches');
        $grip_checked = $request->input('gripBatches');
        $wheel_checked = $request->input('wheelBatches');
        $bearing_checked = $request->input('bearingBatches');
        
        if($request->submit == 'Add'){
            if(isset($order_checked)){
                $orders = Order::whereIn('id',$order_checked)->get();
                for($i = 0; $i < count($orders); $i ++){
                    unset($orders[$i]['id']);
                    unset($orders[$i]['saved_date']);
                    unset($orders[$i]['usenow']);
                    unset($orders[$i]['submit']);
                    unset($orders[$i]['invoice_number']);
                    $orders[$i]['saved_batch'] = 0;
                    $array = json_decode(json_encode($orders[$i]), true);
                    Order::insert($array);
                }
            }            
            
            if(isset($grip_checked)){
                $grips = GripTape::whereIn('id',$grip_checked)->get();
                for($i = 0; $i < count($grips); $i ++){
                    unset($grips[$i]['id']);
                    unset($grips[$i]['saved_date']);
                    unset($grips[$i]['usenow']);
                    unset($grips[$i]['submit']);
                    unset($grips[$i]['invoice_number']);
                    $grips[$i]['saved_batch'] = 0;
                    $array = json_decode(json_encode($grips[$i]), true);
                    GripTape::insert($array);
                }
            }
            
            if(isset($wheel_checked)){
                $wheels = Wheel::whereIn('wheel_id',$wheel_checked)->get();
                for($i = 0; $i < count($wheels); $i ++){
                    unset($wheels[$i]['wheel_id']);
                    unset($wheels[$i]['saved_date']);
                    unset($wheels[$i]['usenow']);
                    unset($wheels[$i]['submit']);
                    unset($wheels[$i]['invoice_number']);
                    $wheels[$i]['saved_batch'] = 0;
                    $array = json_decode(json_encode($wheels[$i]), true);
                    Wheel::insert($array);
                }
            }

            if(isset($bearing_checked)){
                $bearings = Bearing::whereIn('id',$bearing_checked)->get();
                for($i = 0; $i < count($bearings); $i ++){
                    unset($bearings[$i]['id']);
                    unset($bearings[$i]['saved_date']);
                    unset($bearings[$i]['usenow']);
                    unset($bearings[$i]['submit']);
                    unset($bearings[$i]['invoice_number']);
                    $bearings[$i]['saved_batch'] = 0;
                    $array = json_decode(json_encode($bearings[$i]), true);
                    Bearing::insert($array);
                }
            }
            
        }
        if($request->submit == 'Delete'){
            if(isset($order_checked))
                Order::whereIn('id',$order_checked)->delete();
            if(isset($grip_checked))
                GripTape::whereIn('id',$grip_checked)->delete();
            if(isset($wheel_checked))
                Wheel::whereIn('wheel_id',$wheel_checked)->delete();
            if(isset($bearing_checked))
                GripTape::whereIn('bearing_id',$bearing_checked)->delete();
            return redirect()->back();
        }
        return redirect()->route('summary');
    }
}
