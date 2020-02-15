<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePaymentGatewayCredentialsRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::table('payment_gateway_credentials')->where(['id' => 1])->update(['stripe_status' => 'deactive','paypal_status' => 'deactive']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('payment_gateway_credentials')->where(['id' => 1])->update(['stripe_status' => '','paypal_status' => '']);
    }
}
