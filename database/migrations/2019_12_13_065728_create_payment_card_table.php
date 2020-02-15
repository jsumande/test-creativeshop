<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_card', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('account_name');
            $table->string('card_number');
            $table->string('pt_invoice_id');

            $table->timestamps();
        });

        $data = array(    

            array(
                'user_id'=>1,
                'account_name'=> null,'card_number'=> null,'pt_invoice_id'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

            array(
                'user_id'=>2,
                'account_name'=> null,'card_number'=> null,'pt_invoice_id'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

            array(
                'user_id'=>8,
                'account_name'=> null,'card_number'=> null,'pt_invoice_id'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),
        );

        DB::table('payment_card')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_card');
    }
}
