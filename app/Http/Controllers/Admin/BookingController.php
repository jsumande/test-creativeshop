<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\BookingItem;
use App\BusinessService;
use App\CompanySetting;
use App\EmployeeGroup;
use App\Subscription;
use App\Helper\Reply;
use App\Location;
use App\Notifications\BookingCancel;
use App\Notifications\BookingReminder;
use App\TaxSetting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\BookingStatusMultiUpdate;
use App\Http\Requests\Booking\UpdateBooking;
use App\PaymentGatewayCredentials;

class BookingController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $credentials = PaymentGatewayCredentials::first();
        $setting = CompanySetting::with('currency')->first();

        view()->share('pageTitle', __('menu.bookings'));
        view()->share('credentials', $credentials);
        view()->share('setting', $setting);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id'); 
        $location_checker = false;

        if(\request()->ajax()){


            if(!$this->user->is_admin){
                $bookings = Booking::where('user_id',$this->user->id)->orderBy('date_time', 'desc');
            }
            else{
                $bookings = Booking::orderBy('date_time', 'desc');

            if(\request('filter_status') != ""){
                $bookings->where('bookings.status', \request('filter_status'));
            }

            if(\request('filter_customer') != ""){
                $bookings->where('bookings.user_id', \request('filter_customer'));
            }

            if(\request('filter_location') != ""){
                $location_checker = true;
                // $bookings = Booking::orderBy('date_time', 'desc');
                $bookings->leftJoin('booking_items', 'bookings.id', 'booking_items.booking_id')
                    ->leftJoin('business_services', 'booking_items.business_service_id', 'business_services.id')
                    ->leftJoin('locations', 'business_services.location_id', 'locations.id')
                    ->select('bookings.*')
                    ->where('locations.id', request('filter_location'));
                    // ->groupBy('bookings.id');
            }
            else{
                $location_checker = false;
            }

            if(\request('filter_date') != ""){
                $startTime = Carbon::parse(request('filter_date'), $this->settings->timezone)->setTimezone('UTC');
                $endTime = $startTime->copy()->addDay()->subSecond();
                $bookings->whereBetween('bookings.date_time', [$startTime, $endTime]);
            }

            // if(!$this->user->is_admin){
            //     ($this->user->is_employee) ? $bookings->where('bookings.employee_id', $this->user->id) : $bookings->where('bookings.user_id', $this->user->id);
            // }

                if($location_checker == true) $bookings->get();
                else $bookings->where('business_id',$Business_id)->get();
            }

            return \datatables()->of($bookings)
                ->editColumn('id', function ($row) {
                    $view = view('admin.booking.list_view', compact('row'))->render();
                    return $view;
                })
                ->rawColumns(['id'])
                ->toJson();
        }

        // $customers = User::all();
        $customers = DB::table('users')
                    ->leftJoin('business_user', 'users.id' , '=' , 'business_user.user_id')
                    ->leftJoin('businesses', 'business_user.business_id' , '=' , 'businesses.id' )
                    ->select('users.*','businesses.*', 'business_user.*')
                    ->where('businesses.id',$Business_id)
                    ->get();

        // $locations = Location::where('business_id',$Business_id)->get();
        $locations = DB::table('locations')
                    ->leftJoin('bookings', 'locations.booking_id' , '=' , 'bookings.id')
                    ->leftJoin('businesses', 'locations.business_id' , '=' , 'businesses.id' )
                    ->select('locations.*','businesses.*', 'bookings.*')
                    ->where('businesses.id',$Business_id)
                    ->get();

        $status = \request('status');

        $today = date('Y/m/d');
        $pending = Booking::
        leftJoin('subscription','bookings.business_id', '=' , 'subscription.business_id')
        ->where('bookings.business_id',$Business_id)
        ->where('bookings.status','pending')
        // ->where(function ($query){
        //     $query->where('bookings.status', '=' ,'in progress')
        //           ->orWhere('bookings.status', '=' ,'pending');
        // })
        ->whereDate('subscription.last_payment','<=',$today)
        ->whereDate('subscription.next_payment','>=',$today)
        ->count();

        $is_progress = Booking::
        leftJoin('subscription','bookings.business_id', '=' , 'subscription.business_id')
        ->where('bookings.business_id',$Business_id)
        ->where('bookings.status','in progress')
        // ->where(function ($query){
        //     $query->where('bookings.status', '=' ,'in progress')
        //           ->orWhere('bookings.status', '=' ,'pending');
        // })
        ->whereDate('subscription.last_payment','<=',$today)
        ->whereDate('subscription.next_payment','>=',$today)
        ->count();


        $booking_limit = Subscription::
        leftJoin('plan','subscription.plan_id', '=' , 'plan.id')
        ->where('subscription.business_id',$Business_id)->first();

        return view('admin.booking.index', compact('customers', 'status', 'locations','pending','is_progress','booking_limit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::with('employee')->find($id);
        $view = view('admin.booking.show', compact('booking'))->render();

        return Reply::dataOnly(['status' => 'success', 'view' => $view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $tax = TaxSetting::active()->first();
        $employees = User::where('is_employee', '1')->get();
        $businessServices = BusinessService::active()->get();
        $view = view('admin.booking.edit', compact('booking', 'tax', 'businessServices', 'employees'))->render();
        return Reply::dataOnly(['status' => 'success', 'view' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBooking $request, $id)
    {
        //delete old items and enter new
        BookingItem::where('booking_id', $id)->delete();

        $services = $request->cart_services;
        $quantity = $request->cart_quantity;
        $prices = $request->cart_prices;
        $discount = $request->cart_discount;
        $payment_status = $request->payment_status;
        $discountAmount = 0;
        $amountToPay = 0;

        $originalAmount = 0;
        $bookingItems = array();

        foreach ($services as $key=>$service){
            $amount = ($quantity[$key] * $prices[$key]);

            $bookingItems[] = [
                "business_service_id" => $service,
                "quantity" => $quantity[$key],
                "unit_price" => $prices[$key],
                "amount" => $amount
            ];

            $originalAmount = ($originalAmount + $amount);
        }


        $booking = Booking::find($id);

        $taxAmount = 0;
        if($booking->tax_amount > 0){
            $taxAmount = $booking->tax_amount;
        }

        if($discount > 0){
            if($discount > 100) $discount = 100;

            $discountAmount = (($discount/100) * $originalAmount);
        }

        $amountToPay = ($originalAmount - $discountAmount + $taxAmount);
        $amountToPay = round($amountToPay, 2);


        $booking->date_time   = $request->booking_date.' '.Carbon::createFromFormat('h:i A', $request->booking_time)->format('H:i:s');
        $booking->status      = $request->status;
        $booking->employee_id = ($request->employee_id != '') ? $request->employee_id : null ;
        $booking->original_amount = $originalAmount;
        $booking->discount = $discountAmount;
        $booking->discount_percent = $request->cart_discount;;
        $booking->amount_to_pay = $amountToPay;
        $booking->payment_status = $payment_status;
        $booking->save();

        foreach ($bookingItems as $key=>$bookingItem){
            $bookingItems[$key]['booking_id'] = $booking->id;
        }

        DB::table('booking_items')->insert($bookingItems);

        $view = view('admin.booking.show', compact('booking'))->render();

        return Reply::successWithData('messages.updatedSuccessfully', ['status' => 'success', 'view' => $view]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }

    public function download($id) {

        $booking = Booking::findOrFail($id);

        if($booking->status != 'completed'){
            abort(403);
        }

        if($this->user->is_admin || $booking->user_id == $this->user->id){
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('admin.booking.receipt',compact('booking') );
            $filename = __('app.receipt').' #'.$booking->id;
//       return $pdf->stream();
            return $pdf->download($filename . '.pdf');
        }
        else{
            abort(403);
        }
    }

    public function requestCancel($id){
        $booking = Booking::findOrFail($id);
        $booking->status = 'canceled';
        $booking->save();

        $tax = TaxSetting::first();
        $view = view('admin.booking.show', compact('booking', 'tax'))->render();

        $admins = User::where('is_admin', 1)->get();

        Notification::send($admins, new BookingCancel($booking));

        return Reply::dataOnly(['status' => 'success', 'view' => $view]);
    }

    public function sendReminder(){
        $bookingId = \request('bookingId');
        $booking = Booking::findOrFail($bookingId);
        $customer = User::findOrFail($booking->user_id);
        $customer->notify(new BookingReminder($booking));

        return Reply::success(__('messages.bookingReminderSent'));
    }

    public function multiStatusUpdate(BookingStatusMultiUpdate $request) {
        Booking::whereIn('id', $request->booking_checkboxes)->update([
            'status' => $request->change_status
        ]);

        // $bookings = Booking::find($request->booking_checkboxes);
        // $bookings->map(function ($booking, $key) use ($request){
        //     $booking->status = $request->change_status;
        // });

        return Reply::dataOnly(['status' => 'success', '']);
    }

}
