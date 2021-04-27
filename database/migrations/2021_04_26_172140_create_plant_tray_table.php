<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantTrayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_tray', function (Blueprint $table) {
            $table->unsignedBigInteger('tray_id');
            $table->foreign('tray_id')->references('id')->on('trays');
            $table->unsignedBigInteger('plant_id')->nullable();
            $table->foreign('plant_id')->references('id')->on('plants');
            $table->string('color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_tray');
    }
}
