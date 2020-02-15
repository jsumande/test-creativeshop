<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertBookingsTable extends Migration
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
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'employee_id'=>1,'user_id'=>2,
            'date_time'=>'2019-11-15 11:09:33','status'=>'in progress','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>2,'user_id'=>3,
            'date_time'=>'2019-11-15 11:09:33','status'=>'completed','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>2,'employee_id'=>2,'user_id'=>4,
            'date_time'=>'2019-11-15 11:09:33','status'=>'canceled','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'employee_id'=>3,'user_id'=>5,
            'date_time'=>'2019-11-15 11:09:33','status'=>'completed','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>4,'employee_id'=>2,'user_id'=>6,
            'date_time'=>'2019-11-15 11:09:33','status'=>'canceled','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>5,'employee_id'=>3,'user_id'=>7,
            'date_time'=>'2019-11-15 11:09:33','status'=>'completed','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>3,'employee_id'=>3,'user_id'=>8,
            'date_time'=>'2019-11-15 11:09:33','status'=>'completed','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),

        array(
            'business_id'=>1,'employee_id'=>1,'user_id'=>1,
            'date_time'=>'2019-11-15 11:09:33','status'=>'pending','payment_gateway'=>NULL,
            'original_amount'=>0,'discount'=>0,'discount_percent'=>0,
            'tax_name'=>NULL,'tax_percent'=>NULL,'tax_amount'=>NULL,
            'amount_to_pay'=>NULL,'payment_status'=>NULL,'source'=>NULL,
            'additional_notes'=>null,'created_at'=>'2019-11-14 11:09:33','updated_at'=>'2019-11-14 11:09:33',
        ),
        
  
       
    );


        DB::table('bookings')->insert($data);
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
