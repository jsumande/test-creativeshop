<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertLocationsTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,'name'=>'Manila / Philippines',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>2,'name'=>'Tokyo / Japan',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'name'=>'Beijing / China',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>4,'name'=>'Taipei / Taiwan',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>5,'name'=>'Kuala Lumpur / Malaysia',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>4,'booking_id'=>6,'name'=>'Bangkok / Thailand',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>5,'booking_id'=>7,'name'=>'Seoul / South Korea',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>8,'name'=>'Seoul / South Korea',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );

        DB::table('locations')->insert($data);
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
