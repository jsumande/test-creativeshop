<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Helper\Files;
use App\Helper\Reply;
use App\Http\Requests\Customer\StoreCustomer;
use App\Notifications\NewUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\UpdateCustomer;

class CustomerController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.customers'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordsLoad = 8;
        if (\request()->ajax()) {
            $totalRecords = User::where('is_admin', 0)
                ->where('is_employee', 0)
                ->orderBy('id', 'desc');
            if (\request('param') != '') {
                $totalRecords = $totalRecords->where('name', 'LIKE', '%' . \request('param') . '%');
                $totalRecords = $totalRecords->orWhere('email', 'LIKE', '%' . \request('param') . '%');
                $totalRecords = $totalRecords->orWhere('mobile', 'LIKE', '%' . \request('param') . '%');
            }
            $totalRecords = $totalRecords->count();

            $customers = User::with('completedBookings')
                ->where('is_admin', 0)
                ->where('is_employee', 0);
            if (\request('param') != '') {
                $customers = $customers->where('name', 'LIKE', '%' . \request('param') . '%');
                $customers = $customers->orWhere('email', 'LIKE', '%' . \request('param') . '%');
                $customers = $customers->orWhere('mobile', 'LIKE', '%' . \request('param') . '%');
            }

            $customers = $customers->take(\request('take'));

            $customers = $customers->orderBy('id', 'desc')->get();

            $view = view('admin.customer.list_ajax', compact('customers', 'totalRecords', 'recordsLoad'))->render();
            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }
        return view('admin.customer.index', compact('recordsLoad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $request)
    {
        $user = new User();
        $user->name = $request->name;
        if ($request->email != '') {
            $user->email = $request->email;
        }
        $user->mobile = $request->mobile;
        $user->password = '123456';
        $user->is_admin = 0;
        $user->save();

        $user->notify(new NewUser('123456'));

        return Reply::successWithData(__('messages.createdSuccessfully'), ['user_id' => $user->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::findOrFail($id);

        if (\request()->ajax()) {
            $view = view('admin.customer.ajax_show', compact('customer'))->render();
            return Reply::dataOnly(['status' => 'success', 'view' => $view]);
        }

        $completedBookings = Booking::where('user_id', $id)->where('status', 'completed')->count();
        $pendingBookings = Booking::where('user_id', $id)->where('status', 'pending')->count();
        $canceledBookings = Booking::where('user_id', $id)->where('status', 'canceled')->count();
        $inProgressBookings = Booking::where('user_id', $id)->where('status', 'in progress')->count();
        $earning = Booking::where('user_id', $id)->where('status', 'completed')->sum('amount_to_pay');

        return view('admin.customer.show', compact('customer', 'completedBookings', 'pendingBookings', 'inProgressBookings', 'canceledBookings', 'earning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = User::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomer $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != '') {
            $user->password = $request->password;
        }

        if ($request->hasFile('image')) {
            $user->image = Files::upload($request->image,'avatar');
        }

        $user->save();

        return Reply::redirect(route('admin.customers.show', $id), __('messages.updatedSuccessfully'));
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
        return Reply::redirect(route('admin.customers.index'), __('messages.recordDeleted'));
    }

    public function customerBookings($id)
    { }
}
