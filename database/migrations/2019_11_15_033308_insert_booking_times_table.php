<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBookingTimesTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,'day'=>'monday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>2,'day'=>'tuesday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'day'=>'wednesday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),


        array(
            'business_id'=>2,'booking_id'=>4,'day'=>'thursday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>5,'day'=>'friday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>4,'booking_id'=>6,'day'=>'thursday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>5,'booking_id'=>7,'day'=>'friday',
            'start_time'=>'04:30:00','end_time'=>'14:30:00','multiple_booking'=>NULL,
            'status'=>NULL,'slot_duration'=>NULL,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );


        DB::table('booking_times')->insert($data);
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
