<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Helper\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('Label'));

    }

    public function index(){
    	return view('label.index');
    }
}
