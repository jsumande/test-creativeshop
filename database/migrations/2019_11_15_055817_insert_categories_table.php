<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertCategoriesTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,'name'=>'Food',
            'slug'=>'food','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>2,'name'=>'Accessories',
            'slug'=>'accessories','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'name'=>'Snack',
            'slug'=>'snack','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'booking_id'=>4,'name'=>'Clothing',
            'slug'=>'clothing','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'booking_id'=>5,'name'=>'Techonolgy',
            'slug'=>'techonolgy','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>4,'booking_id'=>6,'name'=>'Real State',
            'slug'=>'real-state','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>5,'booking_id'=>7,'name'=>'Cars',
            'slug'=>'cars','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'name'=>'Beverage',
            'slug'=>'beverage','image'=>null,'status'=>'active',
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );

        DB::table('categories')->insert($data);
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
