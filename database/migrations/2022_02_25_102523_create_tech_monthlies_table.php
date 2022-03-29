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
        Schema::create('tech_monthlies', function (Blueprint $table) {
            $table->id();
            $table->string('year', 10);
            $table->integer('month');
            $table->string('plant');
            $table->decimal('throughput', 19, 4);
            $table->decimal('highest_sendout', 19, 4);
            $table->integer('highest_truck_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tech_monthlies');
    }
};
