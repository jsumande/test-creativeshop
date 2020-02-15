<?php 

namespace App\Http\Controllers\Super;

use App\Plan;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PlanController extends Controller
{
	public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('Plan'));

    }

    public function index(){

    	if(\request()->ajax()){

            $plan = Plan::all();

            return \datatables()->of($plan)
                ->addColumn('action', function ($row) {
                    $action = '';

                        $action.= '<a href="' . route('super.plan.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                      data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                        $action.= ' <a href="javascript:;" class="btn btn-danger btn-circle delete-row"
                      data-toggle="tooltip" data-row-id="' . $row->id . '" data-original-title="'.__('app.delete').'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    return $action;
                })
              
                ->editColumn('name', function ($row) {
                    return ucfirst($row->plan_name);
                })
                ->editColumn('monthly', function ($row) {
                    return ucfirst('AED '.$row->monthly);
                })
                ->editColumn('annual', function ($row) {
                    return ucfirst('AED '.$row->annual);
                })
                ->editColumn('services_limit', function ($row) {
                    return ucfirst($row->services_limit);
                })
                ->editColumn('bookings_limit', function ($row) {
                    return ucfirst($row->bookings_limit);
                })

                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
        }

    	return view('super.plans.index');
    }

    public function create()
    {
        return view('super.plans.create');
    }

    public function store(Request $request)
    {

        $plan = new Plan();
        $plan->plan_name = $request->name;
        $plan->description = $request->description;
        $plan->monthly = $request->monthly;
        $plan->annual = $request->annual;
        $plan->services_limit = $request->services;
        $plan->bookings_limit = $request->bookings;
        $plan->save();

        return Reply::redirect($request->redirect_url, __('messages.createdSuccessfully'));
    }

    public function edit(Plan $plan)
    {
        return view('super.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {	

        $plan = Plan::find($id);
        $plan->plan_name = $request->name;
        $plan->description = $request->description;
        $plan->monthly = $request->monthly;
        $plan->annual = $request->annual;
        $plan->services_limit = $request->services;
        $plan->bookings_limit = $request->bookings;
        $plan->save();

        return Reply::redirect(route('super.plan.index'), __('messages.updatedSuccessfully'));
    }

    public function destroy($id)
    {
        Plan::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }
}

?>