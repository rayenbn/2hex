<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricesColumsHeatTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heat_transfers', function (Blueprint $table) {
            $table->double('cost_per_transfer', 8, 2)->default(0.0);
            $table->double('cost_per_screen', 8, 2)->default(0.0);
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
            $table->dropColumn(['cost_per_transfer', 'cost_per_screen']);
        });
    }
}
