<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowDashboard extends Controller
{
   
	public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('Dashboard'));

    }

    public function __invoke(Request $request){
    	return view('super.dashboard.index');
    }
    

}
