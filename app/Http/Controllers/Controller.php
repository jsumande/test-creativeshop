<?php

namespace App\Http\Controllers;

use App\CompanySetting;
use App\FrontThemeSetting;
use App\BusinessUser;
use App\Language;
use App\Location;
use App\Page;
use App\User;
use App\Plan;
use App\SmsSetting;
use App\ThemeSetting;
use App\UniversalSearch;
use App\Businesses;
use Froiden\Envato\Traits\AppBoot;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, AppBoot;

    public $user;
    public $pageTitle;
    public $settings;
    public $productsCount;

    public function __construct()
    {
        $this->middleware('auth')->only(['paymentGateway', 'offlinePayment', 'paymentConfirmation']);

        $this->middleware(function ($request, $next) {

        $this->productsCount = request()->hasCookie('products') ? sizeof(json_decode(request()->cookie('products'), true)) : 0;
        $this->user = auth()->user();
            if ($this->user) {
                config(['froiden_envato.allow_users_id' => true]);
                if($this->user->is_admin != 2){
                $Business_id = DB::table('business_user')
                  ->select('business_user.*')
                  ->where('user_id',$this->user->id)
                  ->pluck('business_id');
                $this->settings = CompanySetting::where('business_id',$Business_id)->first();
                
                $slug = DB::table('business_user')
                  ->join('businesses','business_user.business_id' , '=' , 'businesses.id')
                  ->select('business_user.*','businesses.*')
                  ->where('business_user.user_id', $this->user->id)
                  ->pluck('businesses.slug');

                $this->business_slug = strval ($slug[0]);
                $this->themeSettings = ThemeSetting::where('business_id',$Business_id)->first();

                $this->businessUser_id = BusinessUser::
                  select('business_user.*')
                  ->where('user_id',$this->user->id)
                  ->first();
                }
                else{
                    $this->businessUser_id = '';
                    $this->settings = CompanySetting::first();
                    $this->themeSettings = ThemeSetting::first();
                    $this->business_slug = '';
                }

            }else{
                $this->businessUser_id = '';
                $this->settings = CompanySetting::first();
                $this->themeSettings = ThemeSetting::first();
                $this->business_slug = '';
            }

        view()->share('user', $this->user);
        view()->share('productsCount', $this->productsCount);
        view()->share('business_slug', $this->business_slug);

        $this->showInstall();
        $this->checkMigrateStatus();
        $this->smsSettings = SmsSetting::first();

        $this->url_slug = $request->path();
        $this->businessess = Businesses::all();
        $this->user_table = User::where('is_admin',2)->first();
        $this->plans = Plan::all();

        if($this->url_slug == '/'){

            $this->front_settings = CompanySetting::first();
            $this->locations = Location::select('id', 'name')->get();
            $this->pages = Page::where('business_id',null)->get();
            $this->frontThemeSettings = FrontThemeSetting::first();
            $request->session()->forget('slug');
        }
        else if(\Request::segment(1) != null){

            $value = \Request::segment(1);
            $DB_Slug = DB::table('businesses')
                      ->select('businesses.*')
                      ->where('slug',$value)
                      ->pluck('id')->first();

            if($DB_Slug){
                session(['slug' => $value]);
            }

            $Business_slug = DB::table('businesses')
                      ->select('businesses.*')
                      ->where('slug',session('slug'))
                      ->pluck('id')->first();

            if(session('slug') == null){
                $this->locations = Location::select('id', 'name')->get();
            }else{
                $this->locations = Location::select('id', 'name')->where('business_id',$Business_slug)->get();
            }

            $this->front_settings = CompanySetting::where('business_id',$Business_slug)->first();
            $this->pages = Page::where('business_id',$Business_slug)->get();
            $this->frontThemeSettings = FrontThemeSetting::where('business_id',$Business_slug)->first();
        }
        else{
            
            $DB_Slug = DB::table('businesses')
                      ->select('businesses.*')
                      ->where('slug',$request->path())
                      ->pluck('id')->first();

            if($DB_Slug){
                session(['slug' => $value]);
            }

            $Business_slug = DB::table('businesses')
                      ->select('businesses.*')
                      ->where('slug',session('slug'))
                      ->pluck('id')->first();

            $this->front_settings = CompanySetting::where('business_id',$Business_slug)->first();
            $this->locations = Location::select('id', 'name')->where('business_id',$Business_slug)->get();
            $this->pages = Page::where('business_id',$Business_slug)->get();
            $this->frontThemeSettings = FrontThemeSetting::where('business_id',$Business_slug)->first();
        }

        config(['app.name' => $this->settings->company_name]);
        config(['app.url' => url('/')]);

        App::setLocale($this->settings->locale);
        // $this->themeSettings = ThemeSetting::first();
        $this->languages = Language::where('status', 'enabled')->orderBy('language_name', 'asc')->get();
        // $this->frontThemeSettings = FrontThemeSetting::first();
        //$this->pages = Page::all();
        view()->share('settings', $this->settings);
        view()->share('smsSettings', $this->smsSettings);
        view()->share('themeSettings', $this->themeSettings);
        view()->share('languages', $this->languages);
        view()->share('frontThemeSettings', $this->frontThemeSettings);
        view()->share('locations', $this->locations);
        view()->share('pages', $this->pages);
        view()->share('calling_codes', $this->getCallingCodes());
        view()->share('url_slug', $this->url_slug);
        view()->share('front_settings', $this->front_settings);
        view()->share('businessess', $this->businessess);
        view()->share('businessUser_id', $this->businessUser_id);
        view()->share('user_table', $this->user_table);
        view()->share('plans', $this->plans);
            return $next($request);
        });
    }

    public function checkMigrateStatus()
    {
        $status = Artisan::call('migrate:check');
        if ($status) {
            Artisan::call('migrate', array('--force' => true)); //migrate database
        }
    }

    public function getCallingCodes()
    {
        $codes = [];
        foreach(config('calling_codes.codes') as $code) {
            $codes = array_add($codes, $code['code'], array('name' => $code['name'], 'dial_code' => $code['dial_code']));
        };
        return $codes;
    }
}
