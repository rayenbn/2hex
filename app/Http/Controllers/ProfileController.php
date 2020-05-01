<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;
use App\Models\{HeatTransfer\HeatTransfer, Order, GripTape, Wheel\Wheel, ProductionComment, ProductionDate, PaidFile};
use Session;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Filesystem\Exception\InvalidArgumentException;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['getRecentFileByName', 'saveDetails']);
    }

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

        $queryTransfers = HeatTransfer::query()
            ->where('created_by', $createdBy)
            ->groupBy('saved_date', 'invoice_number', 'saved_name')
            ->whereNotNull('saved_date')
            ->select(['saved_date', 'saved_name']);

        $querySubmitOrders = clone $queryOrders;
        $querySubmitGrips = clone $queryGrips;
        $querySubmitWheels = clone $queryWheels;
        $querySubmitTransfers = clone $queryTransfers;

        // Unsubmit
        $unSubmitOrders = $queryOrders->where('submit', 0)->get();
        $unSubmitOrders = $unSubmitOrders->toBase()->merge($queryWheels->where('submit', 0)->get());
        $queryGrips->where('submit', 0)->get()->each(function($grip) use (&$unSubmitOrders) {
            $unSubmitOrders->push($grip);
        });
        $queryTransfers->where('submit', 0)->get()->each(function($transfer) use (&$unSubmitOrders) {
            $unSubmitOrders->push($transfer);
        });
        $unSubmitOrders = $unSubmitOrders->unique('saved_date');

        // Submit
        $submitorders = $querySubmitOrders->where('submit', 1)->addSelect('invoice_number')->get();
        
        $querySubmitGrips->where('submit', 1)->addSelect('invoice_number')->get()->each(function($grip) use (&$submitorders) {
            $submitorders->push($grip);
        });
        $querySubmitTransfers->where('submit', 1)->addSelect('invoice_number')->get()->each(function($transfer) use (&$submitorders) {
            $submitorders->push($transfer);
        });

        $submitorders = $submitorders->toBase()->merge($querySubmitWheels->where('submit',1)->addSelect('invoice_number')->get());

        $submitorders = $submitorders->unique('saved_date');

        $shipinfo = ShipInfo::auth()->first();

        $savedOrderBatches = Order::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedGripBatches = GripTape::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedWheelBatches = Wheel::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedTransferBatches = HeatTransfer::where('created_by', $createdBy)->where('saved_batch', 1)->get();

        $returnorder = Order::where('created_by','=',$createdBy)->select('invoice_number')->where('submit','=',1)->groupBy('invoice_number')->get();

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

        

        $comments = ProductionComment::where('created_number',$selected_order)->where('date','>=',$startdate)->where('date','<=',$enddate)->orderBy('date', 'asc')->get();
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

        $transfers = HeatTransfer::where('created_by', $createdBy)->where('saved_batch', 1)->get();


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

        return view('profile', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'savedTransferBatches', 'savedOrderBatches', 'savedGripBatches', 'savedWheelBatches', 'returnorder','startdate','enddate','selected_order', 'comments', 'fees'));
    }

    /**
     * Save my address
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveMyAddress(Request $request)
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

    /**
     * Save user details
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveDetails(Request $request)
    {
        $payload = $request->validate([
            'name' => 'nullable|string|max:191',
            'position' => 'nullable|string|max:45',
            'company_name' => 'nullable|string|max:45',
            'phone_num'  => 'nullable|string|max:45',
            'email' => 'email|max:191'
        ]);

        // Update auth user
        $request->user()->update($payload);

        return redirect()->route('profile');
    }

    public function production_filter(Request $request){
        $selected_order = $request->input('select_order');
        //$startdate = $request->input('startdate');
        //$enddate = $request->input('enddate');

        return redirect()->route('profile',['#submitted_orders'])->with(['selected_order' => $selected_order]);
    }

    /**
     * Get recent file by name
     *
     * @param \Illuminate\Http\Request $request
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     *
     * @return string
     */
    public function getRecentFileByName(Request $request)
    {
        $this->validate($request, [
            'fileName' => 'required|string',
            'folder'   => 'required|string',
        ]);

        /** @var User $authUser */
        $authUser = $request->user();
        $fileName = $request->get('fileName');
        $folder = $request->get('folder');
        $format = $request->get('format', 'base64');

        $path = sprintf(public_path('uploads/%s/%s/%s'), $authUser->name, $folder, $fileName);

        if (\File::exists($path) === false) {
            throw new FileNotFoundException("File {$fileName} was not found.");
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);

        if ($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
            throw new InvalidArgumentException('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        }

        $response = null;

        switch ($format) {
            case 'base64': $response = 'data:image/' . $type . ';base64,' . base64_encode(\File::get($path)); ; break;
        }

        return response()->json($response, 200);
    }
}
