<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBookingItemsTable extends Migration
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
            'booking_id'=>1,'business_service_id'=>1,
            'quantity'=>25,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'booking_id'=>2,'business_service_id'=>2,
            'quantity'=>35,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'booking_id'=>3,'business_service_id'=>3,
            'quantity'=>25,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'booking_id'=>4,'business_service_id'=>4,
            'quantity'=>35,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'booking_id'=>5,'business_service_id'=>5,
            'quantity'=>45,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'booking_id'=>6,'business_service_id'=>6,
            'quantity'=>55,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'booking_id'=>7,'business_service_id'=>7,
            'quantity'=>65,'unit_price'=>5.00,'amount'=>25.00,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );

        DB::table('booking_items')->insert($data);
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
