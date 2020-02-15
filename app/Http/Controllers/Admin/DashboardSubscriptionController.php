<?php 

namespace App\Http\Controllers\Admin;

use App\Subscription;
use App\Businesses;
use App\Plan;
use App\User;
use App\PaymentCard;
use App\Payment_Subscription;
use App\Payment_History;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardSubscriptionController extends Controller
{

	public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('Subsription'));

    }


    public function index(){

    	if(\request()->ajax()){

            // $plan = Subscription::all();
            $plan = Subscription::
            leftJoin('businesses','subscription.business_id','businesses.id')
            ->leftJoin('plan','subscription.plan_id','plan.id')
            ->leftJoin('users','subscription.user_id','users.id')
            ->select('subscription.*','businesses.title','plan.plan_name','users.email')
            ->where('subscription.user_id',$this->user->id)
            ->groupBy('subscription.id')
            ->get();

            return \datatables()->of($plan)

                ->addColumn('action', function ($row) {
                    $action = '';

                    $action.= '<a href="' . route('admin.subscription.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                      data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                    return $action;
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
                ->rawColumns(['action'])
                ->toJson();
        }
    	return view('admin.subscription.index');
    }

    public function edit(Subscription $subscription)
    {
    	$plan = Plan::get();
        return view('admin.subscription.edit', compact('subscription'))->with('plan',$plan);
    }


    public function update(Request $request, $id)
    {   
        // if($request->payment == 'Monthly' && $request->recuring == 'Monthly'){
        //     $year = date('Y');
        //     $date = date($year.'-m-d', strtotime($request->next_payment));
        // }
        // $last_date = '';
        // $next_date = '';
        // $date = '';

        if($request->payment == 'Monthly' && $request->recuring == 'Annual'){

            // if(date('m') > date('m', strtotime("+1 month"))){
            //     $month = date('m', strtotime("+1 month"));
            //     $years = date('Y', strtotime("+1 year"));
            //     $date = date($years.'-'.$month.'-d', strtotime($request->next_payment));
            // }else{
            //     $month = date('m', strtotime("+1 month"));
            //     $date = date('Y-'.$month.'-d', strtotime($request->next_payment));
            // }
            $dates = date('Y-m-d', strtotime("+1 month",strtotime($request->next_payment)));
            $last_date = $request->next_payment;
            $next_date = $dates;
        }
        elseif($request->payment == 'Annual' && $request->recuring == 'Monthly'){
            $year = date('Y', strtotime("+1 year",strtotime($request->last_payment)));
            $date = date($year.'-m-d', strtotime($request->last_payment));

            $last_date = $request->last_payment;
            $next_date = $date;
        }
        else{
            $last_date = $request->last_payment;
            $next_date = $request->next_payment;
        }
        // else{
        //     $year = date('Y', strtotime("+1 year"));
        //     $date = date($year.'-m-d', strtotime($request->next_payment));
        // }
        $subscription = Subscription::find($id);
        $subscription->plan_id = $request->plan_name;
        $subscription->recuring_payment = $request->payment;
        $subscription->last_payment = $last_date;
        $subscription->next_payment = $next_date;
        $subscription->save();

        $payment_sub = Payment_Subscription::
            where('subscription_id',$request->subscription_id)
            ->first();

        $plan_sub = Plan::
            where('id',$request->plan_name)
            ->first();

        if($request->payment == 'Monthly'){
            $amount = $plan_sub['monthly'];
        }
        else{
            $amount = $plan_sub['annual'];
        }

        // Tokenization
            $token = [

                "merchant_email" => "fouademi@gmail.com",
                "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
                "title" => $plan_sub['plan_name'],
                "cc_first_name" => $payment_sub['cc_first_name'],
                "cc_last_name " => $payment_sub['cc_last_name'],
                "order_id" => $payment_sub['order_id'],
                "product_name" => $payment_sub['product_name'],
                "customer_email" => $payment_sub['customer_email'],
                "phone_number" => $payment_sub['phone_number'],
                "amount" => $amount,
                "currency" => $payment_sub['currency'],
                "address_billing" => $payment_sub['address_billing'],
                "state_billing" => $payment_sub['state_billing'],
                "city_billing" => $payment_sub['city_billing'],
                "postal_code_billing" => $payment_sub['postal_code_billing'],
                "country_billing" => $payment_sub['country_billing'],
                "address_shipping" => $payment_sub['address_shipping'],
                "city_shipping" => $payment_sub['city_shipping'],
                "state_shipping" => $payment_sub['state_shipping'],
                "postal_code_shipping" => $payment_sub['postal_code_shipping'],
                "country_shipping " => $payment_sub['country_shipping'],
                "pt_token" =>   $payment_sub['pt_token'],
                "pt_customer_email" =>  $payment_sub['pt_customer_email'],
                "pt_customer_password" =>   $payment_sub['pt_customer_password'],

            ];

            $token_ch = curl_init('https://www.paytabs.com/apiv3/tokenized_transaction_prepare');
            curl_setopt($token_ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($token_ch, CURLOPT_POSTFIELDS, $token);

            // execute!
            $responses = curl_exec($token_ch);

            // close the connection, release resources used
            curl_close($token_ch);

            $results = json_decode($responses, true);
            // var_dump($results['transaction_id']);


            $transaction = [

                "merchant_email" => "fouademi@gmail.com",
                "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
                "transaction_id" => $results['transaction_id'],

            ];

            $transaction_ch = curl_init('https://www.paytabs.com/apiv2/verify_payment_transaction');
            curl_setopt($transaction_ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($transaction_ch, CURLOPT_POSTFIELDS, $transaction);

            // execute!
            $transaction_responses = curl_exec($transaction_ch);

            // close the connection, release resources used
            curl_close($transaction_ch);

            $transaction_results = json_decode($transaction_responses, true);
            

            $payment_historys = Payment_History::where('user_id',$this->user->id)->first();
            // var_dump($transaction_results);
            // var_dump($payment_historys['pt_invoice_id']);
            $payment_history = new Payment_History();
            $payment_history->business_id = $request->business_id;
            $payment_history->plan_id = $request->plan_id;
            $payment_history->user_id = $this->user->id;
            $payment_history->amount = $transaction_results['amount'];
            $payment_history->currency = $transaction_results['currency'];
            $payment_history->transaction_id = $transaction_results['transaction_id'];
            $payment_history->order_id = $transaction_results['order_id'];
            $payment_history->pt_invoice_id = $payment_historys['pt_invoice_id'];
            $payment_history->card_last_number = $payment_historys['card_last_number'];

            $payment_history->save();

            return Reply::redirect(route('admin.settings.index'), __('messages.updatedSuccessfully'));
            // return Reply::success(__('Successfully Created New Admin and Business'));
    }
}

?>