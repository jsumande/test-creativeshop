<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertCompanySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    $data = array(    

        array(
            'business_id'=>1,'booking_id'=>1,'company_name'=>'Food Business',
            'company_email'=>'foodBusiness@example.com','company_phone'=>639088184445,
            'logo'=>null,'address'=>'Manila / Philippines','website'=>'http://www.food_Business.com',
            'timezone'=>'Asia/Manila','locale'=>'en','latitude'=>26.91243360,
            'longitude'=>75.78727090,'currency_id'=>1,'created_at'=>null,'updated_at'=>null,
            'purchase_code'=>'envato-dev','supported_until'=>null,
        ),

        array(
            'business_id'=>2,'booking_id'=>1,'company_name'=>'Shirt Business',
            'company_email'=>'shirtBusiness@example.com','company_phone'=>639088184446,
            'logo'=>null,'address'=>'Tokyo / Japan','website'=>'http://www.shirt_Business.com',
            'timezone'=>'Asia/Tokyo','locale'=>'en','latitude'=>26.91243360,
            'longitude'=>75.78727090,'currency_id'=>1,'created_at'=>null,'updated_at'=>null,
            'purchase_code'=>'envato-dev','supported_until'=>null,
        ),

        array(
            'business_id'=>3,'booking_id'=>1,'company_name'=>'Technology Business',
            'company_email'=>'technologyBusinesss@example.com','company_phone'=>639088184447,
            'logo'=>null,'address'=>'Kuala Lumpur / Malaysia','website'=>'http://www.street_Businesss.com',
            'timezone'=>'Asia/Kuala Lumpur','locale'=>'en','latitude'=>26.91243360,
            'longitude'=>75.78727090,'currency_id'=>1,'created_at'=>null,'updated_at'=>null,
            'purchase_code'=>'envato-dev','supported_until'=>null,
        ),

        array(
            'business_id'=>4,'booking_id'=>1,'company_name'=>'House Business',
            'company_email'=>'houseBusiness@example.com','company_phone'=>639088184448,
            'logo'=>null,'address'=>'Bangkok / Thailand','website'=>'http://www.house_Business.com',
            'timezone'=>'Asia/Bangkok','locale'=>'en','latitude'=>26.91243360,
            'longitude'=>75.78727090,'currency_id'=>1,'created_at'=>null,'updated_at'=>null,
            'purchase_code'=>'envato-dev','supported_until'=>null,
        ),

        array(
            'business_id'=>5,'booking_id'=>1,'company_name'=>'Cars Business',
            'company_email'=>'carsBusiness@example.com','company_phone'=>639088184449,
            'logo'=>null,'address'=>'Seoul / South Korea','website'=>'http://www.cars_Business.com',
            'timezone'=>'Asia/Seoul','locale'=>'en','latitude'=>26.91243360,
            'longitude'=>75.78727090,'currency_id'=>1,'created_at'=>null,'updated_at'=>null,
            'purchase_code'=>'envato-dev','supported_until'=>null,
        ),
    );

        DB::table('company_settings')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
