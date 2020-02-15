<?php

namespace App\Http\Controllers\Admin;

use App\BookingTime;
use App\CompanySetting;
use App\Currency;
use App\FrontThemeSetting;
use App\Helper\Files;
use App\Helper\Reply;
use App\Language;
use App\Media;
use App\PaymentGatewayCredentials;
use App\SmtpSetting;
use App\TaxSetting;
use App\ThemeSetting;
use App\PaymentCard;
use App\Plan;
use App\Payment_History;
use App\Subscription;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UpdateSetting;
use App\SmsSetting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        view()->share('pageTitle', __('menu.settings'));

    }

    public function index(){

        $Business_id = DB::table('business_user')
              ->select('business_user.*')
              ->where('user_id',$this->user->id)
              ->pluck('business_id');

        $bookingTimes = BookingTime::where('business_id',$Business_id)->get();

        $images = Media::select('id', 'file_name')->latest()->get();
        $tax = TaxSetting::where('business_id',$Business_id)->first();
        $timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        $currencies = Currency::all();
        $enabledLanguages = Language::where('status', 'enabled')->orderBy('language_name')->get();
        // $smtpSetting = SmtpSetting::where('business_id',$Business_id)->first();
        $smtpSetting = SmtpSetting::first();
        $themeSetting = ThemeSetting::where('business_id',$Business_id)->first();
        $frontThemeSetting = FrontThemeSetting::where('business_id',$Business_id)->first();
        $credentialSetting = PaymentGatewayCredentials::first();
        $smsSetting = SmsSetting::where('business_id',$Business_id)->first();

        // /$payment_card = PaymentCard::where('user_id',$this->user->id)->first();

        $plan = Subscription::
            leftJoin('businesses','subscription.business_id','businesses.id')
            ->leftJoin('plan','subscription.plan_id','plan.id')
            ->leftJoin('users','subscription.user_id','users.id')
            ->leftJoin('payment_subscription','subscription.id','payment_subscription.subscription_id')
            ->select('subscription.*','businesses.*','plan.*','users.*')
            ->select('subscription.*','plan.*','payment_subscription.subscription_id')
            ->where('subscription.user_id',$this->user->id)
            ->groupBy('subscription.id')
            ->first();

        $subscription_id = Subscription::where('subscription.user_id',$this->user->id)->first();

        //$plan = Subscription::where('subscription.user_id',$this->user->id)->first();
        // $planx = Plan::select('plan.*')->whereNotIn('id',function($query){
        //     $query->select('plan_id')->from('subscription');
        // })->get();

        // $plan_list = Subscription::
        //     leftJoin('plan','subscription.plan_id','plan.id')
        //     ->select('subscription.plan_id','subscription.user_id','plan.plan_name','plan.id')
        //     ->groupBy('plan.id')
        //     ->get();

        $plan_list = Plan::get();

        $payment_table = Subscription::
            leftJoin('businesses','subscription.business_id','businesses.id')
            ->leftJoin('plan','subscription.plan_id','plan.id')
            ->leftJoin('users','subscription.user_id','users.id')
            ->leftJoin('payment_history','subscription.user_id','payment_history.user_id')
            ->select('subscription.*','businesses.*','plan.*','users.*','payment_history.*')
            ->where('subscription.user_id',$this->user->id)
            // ->groupBy('subscription.id')
            ->get();

        $client = new Client();
        $res = $client->request('GET', config('froiden_envato.updater_file_path'), ['verify' => false]);
        $lastVersion = $res->getBody();
        $lastVersion = json_decode($lastVersion, true);
        $currentVersion = File::get('version.txt');

        $description = $lastVersion['description'];

        $newUpdate = 0;
        if (version_compare($lastVersion['version'], $currentVersion) > 0)
        {
            $newUpdate = 1;
        }
        $updateInfo = $description;
        $lastVersion = $lastVersion['version'];

        $appVersion = File::get('version.txt');
        $laravel = app();
        $laravelVersion = $laravel::VERSION;

        // return view('admin.settings.index', compact('bookingTimes', 'images', 'tax', 'timezones', 'currencies', 'enabledLanguages', 'smtpSetting', 'themeSetting', 'frontThemeSetting', 'lastVersion', 'updateInfo', 'appVersion', 'laravelVersion', 'newUpdate', 'credentialSetting', 'smsSetting','payment_card','plan','plan_list','payment_table','planx','subscription_id'));

        return view('admin.settings.index', compact('bookingTimes', 'images', 'tax', 'timezones', 'currencies', 'enabledLanguages', 'smtpSetting', 'themeSetting', 'frontThemeSetting', 'lastVersion', 'updateInfo', 'appVersion', 'laravelVersion', 'newUpdate', 'credentialSetting', 'smsSetting','plan','plan_list','payment_table','subscription_id'));
    }

    public function update(UpdateSetting $request, $id){

        // $setting = CompanySetting::first();
        $setting = CompanySetting::find($id);
        $setting->company_name = $request->company_name;
        $setting->company_email = $request->company_email;
        $setting->company_phone = $request->company_phone;
        $setting->address = $request->address;
        $setting->website = $request->website;
        $setting->timezone = $request->timezone;
        $setting->locale = $request->input('locale');
        $setting->currency_id = $request->currency_id;
        if ($request->hasFile('logo')) {
            $setting->logo = Files::upload($request->logo,'logo');
        }
        $setting->save();
        return Reply::redirect(route('admin.settings.index'), __('messages.updatedSuccessfully'));

    }
}
