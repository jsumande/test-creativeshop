<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_subscription', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('subscription_id')->nullable();
            $table->foreign('subscription_id')->references('id')->on('subscription')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('invoice_id');
            $table->string('references_no');
            $table->string('transaction_id');
            $table->string('pt_token');
            $table->string('pt_customer_email');
            $table->string('pt_customer_password');
            $table->string('title');
            $table->string('cc_first_name');
            $table->string('cc_last_name');
            $table->string('order_id');
            $table->string('product_name');
            $table->string('customer_email');
            $table->string('phone_number');
            $table->string('amount');
            $table->string('currency');
            $table->string('address_billing');
            $table->string('state_billing');
            $table->string('city_billing');
            $table->string('postal_code_billing');
            $table->string('country_billing');
            $table->string('address_shipping');
            $table->string('city_shipping');
            $table->string('state_shipping');
            $table->string('postal_code_shipping');
            $table->string('country_shipping');
            $table->timestamps();
        });


        $data = array(    

            array(
                'subscription_id'=>1,
                'invoice_id'=>'373661','references_no'=>'ABC-123',
                'transaction_id'=>'423428','pt_token'=>'iX6x4eDoANoJOWERe16PeCg02ut7Mwd5',
                'pt_customer_email'=>'sample@gmail.com','pt_customer_password'=>'wrLpdt5i26',
                'title'=> null,'cc_first_name'=> null,'cc_last_name'=> null,
                'order_id'=> null,'product_name'=> null,'customer_email'=> null,
                'phone_number'=> null,'amount'=> null,'currency'=> null,
                'address_billing'=> null,'state_billing'=> null,'city_billing'=> null,
                'postal_code_billing'=> null,'country_billing'=> null,'address_shipping'=> null,
                'city_shipping'=> null,'state_shipping'=> null,'postal_code_shipping'=> null,
                'country_shipping'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

            array(
                'subscription_id'=>2,
                'invoice_id'=>'373321','references_no'=>'ABC-123',
                'transaction_id'=>'423428','pt_token'=>'iX6x4eDoANoJOWERe16PeCg02ut7Mwd5',
                'pt_customer_email'=>'sample@gmail.com','pt_customer_password'=>'wrLpdt5i26',
                'title'=> null,'cc_first_name'=> null,'cc_last_name'=> null,
                'order_id'=> null,'product_name'=> null,'customer_email'=> null,
                'phone_number'=> null,'amount'=> null,'currency'=> null,
                'address_billing'=> null,'state_billing'=> null,'city_billing'=> null,
                'postal_code_billing'=> null,'country_billing'=> null,'address_shipping'=> null,
                'city_shipping'=> null,'state_shipping'=> null,'postal_code_shipping'=> null,
                'country_shipping'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),

            array(
                'subscription_id'=>3,
                'invoice_id'=>'373316','references_no'=>'ABC-123',
                'transaction_id'=>'423428','pt_token'=>'iX6x4eDoANoJOWERe16PeCg02ut7Mwd5',
                'pt_customer_email'=>'423428','pt_customer_password'=>'wrLpdt5i26',
                'title'=> null,'cc_first_name'=> null,'cc_last_name'=> null,
                'order_id'=> null,'product_name'=> null,'customer_email'=> null,
                'phone_number'=> null,'amount'=> null,'currency'=> null,
                'address_billing'=> null,'state_billing'=> null,'city_billing'=> null,
                'postal_code_billing'=> null,'country_billing'=> null,'address_shipping'=> null,
                'city_shipping'=> null,'state_shipping'=> null,'postal_code_shipping'=> null,
                'country_shipping'=> null,
                'created_at'=>'2019-12-11 11:09:34','updated_at'=>'2019-12-11 11:09:34',
            ),
        );

        DB::table('payment_subscription')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_subscription');
    }
}
