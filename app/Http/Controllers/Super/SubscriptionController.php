<?php 

namespace App\Http\Controllers\Super;

use App\Subscription;
use App\Businesses;
use App\Plan;
use App\User;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
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
            ->groupBy('subscription.id')
            ->get();

            return \datatables()->of($plan)

                // ->addColumn('action', function ($row) {
                //     $action = '';

                //         $action.= '<a href="' . route('super.subscription.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                //       data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                //     return $action;
                // })
                
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
                // ->rawColumns(['action'])
                ->toJson();
        }

    	return view('super.subscription.index');
    }

    public function create()
    {
        $business = Businesses::get();
        $plan = Plan::get();
        return view('super.subscription.create')
        ->with('business',$business)
        ->with('plan',$plan);
    }

    public function store(Request $request)
    {

        $id = DB::table('business_user')
                  ->join('businesses','business_user.business_id' , '=' , 'businesses.id')
                  ->join('users','business_user.user_id' , '=' , 'users.id')
                  ->select('business_user.*','users.*','businesses.*')
                  ->where('business_user.business_id', $request->business)
                  ->where('users.is_admin', 1)
                  ->pluck('users.id')->first();

        $plan = new Subscription();
        $plan->business_id = $request->business;
        $plan->plan_id = $request->plan;
        $plan->user_id = $id;
        $plan->save();

        return Reply::redirect($request->redirect_url, __('messages.createdSuccessfully'));
    }

    public function edit(Subscription $subscription)
    {
        $business = Businesses::get();
        $plan = Plan::get();
        return view('super.subscription.edit', compact('subscription'))->with('business',$business)
        ->with('plan',$plan);
    }

    public function update(Request $request, $id)
    {   

        $user_id = DB::table('business_user')
                  ->join('businesses','business_user.business_id' , '=' , 'businesses.id')
                  ->join('users','business_user.user_id' , '=' , 'users.id')
                  ->select('business_user.*','users.*','businesses.*')
                  ->where('business_user.business_id', $request->business)
                  ->where('users.is_admin', 1)
                  ->pluck('users.id')->first();

        $plan = Subscription::find($id);
        $plan->business_id = $request->business;
        $plan->plan_id = $request->plan;
        $plan->user_id = $user_id;
        $plan->save();

        return Reply::redirect(route('super.subscription.index'), __('messages.updatedSuccessfully'));
    }


}




 ?>