<?php

namespace App\Http\Controllers\Admin;

use App\BusinessService;
use App\Category;
use App\Helper\Files;
use App\Helper\Reply;
use App\Http\Requests\Service\StoreService;
use Illuminate\Support\Facades\DB;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessServiceController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.services'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request()->ajax()){

            $Business_id = DB::table('business_user')
                       ->select('business_user.*')
                       ->where('user_id',$this->user->id)
                       ->pluck('business_id');
            
            $services = BusinessService::where('business_id',$Business_id)->get();

            return \datatables()->of($services)
                ->addColumn('action', function ($row) {
                    $action = '';

                    $action.= '<a href="' . route('admin.business-services.edit', [$row->id]) . '" class="btn btn-primary btn-circle"
                      data-toggle="tooltip" data-original-title="'.__('app.edit').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

                    $action.= ' <a href="javascript:;" class="btn btn-danger btn-circle delete-row"
                      data-toggle="tooltip" data-row-id="' . $row->id . '" data-original-title="'.__('app.delete').'"><i class="fa fa-times" aria-hidden="true"></i></a>';
                    return $action;
                })
                ->addColumn('image', function ($row) {
                    return '<img src="'.$row->service_image_url.'" class="img img-fluid iw-60" /> ';
                })
                ->editColumn('name', function ($row) {
                    return ucfirst($row->name);
                })
                ->editColumn('status', function ($row) {
                    if($row->status == 'active'){
                        return '<label class="badge badge-success">'.__("app.active").'</label>';
                    }
                    elseif($row->status == 'deactive'){
                        return '<label class="badge badge-danger">'.__("app.deactive").'</label>';
                    }
                })
                ->editColumn('location_id', function ($row) {
                    return ucfirst($row->location->name);
                })
                ->editColumn('category_id', function ($row) {
                    return ucfirst($row->category->name);
                })
                ->editColumn('price', function ($row) {

                    if($row->price == 0){
                        return '<p>No price</p>';
                    }
                    else{
                        return $row->price;
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['action', 'image', 'status','price'])
                ->toJson();
        }

        return view('admin.business_service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $locations = Location::orderBy('name', 'ASC')->get();
        return view('admin.business_service.create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreService $request)
    {

        $Business_id = DB::table('business_user')
                       ->select('business_user.*')
                       ->where('user_id',$this->user->id)
                       ->pluck('business_id')->first();

        if($request->price == 'No Price'){
            $price = 0;
            $discount = 0;
        }
        else{
            $price = $request->price;
            $discount = $request->discount;
        }

        $service = new BusinessService();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $price;
        $service->time = $request->time;
        $service->time_type = $request->time_type;
        $service->discount = $discount;
        $service->discount_type = $request->discount_type;
        $service->category_id = $request->category_id;
        $service->location_id = $request->location_id;
        $service->slug = $request->slug;
        $service->business_id = $Business_id;
        if ($request->hasFile('image')) {
            $service->image = Files::upload($request->image,'service');
        }
        $service->save();

        return Reply::redirect(route('admin.business-services.index'), __('messages.createdSuccessfully'));

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
    public function edit(BusinessService $businessService)
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $locations = Location::orderBy('name', 'ASC')->get();

        return view('admin.business_service.edit', compact('businessService', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreService $request, $id)
    {

        if($request->price_checker == 'No Price'){
            $price = 0;
            $discount = 0;
        }
        else{
            $price = $request->price;
            $discount = $request->discount;
        }

        //  echo "<pre>";

        // var_dump("ID ".$id);
        // var_dump("name ".$request->name);
        // var_dump("slug ".$request->slug);
        // var_dump("description ".$request->description);
        // var_dump("Price Checker ".$request->price_checker);
        // var_dump("price ".$request->price);
        // var_dump("discount ".$request->discount);
        // var_dump("discount_type ".$request->discount_type);
        // var_dump("location_id ".$request->location_id);
        // var_dump("category_id ".$request->category_id);
        // var_dump("time ".$request->time);
        // var_dump("time_type ".$request->time_type);
        // var_dump("category_id ".$request->category_id);
        // var_dump("status ".$request->status);
        // var_dump("image ".$request->image);

        $service = BusinessService::find($id);

        // var_dump($service);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->time = $request->time;
        $service->time_type = $request->time_type;
        $service->discount = $request->discount;
        $service->discount_type = $request->discount_type;
        $service->category_id = $request->category_id;
        $service->location_id = $request->location_id;
        $service->status = $request->status;
        $service->slug = $request->slug;
        if ($request->hasFile('image')) {
            $service->image = Files::upload($request->image,'service',400,null);
        }
        $service->save();
        return Reply::redirect(route('admin.business-services.index'), __('messages.updatedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BusinessService::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }
}
