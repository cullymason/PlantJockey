<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlantStagesToCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cells', function (Blueprint $table) {
            $table->date('germinated_on')->after('planted_on')->nullable();
            $table->date('flowered_on')->after('germinated_on')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cells', function (Blueprint $table) {
            $table->dropColumn('germinated_on');
            $table->dropColumn('flowered_on');
        });
    }
}
