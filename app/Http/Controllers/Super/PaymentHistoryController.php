<?php

namespace App\Http\Controllers\Super;

use App\Payment_History;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentHistoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('Payment History'));

    }

    public function index(){


    	$payment_history = Payment_History::
    		leftJoin('businesses','payment_history.business_id','businesses.id')
            ->leftJoin('plan','payment_history.plan_id','plan.id')
            ->leftJoin('users','payment_history.user_id','users.id')
            ->get();
    	return view('super.history.index',compact('payment_history'));
    }
}
