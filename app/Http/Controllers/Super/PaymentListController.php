<?php

namespace App\Http\Controllers\Super;

use App\Plan;
use App\Subscription;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentListController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('Payment List'));

    }


    public function index(){

    	if(\request()->ajax()){

            $plan = Subscription::
            leftJoin('businesses','subscription.business_id','businesses.id')
            ->leftJoin('plan','subscription.plan_id','plan.id')
            ->leftJoin('users','subscription.user_id','users.id')
            ->select('subscription.*','businesses.title','plan.plan_name','users.email')
            ->groupBy('subscription.id')
            // ->whereDate('subscription.last_payment', '<' , date('Y-m'))
            ->get();

            return \datatables()->of($plan)
                ->addColumn('payment_status', function ($row) {
                   	
                	if($row->recuring_payment == 'Monthly'){
                		$date = date('Y-m');
	                	$sample = date('Y-m-d',strtotime($row->last_payment));

	                	if($sample < $date)
	                	{
	                		return '<label class="badge badge-danger">'.$sample.'</label>';
	                	}
	                	else{
	                		return '<label class="badge badge-success">'.$sample.'</label>';
	                	}
                	}
                	else{
                		$date = date('Y');
	                	$sample = date('Y',strtotime($row->last_payment));

	                	if($sample < $date)
	                	{
	                		return '<label class="badge badge-danger">Not Paid</label>';
	                	}
	                	else{
	                		return '<label class="badge badge-success">Paid</label>';
	                	}
                	}


                	
                    
                })
              
                ->editColumn('name', function ($row) {
                    return ucfirst($row->title);
                })
                ->editColumn('plan', function ($row) {
                    return ucfirst($row->plan_name);
                })
                ->editColumn('email', function ($row) {
                    return ucfirst($row->email);
                })
                ->editColumn('last_payment', function ($row) {
                    return ucfirst($row->last_payment);
                })
                ->editColumn('next_payment', function ($row) {
                    return ucfirst($row->next_payment);
                })
                ->editColumn('recuring_payment', function ($row) {
                    return ucfirst($row->recuring_payment);
                })

                ->addIndexColumn()
                ->rawColumns(['payment_status'])
                ->toJson();
        }


    	return view('super.list.index');
    }
}
