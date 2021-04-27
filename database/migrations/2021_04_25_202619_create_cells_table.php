<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('cells', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('row')->default(1);
            $table->char('column', 3)->default('A');
            $table->unsignedBigInteger('tray_id');
            $table->foreign('tray_id')->references('id')->on('trays');
            $table->unsignedBigInteger('plant_id')->nullable();
            $table->foreign('plant_id')->references('id')->on('plants');
            $table->date('planted_on')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cells');
    }
}
