<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Admin routes
Route::group(['middleware' => 'auth'], function () {

    // Route::post('mark-notification-read', ['uses' => 'NotificationController@markAllRead'])->name('mark-notification-read');

    // Admin routes
    Route::group(
        ['namespace' => 'Admin', 'prefix' => 'account', 'as' => 'admin.'], function () {

            Route::group(
                ['middleware' => 'admin'], function () {

                    Route::resources(
                        [
                            'locations' => 'LocationController',
                            'categories' => 'CategoryController',
                            'business-services' => 'BusinessServiceController',
                            'pages' => 'PageController',
                            'settings' => 'SettingController',
                            'booking-times' => 'BookingTimeController',
                            'tax-settings' => 'TaxSettingController',
                            'currency-settings' => 'CurrencySettingController',
                            'language-settings' => 'LanguageSettingController',
                            'email-settings' => 'SmtpSettingController',
                            'theme-settings' => 'ThemeSettingController',
                            'front-theme-settings' => 'FrontThemeSettingController',
                            'customers' => 'CustomerController',
                            'credential' => 'PaymentCredentialSettingController',
                            'plan-setting' => 'PlanSettingController',
                            'subscription' => 'DashboardSubscriptionController',
                            'payment-card' => 'PaymentCardController',
                            'fetch'        => 'FetchController',
                            // 'sms-settings' => 'SmsSettingController'
                        ]
                    );
                    Route::put('change-language-status/{id}', 'LanguageSettingController@changeStatus')->name('language-settings.changeStatus');
                    // Route::get('smtp-settings/sent-test-email', ['uses' => 'SmtpSettingController@sendTestEmail'])->name('email-settings.sendTestEmail');
                    Route::get('reports/earningTable', ['uses' => 'ReportController@earningTable'])->name('reports.earningTable');
                    Route::post('reports/earningChart', ['uses' => 'ReportController@earningReportChart'])->name('reports.earningReportChart');
                    Route::get('reports/earning', ['uses' => 'ReportController@index'])->name('reports.index');

                    // Route::get('reports/earningTable', ['uses' => 'ReportController@earningTable'])->name('reports.earningTable');
                    // Route::post('reports/earningChart', ['uses' => 'ReportController@earningReportChart'])->name('reports.earningReportChart');
                    Route::get('reports/customer', ['uses' => 'ReportController@customer'])->name('reports.customer');

                    Route::get('pos/select-customer', ['uses' => 'POSController@selectCustomer'])->name('pos.select-customer');
                    Route::get('pos/search-customer', ['uses' => 'POSController@searchCustomer'])->name('pos.search-customer');
                    Route::get('pos/filter-services', ['uses' => 'POSController@filterServices'])->name('pos.filter-services');
                    Route::get('pos/addCart', ['uses' => 'POSController@addCart'])->name('pos.addCart');
                    Route::resource('pos', 'POSController');

                    Route::resource('employee', 'EmployeeController');
                    Route::resource('employee-group', 'EmployeeGroupController');

                    // Route::resource('update-application', 'UpdateApplicationController');
                    Route::resource('search', 'SearchController');
                }
            );

        Route::get('dashboard', 'ShowDashboard')->name('dashboard');

        Route::post('multiStatusUpdate', ['uses' => 'BookingController@multiStatusUpdate'])->name('bookings.multiStatusUpdate');
        Route::post('sendReminder', ['uses' => 'BookingController@sendReminder'])->name('bookings.sendReminder');
        Route::post('bookings/{status?}', ['uses' => 'BookingController@index'])->name('bookings.index');
        Route::post('bookings/requestCancel/{id}', ['uses' => 'BookingController@requestCancel'])->name('bookings.requestCancel');
        Route::get('bookings/download/{id}', ['uses' => 'BookingController@download'])->name('bookings.download');
        Route::resources([
            'bookings' => 'BookingController',
            'profile' => 'ProfileController'
        ]);
    });

    Route::post('/send-otp-code', 'VerifyMobileController@sendVerificationCode')->name('sendOtpCode');
    Route::post('/send-otp-code/account', 'VerifyMobileController@sendVerificationCode')->name('sendOtpCode.account');
    Route::post('/verify-otp-phone', 'VerifyMobileController@verifyOtpCode')->name('verifyOtpCode');
    Route::post('/verify-otp-phone/account', 'VerifyMobileController@verifyOtpCode')->name('verifyOtpCode.account');
    Route::get('/remove-session', 'VerifyMobileController@removeSession')->name('removeSession');
});


Route::group(['namespace' => 'Super','prefix' => 'super','as' => 'super.'],function (){
    Route::get('dashboard', 'ShowDashboard')->name('dashboard');
    // Route::get('plan', 'PlanController@index')->name('plan');
    // Route::get('subscription', 'SubscriptionController@index')->name('subscription');

    Route::resources(
        [
            'plan' => 'PlanController',
            'subscription' => 'SubscriptionController',
            'history'=> 'PaymentHistoryController',
            'list'=> 'PaymentListController',
        ]
    );
});


// Route::group(['namespace' => 'Label','prefix' => 'label','as' => 'label.'],function (){
//     Route::resources(
//         [
//             'label' => 'LabelController',
//         ]
//     );
// });


