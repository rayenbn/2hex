<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePriceColumnHeatTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heat_transfers', function (Blueprint $table) {
            $table->renameColumn('price', 'total_screens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('heat_transfers', function (Blueprint $table) {
            $table->renameColumn('total_screens', 'price');
        });
    }
}
