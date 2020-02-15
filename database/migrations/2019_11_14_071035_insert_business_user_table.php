<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBusinessUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
    $data = array(        
        array('user_id'=>1,'business_id'=>1,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'), 
        array('user_id'=>2,'business_id'=>2,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'), 
        array('user_id'=>3,'business_id'=>1,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('user_id'=>4,'business_id'=>2,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('user_id'=>5,'business_id'=>3,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('user_id'=>6,'business_id'=>4,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'), 
        array('user_id'=>7,'business_id'=>5,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),
        array('user_id'=>8,'business_id'=>3,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:34'),    
    );

        DB::table('business_user')->insert($data);
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
