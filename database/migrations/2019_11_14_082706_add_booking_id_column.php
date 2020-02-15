<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('booking_times', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('business_services', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('location_id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('company_settings', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('employee_groups', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('front_theme_settings', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('media', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('sms_settings', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('smtp_settings', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('tax_settings', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });

        Schema::table('theme_settings', function (Blueprint $table) {
            $table->unsignedInteger('booking_id')->nullable()->after('id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('booking_times', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('business_services', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('categories', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn('booking_id');
        });

        Schema::table('employee_groups', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('front_theme_settings', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('locations', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('media', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('pages', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('sms_settings', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('smtp_settings', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

        Schema::table('tax_settings', function (Blueprint $table) {
            $table->dropColumn('booking_id');
        });

        Schema::table('theme_settings', function (Blueprint $table) {
             $table->dropColumn('booking_id');
        });

    }
}
