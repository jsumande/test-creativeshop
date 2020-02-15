<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertPaymentsTable extends Migration
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
            'currency_id'=>1,'booking_id'=>1,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>1,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'currency_id'=>1,'booking_id'=>2,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>2,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'currency_id'=>1,'booking_id'=>3,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>1,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'currency_id'=>1,'booking_id'=>4,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>2,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'currency_id'=>1,'booking_id'=>5,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>3,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'currency_id'=>1,'booking_id'=>6,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>4,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'currency_id'=>1,'booking_id'=>7,'amount'=>5.00,
            'gateway'=>null,'transaction_id'=>null,'status'=>null,
            'paid_on'=>'2019-11-14 11:09:33','customer_id'=>5,'event_id'=>null,
            'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

    );

        DB::table('payments')->insert($data);
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
