<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('businesses')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('plan_id')->nullable();
            $table->foreign('plan_id')->references('id')->on('plan')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->dateTime ('last_payment');
            $table->dateTime ('next_payment');
            $table->string('recuring_payment');
            
            $table->timestamps();
        });

        $data = array(    

            array(
                'business_id'=>1,'plan_id'=>2,'user_id'=>1,
                'last_payment'=>'2019-12-09 11:09:34','next_payment'=>'2020-01-09 11:09:34',
                'recuring_payment'=>'Monthly',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),

            array(
                'business_id'=>2,'plan_id'=>2,'user_id'=>2,
                'last_payment'=>'2019-12-09 11:09:34','next_payment'=>'2020-01-09 11:09:34',
                'recuring_payment'=>'Monthly',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),

            array(
                'business_id'=>3,'plan_id'=>1,'user_id'=>8,
                'last_payment'=>'2019-12-09 11:09:34','next_payment'=>'2020-01-09 11:09:34',
                'recuring_payment'=>'Monthly',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),

        );

        DB::table('subscription')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
}
