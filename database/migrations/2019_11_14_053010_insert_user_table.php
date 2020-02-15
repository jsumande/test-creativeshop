<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertUserTable extends Migration
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
            'group_id'=>null,'name'=>'M.S.Dhoni','email'=>'admin@example.com',
            'calling_code'=>null,'mobile'=>'1919191919','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>'lgaR8kE8pRA8ydkuT4YCZNX2c1HqSz3N8OT4hYIAs4KoB3NEAz4H2AhqDeaf',
            'is_admin'=>1,'is_employee'=>0,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ), 
        
        array(
            'group_id'=>null,'name'=>'Robert A. Reno','email'=>'RobertAReno_admin@gmail.com',
            'calling_code'=>null,'mobile'=>'1919191911','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>'lgaR8kE8pRA8ydkuT4YCZNX2c1HqSz3N8OT4hYIAs4KoB3NEAz4H2AhqDeaf',
            'is_admin'=>1,'is_employee'=>0,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ),     
        
        array(
            'group_id'=>1,'name'=>'Bryan A. Sheffield','email'=>'BryanASheffield@gmail.com',
            'calling_code'=>'+63','mobile'=>'9088184444','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>NUll,
            'is_admin'=>0,'is_employee'=>1,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ),

        array(
            'group_id'=>2,'name'=>'Jessica N. Roehl','email'=>'JessicaNRoehl@gmail.com',
            'calling_code'=>'+63','mobile'=>'9088184445','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>NUll,
            'is_admin'=>0,'is_employee'=>1,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ),

        array(
            'group_id'=>3,'name'=>'Helen S. Johnson','email'=>'HelenSJohnson@gmail.com',
            'calling_code'=>'+63','mobile'=>'9088184446','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>NUll,
            'is_admin'=>0,'is_employee'=>1,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ),

        array(
            'group_id'=>4,'name'=>'David E. Darling','email'=>'DavidEDarling@gmail.com',
            'calling_code'=>'+63','mobile'=>'9088184447','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>NUll,
            'is_admin'=>0,'is_employee'=>1,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ),

        array(
            'group_id'=>5,'name'=>'Gordon K. Shifflett','email'=>'GordonKShifflett@gmail.com',
            'calling_code'=>'+63','mobile'=>'9088184448','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>NUll,
            'is_admin'=>0,'is_employee'=>1,'created_at'=>'2019-11-14 11:09:33',
            'created_at'=>'2019-11-14 11:09:33','deleted_at'=>NUll,
        ),

        array(
            'group_id'=>null,'name'=>'Julieta W. Yates','email'=>'JulietaWYates_admin@gmail.com',
            'calling_code'=>null,'mobile'=>'1919191911','mobile_verified'=>0,
            'password'=>$password,'image'=>NULL,'remember_token'=>'lgaR8kE8pRA8ydkuT4YCZNX2c1HqSz3N8OT4hYIAs4KoB3NEAz4H2AhqDeaf',
            'is_admin'=>1,'is_employee'=>0,'created_at'=>'2019-11-14 11:09:33',
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
