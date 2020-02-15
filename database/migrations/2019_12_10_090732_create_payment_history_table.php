<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_history', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('plan_id')->nullable();
            $table->foreign('plan_id')->references('id')->on('plan')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('amount');
            $table->string('currency');
            $table->string('transaction_id');
            $table->string('order_id');
            $table->string('pt_invoice_id');
            $table->string('card_last_number');

            $table->timestamps();
        });

        $data = array(    

            array(
                'business_id'=>1,'plan_id'=>2,'user_id'=>1,
                'amount'=> null,'currency'=> null,'transaction_id'=> null,
                'order_id'=> null,'pt_invoice_id'=> null,'card_last_number'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

            array(
                'business_id'=>2,'plan_id'=>2,'user_id'=>2,
                'amount'=> null,'currency'=> null,'transaction_id'=> null,
                'order_id'=> null,'pt_invoice_id'=> null,'card_last_number'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

            array(
                'business_id'=>3,'plan_id'=>1,'user_id'=>8,
                'amount'=> null,'currency'=> null,'transaction_id'=> null,
                'order_id'=> null,'pt_invoice_id'=> null,'card_last_number'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

        );

        DB::table('payment_history')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_history');
    }
}
