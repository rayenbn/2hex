<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LargePreviewNullableHeatTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('heat_transfers', function (Blueprint $table) {
            $table->string('large_preview')->nullable()->change();
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
            $table->string('large_preview')->nullable(false)->change();
        });
    }
}
