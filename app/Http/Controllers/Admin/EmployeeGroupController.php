<?php

namespace App\Http\Controllers\Admin;

use App\EmployeeGroup;
use App\Helper\Reply;
use App\Http\Requests\EmployeeGroup\StoreRequest;
use App\Http\Requests\EmployeeGroup\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeGroupController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('app.employeeGroup'));
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
            
            $employeeGroup = EmployeeGroup::all()->where('business_id',$Business_id);

            return \datatables()->of($employeeGroup)
                ->addColumn('action', function ($row) {
                    $action = '';

                    $action.= '<a href="' . route('admin.employee-group.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                      data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                    $action.= ' <a href="javascript:;" class="btn btn-danger btn-circle delete-row"
                      data-toggle="tooltip" data-row-id="' . $row->id . '" data-original-title="'.__('app.delete').'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->editColumn('name', function ($row) {
                    return ucfirst($row->name);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.employee-group.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.employee-group.create');
    }

    /**
     * @param StoreRequest $request
     * @return array
     */
    public function store(StoreRequest $request)
    {
        $user = new EmployeeGroup();
        $user->name = $request->name;
        $user->save();

        return Reply::redirect(route('admin.employee-group.index'), __('messages.createdSuccessfully'));

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
        $employeeGroup = EmployeeGroup::where('id', $id)->first();
        return view('admin.employee-group.edit', compact('employeeGroup'));
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
        $user = EmployeeGroup::findOrFail($id);

        $user->name = $request->name;
        $user->save();

        return Reply::redirect(route('admin.employee-group.index'), __('messages.updatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeGroup::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }
}
