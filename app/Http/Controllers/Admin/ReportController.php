<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use App\Booking;
use Illuminate\Support\Facades\DB;
use App\Payment;

class ReportController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.reports'));
    }

    public function index() {
        return view('admin.report.earning');
    }

    public function customer() {
        return view('admin.report.customer');
    }

    public function earningReportChart(Request $request) {
        // $bookings = Booking::where('payment_status', 'completed')
        //     ->where('payment_gateway', 'cash')
        //     ->whereDate('date_time', '>=', $request->startDate)
        //     ->whereDate('date_time', '<=', $request->endDate)
        //     ->select(DB::raw("DATE_FORMAT(`date_time`,'%M %Y') as date"), 'amount_to_pay as amount')
        //     ->get();

        $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id');

        $bookings = Booking::where('payment_status', 'completed')
            ->where('payment_gateway', 'cash')
            ->whereDate('date_time', '>=', $request->startDate)
            ->whereDate('date_time', '<=', $request->endDate)
            ->where('business_id',$Business_id)
            ->groupBy('year', 'month')
            ->orderBy('amount_to_pay', 'ASC')
            ->get(
                [
                    DB::raw('DATE_FORMAT(date_time,"%D-%M-%Y") as paid_on'),
                    DB::raw('DATE_FORMAT(date_time,"%M/%y") as date'),
                    DB::raw('YEAR(date_time) year, MONTH(date_time) month'),
                    DB::raw('sum(amount_to_pay) as total')                    
                ]
            );

        // $payments = Payment::where('status', 'complete')
        //     ->whereDate('paid_on', '>=', $request->startDate)
        //     ->whereDate('paid_on', '<=', $request->endDate)
        //     ->select(DB::raw("DATE_FORMAT(`paid_on`,'%M %Y') as date"), 'amount')
        //     ->get();

        $payments = Payment::where('status', 'complete')
            ->whereDate('paid_on', '>=', $request->startDate)
            ->whereDate('paid_on', '<=', $request->endDate)
            ->groupBy('year', 'month')
            ->orderBy('amount', 'ASC')
            ->get(
                [
                    DB::raw('DATE_FORMAT(paid_on,"%D-%M-%Y") as paid_on'),
                    DB::raw('DATE_FORMAT(paid_on,"%M/%y") as date'),
                    DB::raw('YEAR(paid_on) year, MONTH(paid_on) month'),
                    DB::raw('sum(amount) as total')                    
                ]
            );

        $graphData = [];
        foreach($bookings as $key1=>$booking){
            foreach($payments as $key2=>$payment){
                if($payment->date == $booking->date) {
                    $bookings[$key1]->total = $bookings[$key1]->total+$payment->total;
                }
            }
            $graphData[] = $booking;
        }

        //sort months in increasing order
        usort(
            $graphData, function ($a, $b) {
                $t1 = strtotime($a->paid_on);
                $t2 = strtotime($b->paid_on);
                return $t1 - $t2;
            }
        );

        $labels = [];
        foreach($graphData as $gData){
            $labels[] = $gData->date;
        }

        $earnings = [];
        foreach($graphData as $gData){
            $earnings[] = round($gData->total, 2);
        }

        return Reply::dataOnly(['labels' => $labels, 'earnings' => $earnings, 'status' => 'success']);

    }

    public function earningTable(Request $request){

        $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id');

        $bookings = Booking::where('payment_status', 'completed')
            // ->where('payment_gateway', 'cash')
            ->where('business_id',$Business_id)
            ->whereDate('date_time', '>=', $request->startDate)
            ->whereDate('date_time', '<=', $request->endDate)
            ->get();

        return \datatables()->of($bookings)
            ->editColumn('user_id', function ($row) {
                return ucwords($row->user->name);
            })
            ->editColumn('amount_to_pay', function ($row) {
                return number_format((float)$row->amount_to_pay, 2, '.', '');
            })
            ->editColumn('date_time', function ($row) {
                return $row->date_time->format('d M, Y');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'image', 'status'])
            ->toJson();
    }
}
