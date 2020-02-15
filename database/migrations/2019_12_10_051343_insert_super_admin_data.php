<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSuperAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $password = Hash::make('123456');
        $data = array(

        array(
            'group_id'=>null,'name'=>'Super Admin','email'=>'superadmin@example.com',
            'calling_code'=>null,'mobile'=>'999999999','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>null,
            'is_admin'=>2,'is_employee'=>0,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ), 
       
    );

        DB::table('users')->insert($data);
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