Route::group(
    ['namespace' => 'Front', 'as' => 'front.'], function () {
    Route::group(['middleware' => 'cookieRedirect'], function () {
        Route::get('/booking', ['uses' => 'FrontController@bookingPage'])->name('bookingPage');
        Route::get('/checkout', ['uses' => 'FrontController@checkoutPage'])->name('checkoutPage');
    });
    Route::get('/cart', ['uses' => 'FrontController@cartPage'])->name('cartPage');
    Route::get('/result/{value?}', ['uses' => 'FrontController@searchServices',function (Request $request) {}])->name('searchServices');
    Route::post('/add-or-update-product', ['uses' => 'FrontController@addOrUpdateProduct'])->name('addOrUpdateProduct');
    Route::post('/add-booking-details', ['uses' => 'FrontController@addBookingDetails'])->name('addBookingDetails');
    Route::post('/delete-product/{id}', ['uses' => 'FrontController@deleteProduct'])->name('deleteProduct');
    Route::post('/delete-front-product/{id}', ['uses' => 'FrontController@deleteProduct'])->name('deleteFrontProduct');
    Route::post('/update-cart', ['uses' => 'FrontController@updateCart'])->name('updateCart');

    Route::post('/save-booking', ['uses' => 'FrontController@saveBooking'])->name('saveBooking');
    Route::group(['middleware' => 'mobileVerifyRedirect'], function () {
        Route::get('payment-gateway', array('as' => 'payment-gateway','uses' => 'FrontController@paymentGateway',));
        Route::get('offline-payment/{bookingId?}', array('as' => 'offline-payment','uses' => 'FrontController@offlinePayment',));
        Route::get('/payment/{paymentID?}', ['uses' => 'FrontController@paymentConfirmation'])->name('payment');
    });
    Route::post('/booking-slots', ['uses' => 'FrontController@bookingSlots'])->name('bookingSlots');
    Route::post('contact', ['uses' => 'FrontController@contact'])->name('contact');

    Route::get('paypal-recurring', array('as' => 'paypal-recurring','uses' => 'PaypalController@payWithPaypalRecurrring',));

    // route for view/blade file
    Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
// route for post request
    Route::get('paypal/{bookingId?}', array('as' => 'paypal','uses' => 'PaypalController@paymentWithpaypal',));
// route for check status responce
    Route::get('paypal-status/{status?}', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

    Route::post('stripe/{bookingId?}', array('as' => 'stripe','uses' => 'StripeController@paymentWithStripe',));

    Route::post('change-language/{code}', 'FrontController@changeLanguage')->name('changeLanguage');
    Route::post('change-business/{code}', 'FrontController@changeBusiness')->name('changeBusiness');

    Route::get('/{business?}/{categorySlug}/{serviceSlug}', ['uses' => 'FrontController@serviceDetail'])->name('serviceDetail');

    Route::get('/package/create/id/{plan_id?}',['uses' => 'FrontController@package'])->name('package');
    Route::get('/package/dashboard', ['uses' => 'FrontController@packageDashboard'])->name('packageDashboard');
    Route::get('/package/verify', ['uses' => 'FrontController@verifyPaytabs'])->name('verifyPaytabs');
    Route::post('/package/successVerify', ['uses' => 'FrontController@successPost'])->name('successPost');
    Route::post('/package/addMock', ['uses' => 'FrontController@addPackageBusiness'])->name('addPackageBusiness');
    Route::post('/package/paytabs', ['uses' => 'FrontController@paytabs'])->name('paytabs');

    Route::get('/{business?}/{slug}', ['uses' => 'FrontController@page'])->name('page');
    Route::get('/{business?}', ['uses' => 'FrontController@index',function (Request $request) {
    }])->name('index');


    /*

    Route Backups

    Route::get('/', ['uses' => 'FrontController@index'])->name('index');
    Route::get('/{categorySlug}/{serviceSlug}', ['uses' => 'FrontController@serviceDetail'])->name('serviceDetail');
    Route::get('/search/', ['uses' => 'FrontController@searchServices'])->name('searchServices');
    Route::get('/{slug}', ['uses' => 'FrontController@page'])->name('page');
    
    */

});


// Route::post('/paytabs_response', function(Request $request){
//     $pt = Paytabs::getInstance("MERCHANT_EMAIL", "SECRET_KEY");
//     $result = $pt->verify_payment($request->payment_reference);
//     if($result->response_code == 100){
//         // Payment Success
//     }
//     return $result->result;
// });


// Route::get('/paytabs_payment', function () {
//     $pt = Paytabs::getInstance("MERCHANT_EMAIL", "SECRET_KEY");
//     $result = $pt->create_pay_page(array(
//         "merchant_email" => "MERCHANT_EMAIL",
//         'secret_key' => "SECRET_KEY",
//         'title' => "John Doe",
//         'cc_first_name' => "John",
//         'cc_last_name' => "Doe",
//         'email' => "customer@email.com",
//         'cc_phone_number' => "973",
//         'phone_number' => "33333333",
//         'billing_address' => "Juffair, Manama, Bahrain",
//         'city' => "Manama",
//         'state' => "Capital",
//         'postal_code' => "97300",
//         'country' => "BHR",
//         'address_shipping' => "Juffair, Manama, Bahrain",
//         'city_shipping' => "Manama",
//         'state_shipping' => "Capital",
//         'postal_code_shipping' => "97300",
//         'country_shipping' => "BHR",
//         "products_per_title"=> "Mobile Phone",
//         'currency' => "BHD",
//         "unit_price"=> "10",
//         'quantity' => "1",
//         'other_charges' => "0",
//         'amount' => "10.00",
//         'discount'=>"0",
//         "msg_lang" => "english",
//         "reference_no" => "1231231",
//         "site_url" => "https://your-site.com",
//         'return_url' => "https://www.mystore.com/paytabs_api/result.php",
//         "cms_with_version" => "API USING PHP"
//     ));
    
//         if($result->response_code == 4012){
//         return redirect($result->payment_url);
//         }
//         return $result->result;
// });
