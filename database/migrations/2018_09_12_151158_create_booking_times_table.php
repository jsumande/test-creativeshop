<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\BookingTime;

class CreateBookingTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->timestamps();
        });

        BookingTime::insert([
            ['day' => 'monday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
            ['day' => 'tuesday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
            ['day' => 'wednesday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
            ['day' => 'thursday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
            ['day' => 'friday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
            ['day' => 'saturday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
            ['day' => 'sunday', 'start_time' => '10:00:00', 'end_time' => '20:00:00'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_times');
    }
}
