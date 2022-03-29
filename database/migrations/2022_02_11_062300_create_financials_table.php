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
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('qtr');
            $table->decimal('PBT', 19, 4)->nullable();
            $table->decimal('PAT', 19, 4)->nullable();
            $table->decimal('EBITDA', 19, 4)->nullable();
            $table->decimal('revenue', 19, 4)->nullable();
            $table->decimal('margin', 19, 4)->nullable();
            $table->decimal('expense', 19, 4)->nullable();
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
        Schema::dropIfExists('financials');
    }
};
