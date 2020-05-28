<?php

namespace App\Http\Controllers;

use App\Jobs\RecalculateHeatTransfers;
use App\Rules\EmptyOrder;
use App\Rules\WheelSubmitMinimum;
use App\Services\TransferService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\{HeatTransfer\HeatTransfer, Order, GripTape, Bearing, Wheel\Wheel, PaidFile, ProductionComment, ProductionDate, BoltNut};
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail, Cookie;
use Itlead\Promocodes\Models\Promocode;
use App\Jobs\RecalculateOrders;



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
        'cardbox_print' => [
            'name' => 'Packing First Print',
            'price' => 0
        ],
        'cardboxtwo_print' => [
            'name' => 'Packing Second Print',
            'price' => 0
        ],
        'sticker_print' => [
            'name' => 'Sheid Brand First Print',
            'price' => 0
        ],
        'pack_print' => [
            'name' => 'Bolt and Nut Packign Print',
            'price' => 0
        ]
        
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
                Bearing::auth()->where('submit', 0)->get(),
                HeatTransfer::auth()->where('submit',0)->get()
            )
        );

        // TODO Replace to App\Classes\Batch

        $ordersQuery = Order::auth();
        $gripQuery = GripTape::auth();
        $wheelQuery = Wheel::auth();

        /** @var \Illuminate\Database\Eloquent\Collection|HeatTransfer[] $transfers */
        $transfers = HeatTransfer::auth()->get();
        $bearingQuery = Bearing::auth();
        $boltQuery = BoltNut::auth();
        
        $fees = [];
        $sum_fees = 0;

        $transfersWeight = TransferService::getGlobalDeliveryWeight($transfers);

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

        $bearingWeight = (clone $bearingQuery)->get()->sum('quantity')*0.12;

        // total weight
        $weight = round(($ordersQuery->sum('quantity') * Order::SKATEBOARD_WEIGHT) + $gripWeight + $wheelWeight + $transfersWeight + $bearingWeight, 2);

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
        
        $bolts = (clone $boltQuery)
            ->get()
            ->map(function($bolt) {
                return array_filter($bolt->attributesToArray());
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

        foreach ($bolts as $index => $bolt) {
            $index += 1;

            foreach ($bolt as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bolt)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $bolt['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bolt['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $bolt)) {
                    switch ($bolt[$key . '_color']) {
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

                if(!empty(PaidFile::where('created_by', $bolt['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }
            }
        }

        $this->calculateTransfersFixCost($fees, (clone $transfers));
        // Set Global delivery
        if ($ordersQuery->count() || $gripQuery->count() || Wheel::auth()->count() || Bearing::auth()->count() || $transfers->isNotEmpty() || BoltNut::auth()->count()) {
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
        $totalOrders =
            $ordersQuery->sum('total')
            + GripTape::auth()->sum('total')
            + Wheel::auth()->sum('total')
            + Bearing::auth()->sum('total')
            + BoltNut::auth()->sum('total')
            + $transfers->sum('total')
            + $sum_fees;


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

        return view('summary', compact('fees', 'totalOrders'));
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

    /**
     * Calculate fix cost for active transfers
     *
     * @param array $fees
     * @param \Illuminate\Database\Eloquent\Collection|null $transfers
     *
     * @return void
     */
    protected function calculateTransfersFixCost(array &$fees, Collection $transfers = null)
    {
        /** @var \Illuminate\Database\Eloquent\Collection $transfers */
        $transfers = $transfers ?? HeatTransfer::auth()->get();

        /** @var \Illuminate\Database\Eloquent\Collection $paidFiles */
        $paidFiles = PaidFile::query()
            ->whereIn('created_by', $transfers->pluck('created_by'))
            ->get();

        $transfers->transform(function(HeatTransfer $transfer, $key) use (&$fees, $paidFiles) {

            $transferKey = $transfer['small_preview'];

            // If same design
            if (isset($fees['transfer_small_preview']) && array_key_exists($transferKey, $fees['transfer_small_preview'])) {
                $fees['transfer_small_preview'][$transferKey]['batches'] .= "," . ++$key;
                $fees['transfer_small_preview'][$transferKey]['quantity'] += $transfer['quantity'];
                return false;
            }

            $fees['transfer_small_preview'][$transferKey] = [
                'batch'    => 'transfer',
                'image'    => $transfer['small_preview'],
                'batches'  => (string) ++$key,
                'type'     => 'Transfer Paper',
                'quantity' => $transfer['quantity'],
                'designName'    => $transfer['design_name'],
                'color'    => $transfer['cmyk']
                    ? $transfer['colors_count'] - (int) $transfer['transparency']
                    : $transfer['colors_count'],
                'price'    => $transfer['reorder_at'] ? 0 : $transfer['total_screens'],
            ];

            if ($transfer['transparency']) {
                $fees['transfer_small_preview'][$transferKey]['color'] .= ' + Transparency';
            }

            $isPaid = $paidFiles
                ->where('file_name', $transferKey)
                ->where('date', '!=', null)
                ->isNotEmpty();

            if ($isPaid){
                $fees['transfer_small_preview'][$transferKey]['price'] = 0;
                $fees['transfer_small_preview'][$transferKey]['paid'] = 1;
            }
        });
    }

    public function exportcsv()
    {
        $queryOrders = Order::auth();
        $gripQuery = GripTape::auth();
        $wheelQuery = Wheel::auth();
        $bearingQuery = Bearing::auth();
        $transfersQuery = HeatTransfer::auth();
        $boltQuery = BoltNut::auth();
        

        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX(
            $queryOrders->get(),
            $gripQuery->get(),
            $wheelQuery->get(),
            $bearingQuery->get(),
            $transfersQuery->get(),
            $boltQuery->get()
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
        HeatTransfer::auth()->delete();
        BoltNut::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();

        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $grips = GripTape::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $wheels = Wheel::where('created_by','=', $created_by)->where('saved_date', '=', $id)->get();
        $bearings = Bearing::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $transfers = HeatTransfer::where('created_by','=', $created_by)->where('saved_date', '=', $id)->get();
        $bolts = BoltNut::where('created_by','=', $created_by)->where('saved_date', '=', $id)->get();

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
        for($i = 0; $i < count($transfers); $i ++){
            unset($transfers[$i]['id']);
            unset($transfers[$i]['saved_date']);
            unset($transfers[$i]['usenow']);
            unset($transfers[$i]['submit']);
            $array = json_decode(json_encode($transfers[$i]), true);
            HeatTransfer::insert($array);
        }
        for($i = 0; $i < count($bolts); $i ++){
            unset($bolts[$i]['id']);
            unset($bolts[$i]['saved_date']);
            unset($bolts[$i]['usenow']);
            unset($bolts[$i]['submit']);
            $array = json_decode(json_encode($bolts[$i]), true);
            BoltNut::insert($array);
        }

        $orders = Order::auth()->get();
        $grips = GripTape::auth()->get();
        $wheels = Wheel::auth()->get();
        $bearings = Bearing::auth()->get();
        $bolts = BoltNut::auth()->get();
        
        // TODO add wheels to invoice
        $transfers = HeatTransfer::auth()->get();

        $exporter = new \App\Jobs\GenerateInvoicesXLSX($orders, $grips, $wheels, $bearings,$transfers, $bolts);

        if ($orders->count()) {
            $model = $orders->first();

        } else if ($grips->count()) {
            $model = $grips->first();
        } else if ($wheels->count()){
            $model =$wheels->first();
        } else if ($bearings->count()){
            $model =$bearings->first();
        } else if( $transfers->count()){
            $model = $transfers->first();
        } else if( $bolts->count()){
            $model = $bolts->first();
        }


        $exporter->setInvoiceNumber($model->invoice_number);

        $exporter->setDate($id);

        dispatch($exporter);
        
        return response()->download($exporter->getPathInvoice());
    }

    /**
     * Submit the order
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitOrder(Request $request)
    {
        /** @var \Illuminate\Support\Collection $cart */
        $cart = collect();


        $cart->put('orders', Order::auth());
        $cart->put('grips', GripTape::auth());
        $cart->put('wheels', Wheel::auth());
        $cart->put('transfers', HeatTransfer::auth());
        $cart->put('bearings', Bearing::auth());
        $cart->put('bolts', BoltNut::auth());

        $totalQuantity = $cart->reduce(function ($carry, $item) {
            return $carry + $item->count();
        }, 0);

        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make(
            [
                'wheels' => (int) $cart->get('wheels')->sum('quantity'),
                'total' => $totalQuantity,
            ],
            [
                'wheels' => [new WheelSubmitMinimum()],
                'total' => [new EmptyOrder()],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        Mail::to($request->user())->send($mailer = new \App\Mail\OrderSubmit());

        $invoiceNumber = $mailer->getInvoiceNumber();
        $now = now();

        $cart->map(function($items) use ($now) {
             if ($items->count() === 0) return false;

            $items->update([
                'submit' => 1,
                'saved_date' => $now,
                'usenow' => 0
            ]);
        });


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
        $transfers = HeatTransfer::auth()->get();
        $bolts = BoltNut::auth()->get();

        $save_data['usenow'] = 0;
        $save_data['saved_date'] = now();
        $save_data['saved_name'] = $request->get('name', $save_data['saved_date']);

        Order::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        GripTape::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        Wheel::auth()->update($save_data);
        Bearing::where('created_by','=',$created_by)->where('usenow', '=', 1)->update($save_data);
        HeatTransfer::auth()->update($save_data);
        BoltNut::auth()->update($save_data);

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

        for ($i = 0; $i < count($transfers); $i ++){
            unset($transfers[$i]['id']);
            unset($transfers[$i]['saved_date']);
            unset($transfers[$i]['invoice_number']);
            $array = json_decode(json_encode($transfers[$i]), true);
            HeatTransfer::insert($array);
        }

        for ($i = 0; $i < count($bolts); $i ++){
            unset($bolts[$i]['id']);
            unset($bolts[$i]['saved_date']);
            unset($bolts[$i]['invoice_number']);
            $array = json_decode(json_encode($bolts[$i]), true);
            BoltNut::insert($array);
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
        HeatTransfer::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();
        BoltNut::where('created_by','=',$created_by)->where('usenow', '=', 1)->delete();

        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $grips = GripTape::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $wheels = Wheel::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $bearings = Bearing::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $transfers = HeatTransfer::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $bolts = BoltNut::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();

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

        for($i = 0; $i < count($transfers); $i ++){
            unset($transfers[$i]['id']);
            unset($transfers[$i]['saved_date']);
            unset($transfers[$i]['usenow']);
            unset($transfers[$i]['submit']);
            $array = json_decode(json_encode($transfers[$i]), true);
            HeatTransfer::insert($array);
        }

        for($i = 0; $i < count($bolts); $i ++){
            unset($bolts[$i]['id']);
            unset($bolts[$i]['saved_date']);
            unset($bolts[$i]['usenow']);
            unset($bolts[$i]['submit']);
            $array = json_decode(json_encode($bolts[$i]), true);
            BoltNut::insert($array);
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
        HeatTransfer::auth()->delete();
        BoltNut::auth()->delete();

        $data = Order::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $grips = GripTape::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $wheels = Wheel::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $bearings = Bearing::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $transfers = HeatTransfer::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();
        $bolts = BoltNut::where('created_by','=',$created_by)->where('saved_date', '=', $id)->get();

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

        for($i = 0; $i < count($transfers); $i ++){
            unset($transfers[$i]['id']);
            unset($transfers[$i]['saved_date']);
            unset($transfers[$i]['usenow']);
            unset($transfers[$i]['submit']);
            $array = json_decode(json_encode($transfers[$i]), true);
            HeatTransfer::insert($array);
        }

        for($i = 0; $i < count($bolts); $i ++){
            unset($bolts[$i]['id']);
            unset($bolts[$i]['saved_date']);
            unset($bolts[$i]['usenow']);
            unset($bolts[$i]['submit']);
            $array = json_decode(json_encode($bolts[$i]), true);
            BoltNut::insert($array);
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
        HeatTransfer::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();
        BoltNut::where('created_by','=',$created_by)->where('saved_date','=',$id)->delete();

        return redirect()->route('profile');
    }
    public function deleteSummary(Request $request){
        $ordersQuery = Order::auth()->delete();
        $gripQuery = GripTape::auth()->delete();
        $wheelQuery = Wheel::auth()->delete();
        $transfers = HeatTransfer::auth()->delete();
        $bearingQuery = Bearing::auth()->delete();
        $boltQuery = BoltNut::auth()->delete();
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
        $transfer_checked = $request->input('transferBatches');
        $bolt_checked = $request->input('boltBatches');

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
            if(isset($transfer_checked)){
                $transfers = HeatTransfer::whereIn('id',$transfer_checked)->get();
                for($i = 0; $i < $transfers->count(); $i ++){
                    unset($transfers[$i]['id']);
                    unset($transfers[$i]['saved_date']);
                    unset($transfers[$i]['usenow']);
                    unset($transfers[$i]['submit']);
                    unset($transfers[$i]['invoice_number']);
                    $transfers[$i]['saved_batch'] = 0;
                    $array = json_decode(json_encode($transfers[$i]), true);
                    HeatTransfer::insert($array);
                }
                dispatch(new RecalculateHeatTransfers);
            }

            if(isset($bolt_checked)){
                $bolts = BoltNut::whereIn('id',$bolt_checked)->get();
                for($i = 0; $i < $bolts->count(); $i ++){
                    unset($bolts[$i]['id']);
                    unset($bolts[$i]['saved_date']);
                    unset($bolts[$i]['usenow']);
                    unset($bolts[$i]['submit']);
                    unset($bolts[$i]['invoice_number']);
                    $bolts[$i]['saved_batch'] = 0;
                    $array = json_decode(json_encode($bolts[$i]), true);
                    BoltNut::insert($array);
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
                Bearing::whereIn('id',$bearing_checked)->delete();
            if(isset($transfer_checked))
                HeatTransfer::whereIn('id',$transfer_checked)->delete();
            if(isset($bolt_checked))
                HeatTransfer::whereIn('id',$bolt_checked)->delete();
            return redirect()->back();
        }
        return redirect()->route('summary');
    }
}
