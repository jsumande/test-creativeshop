<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSmsSettingsTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>2,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>4,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>5,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>4,'booking_id'=>6,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>5,'booking_id'=>7,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>8,'nexmo_status'=>'deactive',
            'nexmo_key'=>null,'nexmo_secret'=>null,'nexmo_from'=>'NEXMO',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );

        DB::table('sms_settings')->insert($data);
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
