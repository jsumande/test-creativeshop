<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertPurchaseCodeInCompanySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('company_settings', function (Blueprint $table) {
        //     //
        // });

        DB::table('company_settings')->where(['id' => 1])->update(['purchase_code' => 'envato-dev']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('company_settings')->where(['id' => 1])->update(['purchase_code' => '']);
    }
}
