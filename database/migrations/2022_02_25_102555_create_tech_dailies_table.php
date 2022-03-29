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
        Schema::create('tech_dailies', function (Blueprint $table) {
            $table->id();
            $table->date('tdate');
            $table->string('plant');
            $table->integer('capacity_utilisation');
            $table->decimal('power_consumption', 19, 4);
            $table->unsignedInteger('longterm_cargo_unloaded');
            $table->unsignedInteger('spot_cargo_unloaded');
            $table->unsignedInteger('service_cargo_unloaded');
            $table->decimal('C2C3_throughput', 19, 4);
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
        Schema::dropIfExists('tech_dailies');
    }
};
