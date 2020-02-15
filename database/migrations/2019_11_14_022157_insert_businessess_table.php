<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBusinessessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    $data = array(     

        array('title'=>'Food Business','slug'=>'food-business','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'), 
        array('title'=>'Shirt Business','slug'=>'shirt-business','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('title'=>'Technology Business','slug'=>'technology-business','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('title'=>'House Business','slug'=>'house-business','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('title'=>'Cars Business','slug'=>'cars-business','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),    
    );

        DB::table('businesses')->insert($data);
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
