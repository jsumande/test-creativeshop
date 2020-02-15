<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use App\Businesses;
use App\Plan;
use App\User;
use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FetchController extends Controller
{
	public function show(){
		
	}

    public function edit(Request $request,$id){
    	$plan = Plan::find($id);
    	return json_encode($plan);
    }
}
