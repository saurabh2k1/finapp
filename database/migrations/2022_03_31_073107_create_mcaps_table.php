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
        Schema::create('mcaps', function (Blueprint $table) {
            $table->id();
            $table->date('ason_date');
            $table->unsignedInteger('share_no')->default(0);
            $table->decimal('share_price', 8, 2, true)->default(0.00);
            $table->unsignedInteger('mcap')->default(0);
            $table->unsignedInteger('networth')->default(0);
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
        Schema::dropIfExists('mcaps');
    }
};
