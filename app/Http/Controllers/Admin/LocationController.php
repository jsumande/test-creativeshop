<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\StoreLocation;
use App\Location;
use App\Businesses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{


    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.locations'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){

            $Business_id = DB::table('business_user')
                       ->select('business_user.*')
                       ->where('user_id',$this->user->id)
                       ->pluck('business_id');

            $locations = Location::where('business_id',$Business_id)->get();

            return datatables()->of($locations)
                ->addColumn('action', function ($row) {
                    $action = '';

                    $action.= '<a href="' . route('admin.locations.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                      data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                    $action.= ' <a href="javascript:;" class="btn btn-danger btn-circle delete-row"
                      data-toggle="tooltip" data-row-id="' . $row->id . '" data-original-title="'.__('app.delete').'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    return $action;
                })
//                ->addColumn('image', function ($row) {
//                    return '<img src="'.$row->category_image_url.'" class="img img-fluid iw-60" /> ';
//                })
                ->editColumn('name', function ($row) {
                    return ucfirst($row->name);
                })
//                ->editColumn('status', function ($row) {
//                    if($row->status == 'active'){
//                        return '<label class="badge badge-success">'.__("app.active").'</label>';
//                    }
//                    elseif($row->status == 'deactive'){
//                        return '<label class="badge badge-danger">'.__("app.deactive").'</label>';
//                    }
//                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('admin.location.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocation $request)
    {
        $Business_update_id = DB::table('business_user')
                       ->select('business_user.business_id','business_user.business_id')
                       ->where('user_id',$this->user->id)
                       ->pluck('business_id')->first();

        // $business_update_id = Businesses::where('user_id',$this->user->id)->pluck('business_id')->first();

        $location = new Location();
        $location->business_id = $Business_update_id;
        $location->booking_id = null;
        $location->name = $request->name;

        $location->save();

        return Reply::redirect($request->redirect_url, __('messages.createdSuccessfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('admin.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocation $request, $id)
    {
        $location = Location::find($id);
        $location->name = $request->name;
//        $location->status = $request->status;
//        if ($request->hasFile('image')) {
//            $location->image = $request->image->hashName();
//            $request->image->store('user-uploads/category');
//        }
        $location->save();

        //update business servicess status for the category
//        BusinessService::where('category_id', $id)->update(['status' => $request->status]);

        return Reply::redirect(route('admin.locations.index'), __('messages.updatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Location::destroy($id);

        return Reply::success(__('messages.recordDeleted'));
    }
}
