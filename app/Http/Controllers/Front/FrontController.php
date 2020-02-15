<?php

namespace App\Http\Controllers\Front;

use App\Booking;
use App\Businesses;
use App\BusinessUser;
use App\BookingTime;
use App\BusinessService;
use App\Category;
use App\CompanySetting;
use App\Location;
use App\Media;
use App\PaymentGatewayCredentials;
use App\TaxSetting;
use App\FrontThemeSetting;
use App\ThemeSetting;
use App\SmtpSetting;
use App\SmsSetting;
use App\User;
use App\Language;
use App\Page;
use App\Plan;
use App\Payment_Subscription;
use App\Payment_History;
use App\Subscription;
use App\PaymentCard;
use Carbon\Carbon;
use App\Helper\Reply;
use App\Notifications\BookingLimit;
use App\Notifications\NewContact;
use App\Notifications\BookingConfirmation;
use App\Notifications\NewBooking;
use App\Notifications\NewUser;
use App\Notifications\VerifyPayment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactRequest;
use App\Http\Requests\Front\CartPageRequest;
use App\Http\Requests\StoreFrontBooking;
use App\Http\Controllers\Front\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Redirect;

class FrontController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request,$value = null)
    {

        // $payment_table = Subscription::
        //     leftJoin('businesses','subscription.business_id','businesses.id')
        //     ->leftJoin('plan','subscription.plan_id','plan.id')
        //     ->leftJoin('users','subscription.user_id','users.id')
        //     ->leftJoin('payment_history','subscription.user_id','payment_history.user_id')
        //     ->select('subscription.*','businesses.*','plan.*','users.*','payment_history.*')
        //     ->where('subscription.user_id',$this->user->id)
        //     // ->groupBy('subscription.id')
        //     ->get();

        //     echo $payment_table;

        if ($request->hasCookie('products')) {
            Cookie::queue(Cookie::forget('products'));
        }

        if ($request->hasCookie('bookingDetails')) {
            Cookie::queue(Cookie::forget('bookingDetails'));
        }

        $request->session()->forget('BusinessSample');
    // if($this->user){

    //         // if($this->url_slug == '/'){
    //         //     $Business_id = DB::table('business_user')
    //         //       ->select('business_user.*')
    //         //       ->where('user_id',$this->user->id)
    //         //       ->pluck('business_id');
    //         // }
    //         // else{
    //         //     $Business_id = DB::table('businesses')
    //         //       ->select('businesses.*')
    //         //       ->where('slug',$this->url_slug)
    //         //       ->pluck('id')->first();
    //         // }

    //         $Business_id = DB::table('businesses')
    //               ->select('businesses.*')
    //               ->where('slug',$this->url_slug)
    //               ->pluck('id')->first();

    //         $location = Location::where('name', request()->location)->first();
    //         $categories = Category::active()
    //             ->with([
    //                 'services' => function ($query) use ($location) {
    //                     if ($location !== null) {
    //                         $query->active()->where('location_id', $location->id);
    //                     } else {
    //                         $query->active();
    //                     }
    //                 }
    //             ])->where('business_id',$Business_id)
    //             ->get();


    //         $services = BusinessService::active()->where('business_id',$Business_id)->with('category');

    //     }
    //     else{
            if($this->url_slug != '/'){
                $Business_id = DB::table('businesses')
                  ->select('businesses.*')
                  ->where('slug',$request->path())
                  ->pluck('id')->first();

                // if($Business_id){
                //    session(['slug' => $this->url_slug]);
                // }

                $location = Location::where('name', request()->location)->first();
                $categories = Category::active()
                    ->with([
                        'services' => function ($query) use ($location) {
                            if ($location !== null) {
                                $query->active()->where('location_id', $location->id);
                            } else {
                                $query->active();
                            }
                        }
                    ])->where('business_id',$Business_id)
                    ->get();

                // $categories = Category::active()
                //     ->with([
                //         'services' => function ($query) use ($location) {
                //             if ($location !== null) {
                //                 $query->active()->where('location_id', $location->id);
                //             } else {
                //                 $query->active();
                //             }
                //         }
                //     ])->where('business_id',$Business_id)
                //     ->whereIn('business_id',function($query){
                //     $query->select('business_id')->from('categories')->groupBy('business_id')->havingRaw('count(business_id) > 2');
                //     })
                // ->get();


                $services = BusinessService::active()->where('business_id',$Business_id)->with('category');

                // $services = BusinessService::active()->where('business_id',$Business_id)->with('category')
                // ->whereIn('business_id',function($query){
                // $query->select('business_id')->from('categories')->groupBy('business_id')->havingRaw('count(business_id) > 2');
                // });

            }else{
                $request->session()->forget('slug');
                $location = Location::where('name', request()->location)->first();

                $categories = Category::active()
                    ->with([
                        'services' => function ($query) use ($location) {
                            if ($location !== null) {
                                $query->active()->where('location_id', $location->id);
                            } else {
                                $query->active();
                            }
                        }
                    ])->get();

                // $categories = Category::active()
                //     ->with([
                //         'services' => function ($query) use ($location) {
                //             if ($location !== null) {
                //                 $query->active()->where('location_id', $location->id);
                //             } else {
                //                 $query->active();
                //             }
                //         }
                //     ])
                //     ->whereIn('business_id',function($query){
                //     $query->select('business_id')->from('categories')->groupBy('business_id')->havingRaw('count(business_id) > 2');
                //     })->get();

                $services = BusinessService::active()->with('category');

                // $services = BusinessService::active()->with('category')->whereIn('business_id',function($query){
                // $query->select('business_id')->from('categories')->groupBy('business_id')->havingRaw('count(business_id) > 2');
                // });

            }
            // $request->session()->get('slug');
        //}

        if ($location !== null) {
                $services = $services->where('location_id', $location->id);
        }

        $services = $services->get();

            //return Reply::dataOnly(['categories' => $categories, 'services' => $services]);


        // if (request()->ajax()) {

        //     if($this->user){

        //     $Business_id = DB::table('business_user')
        //       ->select('business_user.*')
        //       ->where('user_id',$this->user->id)
        //       ->pluck('business_id');

        //     // $Business_id = DB::table('businesses')
        //     //   ->select('businesses.*')
        //     //   ->where('slug',$this->url_slug)
        //     //   ->pluck('id');

        //     $location = Location::where('name', request()->location)->first();
        //     $categories = Category::active()
        //         ->with([
        //             'services' => function ($query) use ($location) {
        //                 if ($location !== null) {
        //                     $query->active()->where('location_id', $location->id);
        //                 } else {
        //                     $query->active();
        //                 }
        //             }
        //         ])->where('business_id',$Business_id)
        //         ->get();


        //     $services = BusinessService::active()->where('business_id',$Business_id)->with('category');

        //     }
        //     else{

        //     $location = Location::where('name', request()->location)->first();

        //     $categories = Category::active()
        //         ->with([
        //             'services' => function ($query) use ($location) {
        //                 if ($location !== null) {
        //                     $query->active()->where('location_id', $location->id);
        //                 } else {
        //                     $query->active();
        //                 }
        //             }
        //         ])->get();

        //     $services = BusinessService::active()->with('category');

        //     }

        //     if ($location !== null) {
        //         $services = $services->where('location_id', $location->id);
        //     }

        //     $services = $services->get();

        //     return Reply::dataOnly(['categories' => $categories, 'services' => $services]);
        // } else {
        //     $categories = Category::active()->with(['services' => function ($query) {
        //         $query->active();
        //     }])->get();
        //     $services = BusinessService::active()->get();
        // }
        
        $images = Media::select('id', 'file_name')->latest()->get();

        return view('front.index', compact('categories', 'services', 'images'));
    }

    public function addOrUpdateProduct(Request $request)
    {   

        $request->session()->put('BusinessSample', $request->businessId);

        $newProduct = [
            "servicePrice" => $request->servicePrice,
            "serviceName" => $request->serviceName
        ];

        $products = [];
        $serviceQuantity = $request->serviceQuantity ?? 1;

        if (!$request->hasCookie('products')) {
            $newProduct = Arr::add($newProduct, 'serviceQuantity', $serviceQuantity);
            $products = Arr::add($products, $request->serviceId, $newProduct);

            return response([
                'status' => 'success',
                //'message' => __('messages.front.success.productAddedToCart'),
                'productsCount' => sizeof($products)
            ])->cookie('products', json_encode($products));
        }

        $products = json_decode($request->cookie('products'), true);

        if (!array_key_exists($request->serviceId, $products)) {
            $newProduct = Arr::add($newProduct, 'serviceQuantity', $serviceQuantity);
            $products = Arr::add($products, $request->serviceId, $newProduct);

            return response([
                'status' => 'success',
                //'message' => __('messages.front.success.productAddedToCart'),
                'productsCount' => sizeof($products)
            ])->cookie('products', json_encode($products));
        } else {
            if ($request->serviceQuantity) {
                $products[$request->serviceId]['serviceQuantity'] = $request->serviceQuantity;
            } else {
                $products[$request->serviceId]['serviceQuantity'] += 1;
            }
        }
        return response([
            'status' => 'success',
            //'message' => __('messages.front.success.cartUpdated'),
            'productsCount' => sizeof($products)
        ])->cookie('products', json_encode($products));
    }

    public function bookingPage(Request $request)
    {

        $bookingDetails = [];
        if ($request->hasCookie('bookingDetails')) {
            $bookingDetails = json_decode($request->cookie('bookingDetails'), true);
        }

        if ($request->ajax()) {
            return Reply::dataOnly(['status' => 'success', 'productsCount' => $this->productsCount]);
        }

        return view('front.booking_page', compact('bookingDetails'));
    }

    public function addBookingDetails(CartPageRequest $request)
    {
        $expireTime = Carbon::parse($request->bookingDate . ' ' . $request->bookingTime, $this->settings->timezone);
        $cookieTime = Carbon::now()->setTimezone($this->settings->timezone)->diffInMinutes($expireTime);

        return response(Reply::dataOnly(['status' => 'success']))->cookie('bookingDetails', json_encode(['bookingDate' => $request->bookingDate, 'bookingTime' => $request->bookingTime]), $cookieTime);
    }

    public function cartPage(Request $request)
    {
        $products = json_decode($request->cookie('products'), true);
        $bookingDetails = json_decode($request->cookie('bookingDetails'), true);
        $tax = TaxSetting::active()->first();

        return view('front.cart_page', compact('products', 'bookingDetails', 'tax'));
    }

    public function deleteProduct(Request $request, $id)
    {
        $products = json_decode($request->cookie('products'), true);

        if ($id != 'all') {
            Arr::forget($products, $id);
        } else {
            return response(Reply::successWithData(__('messages.front.success.cartCleared'), ['action' => 'redirect', 'url' => route('front.cartPage'), 'productsCount' => sizeof($products)]))->withCookie(Cookie::forget('bookingDetails'))->withCookie(Cookie::forget('products'));
        }

        if (sizeof($products) > 0 || $request->route()->getName() == 'front.deleteFrontProduct') {
            return response(Reply::successWithData(__('messages.front.success.productDeleted'), ['productsCount' => sizeof($products)]))->cookie('products', json_encode($products));
        }

        return response(Reply::successWithData(__('messages.front.success.cartCleared'), ['action' => 'redirect', 'url' => route('front.cartPage'), 'productsCount' => sizeof($products)]))->withCookie(Cookie::forget('bookingDetails'))->withCookie(Cookie::forget('products'));
    }

    public function updateCart(Request $request)
    {
        return response(Reply::success(__('messages.front.success.cartUpdated')))->cookie('products', json_encode($request->products));
    }

    public function checkoutPage()
    {
        $bookingDetails = request()->hasCookie('bookingDetails') ? json_decode(request()->cookie('bookingDetails'), true) : [];
        $totalAmount = array_reduce(json_decode(request()->cookie('products'), true), function ($sum, $item) {
            $sum += $item['servicePrice'] * $item['serviceQuantity'];
            return $sum;
        }, 0);
        $tax = TaxSetting::active()->first();

        if ($tax) {
            $totalAmount += ($tax->percent / 100) * $totalAmount;
        }

        $totalAmount = round($totalAmount, 2);
        return view('front.checkout_page', compact('totalAmount', 'bookingDetails'));
    }

    public function paymentConfirmation(Request $request, $bookingId = null)
    {
        $credentials = PaymentGatewayCredentials::first();
        if ($bookingId == null) {
            $booking = Booking::where([
                'user_id' => $this->user->id
            ])
                ->latest()
                ->first();
        } else {
            $booking = Booking::where(['id' => $bookingId, 'user_id' => $this->user->id])->first();
        }

        $setting = CompanySetting::with('currency')->first();
        $user = $this->user;

        if ($booking->payment_status !== 'completed'){
            $booking->payment_status = 'completed';
            $booking->save();

            return view('front.payment', compact('credentials', 'booking', 'user', 'setting'));
        }

        return redirect(route('front.index'));
    }

    public function paymentGateway(Request $request)
    {
        $credentials = PaymentGatewayCredentials::first();
        $booking = Booking::where([
            'user_id' => $this->user->id
        ])
            ->latest()
            ->first();

        $setting = CompanySetting::with('currency')->first();
        $user = $this->user;

        if ($booking->payment_status == 'completed') {
            return redirect(route('front.index'));
        }

        return view('front.payment-gateway', compact('credentials', 'booking', 'user', 'setting'));
    }

    public function offlinePayment($bookingId = null)
    {
        if ($bookingId == null) {
            $booking = Booking::where([
                'user_id' => $this->user->id
            ])
                ->latest()
                ->first();
        } else {
            $booking = Booking::where(['id' => $bookingId, 'user_id' => $this->user->id])->first();
        }

        if (!$booking || $booking->payment_status == 'completed') {
            return redirect()->route('front.index');
        }

        $booking->payment_status = 'pending';
        $booking->save();

        // $admins = User::where('is_admin', 1)->get();

        // Notification::send($admins, new NewBooking($booking));
        // $user = User::findOrFail($booking->user_id);
        // $user->notify(new BookingConfirmation($booking));

        return view('front.booking_success');
    }

    public function bookingSlots(Request $request)
    {
        $today = Carbon::createFromFormat('m/d/Y', $request->bookingDate);
        $day = $today->format('l');
        $bookingTime = BookingTime::where('day', strtolower($day))->first();

        //check if multiple booking allowed
        $bookings = array();
        if ($bookingTime->multiple_booking == 'no') {
            $bookings = Booking::where(DB::raw('DATE(date_time)'), $today->format('Y-m-d'))->get();
        }
        
        $variables = compact('bookingTime', 'bookings');

        if ($bookingTime->status == 'enabled') {
            if ($today->day == Carbon::today()->day) {
                $startTime = Carbon::createFromFormat('Y-m-d h:i A', $today->format('Y-m-d') . " " . $bookingTime->utc_start_time);
                while ($startTime->lessThanOrEqualTo(Carbon::now())) {
                    $startTime = $startTime->addMinutes($bookingTime->slot_duration);
                }
            } else {
                $startTime = Carbon::createFromFormat('Y-m-d h:i A', $today->format('Y-m-d') . " " . $bookingTime->utc_start_time);
            }
            $endTime = Carbon::createFromFormat('Y-m-d h:i A', $today->format('Y-m-d') . " " . $bookingTime->utc_end_time);

            $startTime->setTimezone($this->settings->timezone);
            $endTime->setTimezone($this->settings->timezone);
            $variables = compact('startTime', 'endTime', 'bookingTime', 'bookings');
        }
        $view = view('front.booking_slots', $variables)->render();
        return Reply::dataOnly(['status' => 'success', 'view' => $view]);
    }

    public function saveBooking(StoreFrontBooking $request)
    {
        if ($this->user) {
            $user = $this->user;
        } else {

            $user = User::firstOrNew(['email' => $request->email]);
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->mobile = $request->phone;
            $user->calling_code = $request->calling_code;
            $user->password = '123456';
            $user->is_admin = 0;
            $user->save();

            $user_business_user = new BusinessUser();
            $user_business_user->user_id = $user->id;
            $user_business_user->business_id = session('BusinessSample');
            $user_business_user->save();

            Auth::loginUsingId($user->id);
            $this->user = $user;

            // if ($this->smsSettings->nexmo_status == 'active' && !$user->mobile_verified) {
            //     // verify user mobile number
            //     return response(Reply::redirect(route('front.checkoutPage'), __('messages.front.success.userCreated')));
            // }

            // $user->notify(new NewUser('123456'));
        }

        // get products and bookingDetails
        $products = json_decode($request->cookie('products'), true);
        $bookingDetails = json_decode($request->cookie('bookingDetails'), true);

        $tax = TaxSetting::active()->first();
        $originalAmount = $taxAmount = $amountToPay = $discountAmount = 0;

        $bookingItems = array();

        foreach ($products as $key => $product) {
            $amount = ($product['serviceQuantity'] * $product['servicePrice']);

            $bookingItems[] = [
                "business_service_id" => $key,
                "quantity" => $product['serviceQuantity'],
                "unit_price" => $product['servicePrice'],
                "amount" => $amount
            ];

            $originalAmount = ($originalAmount + $amount);
        }

        if (!is_null($tax) && $tax->percent > 0) {
            $taxAmount = (($tax->percent / 100) * $originalAmount);
        }

        $amountToPay = ($originalAmount + $taxAmount);
        $amountToPay = round($amountToPay, 2);


        if($this->user->id){
            $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id')->first();
        }
        else{
            $Business_id = session('BusinessSample');
        }

        $booking = new Booking();
        $booking->business_id = $Business_id;
        $booking->user_id = $user->id;
        $booking->date_time = Carbon::createFromFormat('m/d/Y', $bookingDetails['bookingDate'])->format('Y-m-d') . ' ' . Carbon::createFromFormat('H:i:s', $bookingDetails['bookingTime'])->format('H:i:s');
        $booking->status = 'pending';
        $booking->payment_gateway = 'cash';
        $booking->original_amount = $originalAmount;
        $booking->discount = $discountAmount;
        $booking->discount_percent = '0';
        $booking->payment_status = 'pending';
        $booking->additional_notes = $request->additional_notes;
        $booking->source = 'online';
        if (!is_null($tax)) {
            $booking->tax_name = $tax->tax_name;
            $booking->tax_percent = $tax->percent;
            $booking->tax_amount = $taxAmount;
        }
        $booking->amount_to_pay = $amountToPay;
        $booking->save();


        foreach ($bookingItems as $key => $bookingItem) {
            $bookingItems[$key]['booking_id'] = $booking->id;
        }

        DB::table('booking_items')->insert($bookingItems);


        $plan = Booking::where('business_id',$Business_id)->count();

        if($plan >= 9){
            $users = User::select('id', 'email', 'name')->where('is_admin', 1)->first();
            Notification::send($users, new BookingLimit());
            
            // if($this->user)
            //     $users = User::select('id', 'email', 'name')->where('id', $this->user->id)->first();
            // else
            //     $users = User::select('id', 'email', 'name')->where('is_admin', 1)->first();
            //     Notification::send($users, new BookingLimit());   
        }



        return response(Reply::redirect(route('front.payment-gateway'), __('messages.front.success.bookingCreated')))->withCookie(Cookie::forget('bookingDetails'))->withCookie(Cookie::forget('products'));
    }

    public function searchServices(Request $request)
    {
        $services = [];
        if ($request->search_term !== null) {

        if($request->session()->get('slug')){

            // $Business_id = DB::table('business_user')
            //   ->select('business_user.*')
            //   ->where('user_id',$this->user->id)
            //   ->pluck('business_id');

            $Business_id = DB::table('businesses')
                  ->select('businesses.*')
                  ->where('slug',$request->session()->get('slug'))
                  ->pluck('id')->first();

            $location = Location::where('name', request()->location)->first();

            $categories = Category::active()
                ->where('name', 'LIKE', '%' . strtolower($request->search_term) . '%')
                ->where('business_id' , $Business_id)
                ->with(['services' => function ($q) use ($location) {
                    if ($location !== null) {
                        $q->active()->where('location_id', $location->id);
                    } else {
                        $q->active();
                    }
                }])->get();
            }
            else{
            $location = Location::where('name', request()->location)->first();

            $categories = Category::active()
                ->where('name', 'LIKE', '%' . strtolower($request->search_term) . '%')
                ->with(['services' => function ($q) use ($location) {
                    if ($location !== null) {
                        $q->active()->where('location_id', $location->id);
                    } else {
                        $q->active();
                    }
                }])->get(); 
            }
            
            

            if ($categories->count() > 0) {
                foreach ($categories as $category) {
                    foreach ($category->services as $service) {
                        $services[] = $service;
                    }
                }
            }

            if($request->session()->get('slug')){

            $Business_id_2 = DB::table('businesses')
                  ->select('businesses.*')
                  ->where('slug',$request->session()->get('slug'))
                  ->pluck('id')->first();

                if ($location !== null) {
                $filteredServices = BusinessService::active()->where('name', 'LIKE', '%' . strtolower($request->search_term) . '%')
                ->where('location_id', $location->id)
                ->where('business_id',$Business_id_2)
                ->get();
            } else {
                $filteredServices = BusinessService::active()
                ->where('name', 'LIKE', '%' . strtolower($request->search_term) . '%')
                ->where('business_id',$Business_id_2)
                ->get();
            }
            }
            else{
                if ($location !== null) {
                $filteredServices = BusinessService::active()->where('name', 'LIKE', '%' . strtolower($request->search_term) . '%')
                ->where('location_id', $location->id)
                ->get();
            } else {
                $filteredServices = BusinessService::active()
                ->where('name', 'LIKE', '%' . strtolower($request->search_term) . '%')
                ->get();
            }
            }

            foreach ($filteredServices as $service) {
                $services[] = $service;
            }

            $services = collect(array_unique($services));
        } else {
            $services = collect($services);
        }

        return view('front.search_page', compact('services'));
    }

    public function page($business,$slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('front.page', compact('page'));
    }

    public function contact(ContactRequest $request)
    {
        $user_id = DB::table('business_user')
                  ->join('businesses','business_user.business_id' , '=' , 'businesses.id')
                  ->join('users','business_user.user_id' , '=' , 'users.id')
                  ->select('business_user.*','users.*','businesses.*')
                  ->where('businesses.slug', session('slug'))
                  ->where('users.is_admin', 1)
                  ->pluck('businesses.user_id')->first();

        if($user_id != null)
            $users = User::select('id', 'email', 'name')->where('id', $user_id)->first();
        else
            $users = User::select('id', 'email', 'name')->where('is_admin', 1)->first();

        Notification::send($users, new NewContact());
        return Reply::success(__('messages.front.success.emailSent'));
    }

    public function serviceDetail(Request $request, $categorySlug, $serviceSlug)
    {
        $service = BusinessService::where('slug', $serviceSlug)->first();

        $products = json_decode($request->cookie('products'), true) ?: [];
        $reqProduct = array_filter($products, function ($product) use ($service) {
            return $product['serviceName'] == $service->name;
        });

        return view('front.service_detail', compact('service', 'reqProduct'));
    }

    public function package($id){
        $plan = Plan::find($id);
        return view('front.package',compact('plan'));
    }

    public function packageDashboard(){
        // $plan = Plan::select('plan.*')->whereNotIn('id',function($query){
        //     $query->select('plan_id')->from('subscription');
        // })->get();
        $plan = Plan::get();
        return view('front.package_dashboard',compact('plan'));
    }


    public function verifyPaytabs(Request $request){
        return view('front.package_verify');
    }

    public function successPage(Request $request){
        return view('front.package_success');
    }

    public function addPackageBusiness(Request $request){


        $validation = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'calling' => 'required',
            'mobile' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'website' => 'required',
            'billing' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal' => 'required',
            'country' => 'required',
            'reference' => 'required',
        ]);

        $name = $request->fname.' '.$request->lname;
        // Admin Set Up
        $admin = new User();
        $admin->group_id = null;
        $admin->name = $name;
        $admin->email = $request->email;
        $admin->calling_code = $request->calling;
        $admin->mobile = $request->mobile;
        $admin->mobile_verified = 0;
        $admin->password = $request->password;
        $admin->image = null;
        $admin->remember_token = null;
        $admin->is_admin = 1;
        $admin->is_employee = 0;
        $admin->deleted_at = null;

        $admin->save();

        // Business Set Up
        $business = new Businesses();
        $business->title = $request->title;
        $business->slug = $request->slug;

        $business->save();

        // Business_user Set up
        $business_user = new BusinessUser();
        $business_user->user_id = $admin->id;
        $business_user->business_id = $business->id;

        $business_user->save();

        // Company_Settings Set up
        $business_company_setting = new CompanySetting();
        $business_company_setting->business_id = $business->id;
        $business_company_setting->company_name = $request->title;
        $business_company_setting->company_email = $request->email;
        $business_company_setting->website = $request->website;
        $business_company_setting->currency_id = 1;
        $business_company_setting->purchase_code = 'envato-dev';

        $business_company_setting->save();

        //  ThemeSetting Set up
        $business_theme_setting = new ThemeSetting();
        $business_theme_setting->business_id = $business->id;
        $business_theme_setting->primary_color = '#414552';
        $business_theme_setting->secondary_color = '#788AE2';
        $business_theme_setting->sidebar_bg_color = '#FFFFFF';
        $business_theme_setting->sidebar_text_color = '#5C5C62';
        $business_theme_setting->topbar_text_color = '#FFFFFF';

        $business_theme_setting->save();

        //  ThemeSetting Set up
        $business_front_theme_setting = new FrontThemeSetting();
        $business_front_theme_setting->business_id = $business->id;
        $business_front_theme_setting->primary_color = '#414552';
        $business_front_theme_setting->secondary_color = '#788AE2';

        $business_front_theme_setting->save();


        //  Pages Set up
        $business_page_about = new Page();
        $business_page_about->business_id = $business->id;
        $business_page_about->title = 'About Us';
        $business_page_about->content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
        $business_page_about->slug = $request->slug.'-about-us';

        $business_page_about->save();

        $business_page_contact = new Page();
        $business_page_contact->business_id = $business->id;
        $business_page_contact->title = 'Contact Us';
        $business_page_contact->content = '<h2>Contact Us</h2>

                <p>How can we help you? We will try to get back to you as soon as possible.</p>';
        $business_page_contact->slug = $request->slug.'-contact-us';

        $business_page_contact->save();

        $business_page_how_it_work = new Page();
        $business_page_how_it_work->business_id = $business->id;
        $business_page_how_it_work->title = 'How It Works';
        $business_page_how_it_work->content = '
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
        $business_page_how_it_work->slug = $request->slug.'-contact-us';

        $business_page_how_it_work->save();

        $business_page_privacy_policy = new Page();
        $business_page_privacy_policy->business_id = $business->id;
        $business_page_privacy_policy->title = 'Privacy Policy';
        $business_page_privacy_policy->content = '
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
        $business_page_privacy_policy->slug = $request->slug.'-contact-us';

        $business_page_privacy_policy->save();

        // Booking Times Set up
        $bussiness_booking_times = new BookingTime();
        $bussiness_booking_times->business_id = $business->id;
        $bussiness_booking_times->day = 'Monday';
        $bussiness_booking_times->start_time  = '04:30:00';
        $bussiness_booking_times->end_time = '14:30:00';

        $bussiness_booking_times->save();

        // Tax Setting Set up
        $bussiness_tax = new TaxSetting();
        $bussiness_tax->business_id = $business->id;
        $bussiness_tax->tax_name = 'GST';
        $bussiness_tax->percent = 5;
        $bussiness_tax->status = 'active';

        $bussiness_tax->save();

        // Smtp Setting Set up
        $bussiness_smtp = new SmtpSetting();
        $bussiness_smtp->business_id = $business->id;
        $bussiness_smtp->mail_driver = 'mail';
        $bussiness_smtp->mail_host = $request->email;
        $bussiness_smtp->mail_port = 587;
        $bussiness_smtp->mail_username = $request->email;
        $bussiness_smtp->mail_password = 'mypassword';
        $bussiness_smtp->mail_from_name = $request->title;
        $bussiness_smtp->mail_from_email = $request->email;
        $bussiness_smtp->mail_encryption = 'none';
        $bussiness_smtp->verified = 0;

        $bussiness_smtp->save();

        // SMS Setting Set up
        $bussiness_sms = new SmsSetting();
        $bussiness_sms->business_id = $business->id;
        $bussiness_sms->nexmo_status = 'deactive';
        $bussiness_sms->nexmo_from = 'NEXMO';

        $bussiness_sms->save();

        $subscription_plan = new Subscription();
        $subscription_plan->business_id = $business->id;
        $subscription_plan->plan_id = $request->plan_id;
        $subscription_plan->user_id = $admin->id;
        $subscription_plan->last_payment = date('Y-m-d');
        $subscription_plan->next_payment = date('Y-m-d', strtotime("+1 month",strtotime(date('Y-m-d'))));
        $subscription_plan->recuring_payment = 'Monthly';

        $subscription_plan->save();


        $post = [
            "merchant_email" => "fouademi@gmail.com",
            "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
            "site_url" => "https://bookanydate.com",
            "return_url" => "http://dev.appointo.local/package/successVerify",
            "title" => $request->title,
            "cc_first_name" => $request->fname,
            "cc_last_name" => $request->lname,
            "cc_phone_number" => $request->calling,
            "phone_number" => $request->mobile,
            "email" => $request->email,
            "products_per_title" => $request->plan_name,
            "unit_price" => $request->plan_cost,
            "quantity" => "1",
            "other_charges" => "0",
            "amount" => $request->plan_cost,
            "discount" => "0",
            "currency" => "AED",
            "reference_no" => $request->reference,
            "ip_customer" =>"1.1.1.0",
            "ip_merchant" =>"1.1.1.0",
            "billing_address" => $request->billing,
            "city" => $request->city,
            "state" => $request->state,
            "postal_code" => $request->postal,
            "country" => "ARE",
            "shipping_first_name" => $request->fname,
            "shipping_last_name" => $request->lname,
            "address_shipping" => $request->billing,
            "state_shipping" => $request->state,
            "city_shipping" => $request->city,
            "postal_code_shipping" => $request->postal,
            "country_shipping" => "ARE",
            "msg_lang" => "English",
            "cms_with_version" => "WordPress4.0-WooCommerce2.3.9",
            "is_tokenization" => 'true',
            "is_existing_customer" => 'false',
        ];

        $ch = curl_init('https://www.paytabs.com/apiv2/create_pay_page');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        $result = json_decode($response, true);
        
        $users = User::select('id', 'email', 'name')->where('id', $admin->id)->first();
        Notification::send($users, new VerifyPayment());

        // For Tokenization
        session(['name' => $name]);
        session(['fname' => $request->fname]);
        session(['lname' => $request->lname]);
        session(['title' => $request->title]);
        session(['order_id' => $request->reference]);
        session(['product_name' => $request->plan_name]);
        session(['customer_email' => $request->email]);
        session(['phone_number' => $request->calling.$request->mobile]);
        session(['amount' => $request->plan_cost]);
        session(['currency' => "AED"]);
        session(['address_billing' => $request->billing]);
        session(['state_billing' => $request->state]);
        session(['city_billing' => $request->city]);
        session(['postal_code_billing' => $request->postal]);
        session(['country_billing' => "ARE"]);
        session(['address_shipping' => $request->billing]);
        session(['city_shipping' => $request->city]);
        session(['state_shipping' => $request->state]);
        session(['postal_code_shipping' => $request->postal]);
        session(['country_shipping' => "ARE"]);

        // Plan , Business , User IDs
        session(['business_id' => $business->id]);
        session(['plan_id' => $request->plan_id]);
        session(['user_id' => $admin->id]);


        session(['email' => $request->email]);
        session(['b_title' => $request->title]);
        session(['subscription_plan' => $subscription_plan->id]);
        session(['payment_url' => $result['payment_url']]);

        return Reply::success(__('Successfully Created New Admin and Business'));
        // return redirect()->away($result['payment_url']);
        // return redirect()->to('/package/verify');
    }

    public function successPost(Request $request){
        
        // var_dump($request['pt_token']);

        $post = [
            "merchant_email" => "fouademi@gmail.com",
            "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
            "payment_reference" => $request['payment_reference'],
            
        ];
        $ch = curl_init('https://www.paytabs.com/apiv2/verify_payment');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        $result = json_decode($response, true);
        // var_dump($result['pt_invoice_id']);

        $payment_subscription = new Payment_Subscription();
        $payment_subscription->subscription_id = $request->session()->get('subscription_plan');
        $payment_subscription->invoice_id = $result['pt_invoice_id'];
        $payment_subscription->references_no = $result['reference_no'];
        $payment_subscription->transaction_id = $result['transaction_id'];
        $payment_subscription->pt_token = $request['pt_token'];
        $payment_subscription->pt_customer_email = $request['pt_customer_email'];
        $payment_subscription->pt_customer_password = $request['pt_customer_password'];
        $payment_subscription->title = $request->session()->get('title');
        $payment_subscription->cc_first_name = $request->session()->get('fname');
        $payment_subscription->cc_last_name = $request->session()->get('lname');
        $payment_subscription->order_id = $request->session()->get('order_id');
        $payment_subscription->product_name = $request->session()->get('product_name');
        $payment_subscription->customer_email =$request->session()->get('customer_email');
        $payment_subscription->phone_number = $request->session()->get('phone_number');
        $payment_subscription->amount = $request->session()->get('amount');
        $payment_subscription->currency = $request->session()->get('currency');
        $payment_subscription->address_billing = $request->session()->get('address_billing');
        $payment_subscription->state_billing = $request->session()->get('state_billing');
        $payment_subscription->city_billing = $request->session()->get('city_billing');
        $payment_subscription->postal_code_billing = $request->session()->get('postal_code_billing');
        $payment_subscription->country_billing = $request->session()->get('country_billing');
        $payment_subscription->address_shipping = $request->session()->get('address_shipping');
        $payment_subscription->city_shipping = $request->session()->get('city_shipping');
        $payment_subscription->state_shipping = $request->session()->get('state_shipping');
        $payment_subscription->postal_code_shipping = $request->session()->get('postal_code_shipping');
        $payment_subscription->country_shipping = $request->session()->get('country_shipping');
        
        if($payment_subscription->save()){


            $transaction = [

                "merchant_email" => "fouademi@gmail.com",
                "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
                "transaction_id" => $result['transaction_id'],

            ];

            $transaction_ch = curl_init('https://www.paytabs.com/apiv2/verify_payment_transaction');
            curl_setopt($transaction_ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($transaction_ch, CURLOPT_POSTFIELDS, $transaction);

            // execute!
            $transaction_responses = curl_exec($transaction_ch);

            // close the connection, release resources used
            curl_close($transaction_ch);

            $transaction_results = json_decode($transaction_responses, true);
            // var_dump($transaction_results);

            $card_name = $request->session()->get('fname')." ".$request->session()->get('lname');

            $payment_card = new PaymentCard();
            $payment_card->user_id = $request->session()->get('user_id');
            $payment_card->account_name = $card_name;
            $payment_card->card_number = $transaction_results['card_last_four_digits'];
            $payment_card->pt_invoice_id = $transaction_results['pt_invoice_id'];

            $payment_card->save();

            $payment_history = new Payment_History();
            $payment_history->business_id = $request->session()->get('business_id');
            $payment_history->plan_id = $request->session()->get('plan_id');
            $payment_history->user_id = $request->session()->get('user_id');
            $payment_history->amount = $transaction_results['amount'];
            $payment_history->currency = $transaction_results['currency'];
            $payment_history->transaction_id = $transaction_results['transaction_id'];
            $payment_history->order_id = $transaction_results['order_id'];
            $payment_history->pt_invoice_id = $transaction_results['pt_invoice_id'];
            $payment_history->card_last_number = $transaction_results['card_last_four_digits'];

            $payment_history->save();

            // Tokenization
            // $token = [

            //     "merchant_email" => "fouademi@gmail.com",
            //     "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
            //     "title" => $request->session()->get('title'),
            //     "cc_first_name" => $request->session()->get('fname'),
            //     "cc_last_name " => $request->session()->get('lname'),
            //     "order_id" => $request->session()->get('order_id'),
            //     "product_name" => $request->session()->get('product_name'),
            //     "customer_email" => $request->session()->get('customer_email'),
            //     "phone_number" => $request->session()->get('phone_number'),
            //     "amount" => $request->session()->get('amount'),
            //     "currency" => $request->session()->get('currency'),
            //     "address_billing" => $request->session()->get('address_billing'),
            //     "state_billing" => $request->session()->get('state_billing'),
            //     "city_billing" => $request->session()->get('city_billing'),
            //     "postal_code_billing" => $request->session()->get('postal_code_billing'),
            //     "country_billing" => $request->session()->get('country_billing'),
            //     "address_shipping" => $request->session()->get('address_shipping'),
            //     "city_shipping" => $request->session()->get('city_shipping'),
            //     "state_shipping" => $request->session()->get('state_shipping'),
            //     "postal_code_shipping" => $request->session()->get('postal_code_shipping'),
            //     "country_shipping " => $request->session()->get('country_shipping'),
            //     "pt_token" => $request['pt_token'],
            //     "pt_customer_email" => $request['pt_customer_email'],
            //     "pt_customer_password" => $request['pt_customer_password'],

            // ];

            // $token_ch = curl_init('https://www.paytabs.com/apiv3/tokenized_transaction_prepare');
            // curl_setopt($token_ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($token_ch, CURLOPT_POSTFIELDS, $token);

            // // execute!
            // $responses = curl_exec($token_ch);

            // // close the connection, release resources used
            // curl_close($token_ch);

            // $results = json_decode($responses, true);

            // TOkenization
            session()->forget('name');
            session()->forget('fname');
            session()->forget('lname');
            session()->forget('title');
            session()->forget('order_id');
            session()->forget('product_name');
            session()->forget('customer_email');
            session()->forget('phone_number');
            session()->forget('amount');
            session()->forget('currency');
            session()->forget('address_billing');
            session()->forget('state_billing');
            session()->forget('city_billing');
            session()->forget('postal_code_billing');
            session()->forget('country_billing');
            session()->forget('address_shipping');
            session()->forget('city_shipping');
            session()->forget('state_shipping');
            session()->forget('postal_code_shipping');
            session()->forget('country_shipping');

            session()->forget('business_id');
            session()->forget('plan_id');
            session()->forget('user_id');

            session()->forget('payment_url');
            session()->forget('email');
            session()->forget('b_title');
            session()->forget('subscription_plan');

            // var_dump($request['payment_reference']);
            // var_dump($results);
        }


        // return view('front.package_success')->with('result',$result['result']);
         return view('front.package_success');
    }

    public function changeBusiness($code)
    {
        // $language = Language::where('language_code', $code)->first();
        // $business_user = BusinessUser::where('user_id',$this->user->id)->first();
        // $business_user->business_id = $code;

        // $business_user->save();

        // $booking_user = Booking::where('user_id',$this->user->id)->first();
        // $booking_user->business_id = $code;
        // $booking_user->save();

        // return Reply::success(__('Success'));
        // $url = $request->root().'/';

        // return redirect(route('front.index'));
        return Redirect::to('/mock/create');
    }
      

    // public function changeLanguage($code)
    // {
    //     $language = Language::where('language_code', $code)->first();

    //     if ($language) {
    //         $this->settings->locale = $code;
    //     }
    //     else if ($code == 'en') {
    //         $this->settings->locale = 'en';
    //     }

    //     $this->settings->save();

    //     return Reply::success(__('messages.languageChangedSuccessfully'));
    // }

    public function paytabs(Request $request){
    //     $post = [
    //         "merchant_email" => "fouademi@gmail.com",
    //         "secret_key" => "mN0wWuUBNvTG0YIJjj7ayTsin2XqOaQbXQIUkCv88pP8oxSHRZSpTkHhmFIbPymNo4HJHdSPDHY1fQJ7QBxJWe0jUJuJhRxGVfqC",
    //         "site_url" => "https://bookanydate.com",
    //         "return_url" => "https://bookanydate.com/Completed",
    //         "title" => $request->title,
    //         "cc_first_name" => $request->fname,
    //         "cc_last_name" => $request->lname,
    //         "cc_phone_number" => $request->calling,
    //         "phone_number" => $request->mobile,
    //         "email" => $request->email,
    //         "products_per_title" => "MobilePhone || Charger || Camera",
    //         "unit_price" => "12.123 || 21.345 || 35.678 ",
    //         "quantity" => "2 || 3 || 1",
    //         "other_charges" => "12.123",
    //         "amount" => "136.082",
    //         "discount" => "10.123",
    //         "currency" => "BHD",
    //         "reference_no" => $request->reference,
    //         "ip_customer" =>"1.1.1.0",
    //         "ip_merchant" =>"1.1.1.0",
    //         "billing_address" => $request->billing,
    //         "city" => $request->city,
    //         "state" => $request->state,
    //         "postal_code" => $request->postal,
    //         "country" => "BHR",
    //         "shipping_first_name" => $request->fname,
    //         "shipping_last_name" => $request->lname,
    //         "address_shipping" => $request->billing,
    //         "state_shipping" => $request->state,
    //         "city_shipping" => $request->city,
    //         "postal_code_shipping" => $request->postal,
    //         "country_shipping" => "BHR",
    //         "msg_lang" => "English",
    //         "cms_with_version" => "WordPress4.0-WooCommerce2.3.9"
    // ];

    //     $ch = curl_init('https://www.paytabs.com/apiv2/create_pay_page');
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    //     // execute!
    //     $response = curl_exec($ch);

    //     // close the connection, release resources used
    //     curl_close($ch);





        // do anything you want with your response
        // var_dump($response);
    }
}
