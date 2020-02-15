<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Businesses;
use App\BusinessUser;
use App\Helper\Reply;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ShowDashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.dashboard'));

    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(\request()->ajax()){

            $startDate = $request->startDate;
            $endDate = $request->endDate;

            // if(!$this->user->is_admin){
            //     $business_title = DB::table('business_user')
            //           ->join('businesses', 'business_user.business_id' , '=' , 'businesses.id' )
            //           ->join('bookings', 'business_user.business_id' , '=' , 'bookings.business_id' )
            //           ->select('businesses.*', 'business_user.*', 'bookings.*')
            //           ->where('business_user.user_id', $this->user->id)->first();
            // }
            // else {
            //     $business_title = 'null';
            // }
            $business_title = DB::table('business_user')
                      ->join('businesses', 'business_user.business_id' , '=' , 'businesses.id' )
                      ->join('bookings', 'business_user.business_id' , '=' , 'bookings.business_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      ->where('business_user.user_id', $this->user->id)->first();
            $slug = 'food-business';
            $sample = DB::table('business_user')
                  ->join('businesses','business_user.business_id' , '=' , 'businesses.id')
                  ->select('business_user.*','businesses.*')
                  ->where('businesses.slug', $slug)
                  ->pluck('businesses.slug');


            // $totalBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate);
            //     if(!$this->user->is_admin){
            //         $totalBooking = $totalBooking->where('user_id', $this->user->id);
            //     }
            //     $totalBooking = $totalBooking->count();

            $totalBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('business_user.user_id', $this->user->id)->get();
            $totalBooking = $totalBooking->count();

            // $inProgressBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate)
            //     ->where('status', 'in progress');

            $inProgressBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('bookings.status', 'in progress')
                      ->where('business_user.user_id', $this->user->id)->get();
            $inProgressBooking = $inProgressBooking->count();

            //     if(!$this->user->is_admin){
            //         // $inProgressBooking = $inProgressBooking->where('user_id', $this->user->id);
            //         $inProgressBooking = $inProgressBooking->where('business_user.user_id', $this->user->id);
            //     }
            // $inProgressBooking = $inProgressBooking->count();

            // $pendingBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate)
            //     ->where('status', 'pending');
            
            $pendingBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('bookings.status', 'pending')
                      ->where('business_user.user_id', $this->user->id)->get();
            $pendingBooking = $pendingBooking->count();

                // if(!$this->user->is_admin){
                //     // $pendingBooking = $pendingBooking->where('user_id', $this->user->id);
                //     $pendingBooking = $pendingBooking->where('bookings.user_id', $this->user->id)->get();
                // }
                // $pendingBooking = $pendingBooking->count();

            // $completedBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate)
            //     ->where('status', 'completed');

            $completedBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('bookings.status', 'completed')
                      ->where('business_user.user_id', $this->user->id)->get();
            $completedBooking = $completedBooking->count();

            //     if(!$this->user->is_admin){
            //         // $completedBooking =  $completedBooking->where('user_id', $this->user->id);
            //         $completedBooking =  $completedBooking->where('business_user.user_id', $this->user->id);
            //     }
            // $completedBooking = $completedBooking->count();

            // $canceledBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate)
            //     ->where('status', 'canceled');

            $canceledBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('bookings.status', 'canceled')
                      ->where('business_user.user_id', $this->user->id)->get();
            $canceledBooking = $canceledBooking->count();

            //     if(!$this->user->is_admin){
            //         // $canceledBooking = $canceledBooking->where('user_id', $this->user->id);
            //         $canceledBooking = $canceledBooking->where('business_user.user_id', $this->user->id);
            //     }
            // $canceledBooking = $canceledBooking->count();

            // $offlineBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate)
            //     ->where('source', 'pos');

            $offlineBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('bookings.source', 'pos')
                      ->where('business_user.user_id', $this->user->id)->get();
            $offlineBooking = $offlineBooking->count();

            //     if(!$this->user->is_admin){
            //         // $offlineBooking = $offlineBooking->where('user_id', $this->user->id);
            //         $offlineBooking = $offlineBooking->where('business_user.user_id', $this->user->id);
            //     }
            // $offlineBooking = $offlineBooking->count();

            // $onlineBooking = Booking::whereDate('date_time', '>=', $startDate)
            //     ->whereDate('date_time', '<=', $endDate)
            //     ->where('source', 'online');

            $onlineBooking = DB::table('bookings')
                      ->join('businesses', 'bookings.business_id' , '=' , 'businesses.id' )
                      ->join('business_user', 'bookings.user_id' , '=' , 'business_user.user_id' )
                      ->select('businesses.*', 'business_user.*', 'bookings.*')
                      // ->whereDate('date_time', '>=', $startDate)
                      // ->whereDate('date_time', '<=', $endDate)
                      ->where('bookings.source', 'online')
                      ->where('business_user.user_id', $this->user->id)->get();
            $onlineBooking = $onlineBooking->count();

            //     if(!$this->user->is_admin){
            //         // $onlineBooking = $onlineBooking->where('user_id', $this->user->id);
            //         $onlineBooking = $onlineBooking->where('business_user.user_id', $this->user->id);
            //     }
            // $onlineBooking = $onlineBooking->count();

            if($this->user->is_admin){

              $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id');

              $totalCustomers = DB::table('business_user')
                      ->join('businesses', 'business_user.business_id' , '=' , 'businesses.id' )
                      ->select('businesses.*', 'business_user.*')
                      // ->whereDate('business_user.created_at', '>=', $startDate)
                      // ->whereDate('business_user.created_at', '<=', $endDate)
                      ->where('business_user.business_id',$Business_id)
                      ->get()->count();

                // $totalCustomers = User::where('is_admin', 0)
                //     ->whereDate('created_at', '>=', $startDate)
                //     ->whereDate('created_at', '<=', $endDate)
                //     ->count();

              $totalEarnings = Booking::whereDate('date_time', '>=', $startDate)
                  ->whereDate('date_time', '<=', $endDate)
                  ->sum('amount_to_pay');

            }
            else{
                $totalCustomers = 0;
                $totalEarnings = 0;
            }

            return Reply::dataOnly(['status' => 'success', 'sample'=> $sample ,'business_title' => $business_title ,'totalBooking' => $totalBooking, 'pendingBooking' => $pendingBooking, 'inProgressBooking' => $inProgressBooking, 'completedBooking' => $completedBooking, 'canceledBooking' => $canceledBooking, 'offlineBooking' => $offlineBooking, 'onlineBooking' => $onlineBooking, 'totalCustomers' => $totalCustomers, 'totalEarnings' => round($totalEarnings, 2), 'user' => $this->user]);
        }

        if($this->user->is_admin){
            $recentSales = Booking::where('user_id',$this->user->id)->orderBy('id', 'desc')->take(20)->get();
        }
        else{
            $recentSales = null;
        }
        return view('admin.dashboard.index', compact( 'recentSales'));
    }


}
