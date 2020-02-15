<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSmtpSettingsTable extends Migration
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
            'business_id'=>1,'booking_id'=>1,'mail_driver'=>'mail',
            'mail_host'=>'one_smtp.gmail.com','mail_port'=>587,'mail_username'=>'one_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'one_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

        array(
            'business_id'=>2,'booking_id'=>2,'mail_driver'=>'mail',
            'mail_host'=>'two_smtp.gmail.com','mail_port'=>587,'mail_username'=>'two_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'two_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

        array(
            'business_id'=>1,'booking_id'=>3,'mail_driver'=>'mail',
            'mail_host'=>'one_smtp.gmail.com','mail_port'=>587,'mail_username'=>'one_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'one_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

        array(
            'business_id'=>2,'booking_id'=>4,'mail_driver'=>'mail',
            'mail_host'=>'two_smtp.gmail.com','mail_port'=>587,'mail_username'=>'two_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'two_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

        array(
            'business_id'=>3,'booking_id'=>5,'mail_driver'=>'mail',
            'mail_host'=>'three_smtp.gmail.com','mail_port'=>587,'mail_username'=>'three_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'three_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

        array(
            'business_id'=>4,'booking_id'=>6,'mail_driver'=>'mail',
            'mail_host'=>'four_smtp.gmail.com','mail_port'=>587,'mail_username'=>'four_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'four_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

        array(
            'business_id'=>5,'booking_id'=>7,'mail_driver'=>'mail',
            'mail_host'=>'five_smtp.gmail.com','mail_port'=>587,'mail_username'=>'five_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'five_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),


        array(
            'business_id'=>3,'booking_id'=>8,'mail_driver'=>'mail',
            'mail_host'=>'five_smtp.gmail.com','mail_port'=>587,'mail_username'=>'five_myemail@gmail.com',
            'mail_password'=>'mypassword','mail_from_name'=>'Appointo','mail_from_email'=>'five_myemail@gmail.com',
            'mail_encryption'=>'none','created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33','verified'=>0,
        ),

    );

        DB::table('smtp_settings')->insert($data);
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
