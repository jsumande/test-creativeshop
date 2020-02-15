<?php

namespace App\Http\Controllers\Admin;

use App\BusinessService;
use App\Category;
use App\EmployeeGroup;
use App\Helper\Files;
use App\Helper\Reply;
use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Http\Requests\Service\StoreService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.employee'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index()
    {
        if(\request()->ajax()){

            $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id');
              
            // $employee = User::where('is_employee', '1');
            $employee = User::leftJoin('business_user', 'users.id', '=' , 'business_user.user_id')
              ->leftJoin('businesses', 'business_user.business_id', 'businesses.id')
              ->select('users.*')
              ->where('business_user.business_id',$Business_id)->get();

            return \datatables()->of($employee)
                ->addColumn('action', function ($row) {


                    $action = '';

                    $action.= '<a href="' . route('admin.employee.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                      data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                    $action.= ' <a href="javascript:;" class="btn btn-danger btn-circle delete-row"
                      data-toggle="tooltip" data-row-id="' . $row->id . '" data-original-title="'.__('app.delete').'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->addColumn('image', function ($row) {
                    return '<img src="'.$row->user_image_url.'" class="img img-fluid iw-60" /> ';
                })
                ->editColumn('name', function ($row) {
                    return ucfirst($row->name);
                })
                ->editColumn('group_id', function ($row) {
                    if(!is_null($row->group_id)) {
                        return ucfirst($row->employeeGroup->name);
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'image'])
                ->toJson();
        }

        return view('admin.employees.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $groups = EmployeeGroup::all();
        return view('admin.employees.create', compact('groups'));
    }

    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        $user = new User();

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->group_id = $request->group_id;
        $user->is_employee = '1';
        $user->calling_code = $request->calling_code;
        $user->mobile = $request->mobile;

        if($request->password != ''){
            $user->password = $request->password;
        }

        if ($request->hasFile('image')) {
            $user->image = Files::upload($request->image,'avatar');
        }

        $user->save();

        return Reply::redirect(route('admin.employee.index'), __('messages.createdSuccessfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $groups = EmployeeGroup::all();
        $employee = User::where('id', $id)->first();
        return view('admin.employees.edit', compact('employee', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->group_id     = $request->group_id;

        if($request->password != ''){
            $user->password = $request->password;
        }

        if (($request->mobile != $user->mobile || $request->calling_code != $user->calling_code) && $user->mobile_verified == 1) {
            $user->mobile_verified = 0;
        }

        $user->mobile       = $request->mobile;
        $user->calling_code = $request->calling_code;
        
        if ($request->hasFile('image')) {
            $user->image = Files::upload($request->image,'avatar');
        }

        $user->save();

        return Reply::redirect(route('admin.employee.index'), __('messages.updatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }
}
