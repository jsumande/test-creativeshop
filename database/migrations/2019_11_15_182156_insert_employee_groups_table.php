<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertEmployeeGroupsTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,
            'name'=>'Epic Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>2,
            'name'=>'Origin Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'booking_id'=>3,
            'name'=>'Epic Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>4,
            'name'=>'Origin Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>5,
            'name'=>'Steam Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>4,'booking_id'=>6,
            'name'=>'Blizzard Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>5,'booking_id'=>7,
            'name'=>'Ubisoft Games','status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );

        DB::table('employee_groups')->insert($data);
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
