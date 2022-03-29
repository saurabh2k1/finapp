<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tech_monthlies', function (Blueprint $table) {
            $table->date('sendout_date')->after('highest_sendout')->nullable();
            $table->date('truckload_date')->after('highest_truck_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tech_monthlies', function (Blueprint $table) {
            $table->dropColumn(['sendout_date', 'truckload_date']);
        });
    }
};
