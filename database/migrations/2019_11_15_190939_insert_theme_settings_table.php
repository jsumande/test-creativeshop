<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertThemeSettingsTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>2,'booking_id'=>2,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>2,'booking_id'=>4,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>3,'booking_id'=>5,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>4,'booking_id'=>6,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>5,'booking_id'=>7,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

        array(
            'business_id'=>3,'booking_id'=>8,'primary_color'=>'#414552',
            'secondary_color'=>'#788AE2','sidebar_bg_color'=>'#FFFFFF',
            'sidebar_text_color'=>'#5C5C62','topbar_text_color'=>'#FFFFFF',
            'created_at'=>null,'updated_at'=>null,
        ),

    );

        DB::table('theme_settings')->insert($data);
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
