<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name');
            $table->float('monthly');
            $table->float('annual');
            $table->string('description');
            $table->string('services_limit');
            $table->string('bookings_limit');
            $table->timestamps();
        });

        $data = array(  

            array(
                'plan_name'=>'Free','monthly'=>0,'annual'=>0,
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'services_limit'=> '5','bookings_limit'=> '5',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),  

            array(
                'plan_name'=>'Standard','monthly'=>5,'annual'=>55,
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'services_limit'=> '10','bookings_limit'=> '10',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),

            array(
                'plan_name'=>'Professional','monthly'=>15,'annual'=>155,
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'services_limit'=> '50','bookings_limit'=> '100',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),

            array(
                'plan_name'=>'Advance','monthly'=>25,'annual'=>200,
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'services_limit'=> 'Unlimited','bookings_limit'=> 'Unlimited',
                'created_at'=>'2019-12-09 11:09:34','updated_at'=>'2019-12-09 11:09:34',
            ),
        );

        DB::table('plan')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan');
    }
}
