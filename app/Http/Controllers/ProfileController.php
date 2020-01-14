<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\User\User;
use App\Models\{Order, GripTape, Wheel\Wheel,ProductionComment};
use Session;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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

        $savedOrderBatches = Order::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedGripBatches = GripTape::where('created_by', $createdBy)->where('saved_batch', 1)->get();
        $savedWheelBatches = Wheel::where('created_by', $createdBy)->where('saved_batch', 1)->get();

        $returnorder = Order::where('created_by','=',$createdBy)->where('submit','=',1)->get();

        $selected_order = Session::get('selected_order');
        $startdate = Session::get('startdate');
        $enddate = Session::get('enddate');

        if(isset($startdate))
            $startdate_temp = $startdate;
        else
            $startdate_temp = date('Y-m-d',strtotime("-1 years"));
        if(isset($enddate))
            $enddate_temp = $enddate;
        else
            $enddate_temp = date('Y-m-d');

        if(!isset($selected_order)){
            $selected_order = $returnorder[0]['id'];
        }

        $comments = ProductionComment::where('order_id',$selected_order)->where('date','>',$startdate_temp)->where('date','<',$enddate_temp)->orderBy('date', 'asc')->get();

        return view('profile', compact('unSubmitOrders', 'submitorders', 'shipinfo', 'savedOrderBatches', 'savedGripBatches', 'savedWheelBatches', 'returnorder','startdate','enddate','selected_order', 'comments'));
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
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');

        return redirect()->back()->with(['selected_order' => $selected_order, 'startdate' => $startdate, 'enddate' => $enddate]);
    }
}
