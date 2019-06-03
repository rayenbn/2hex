<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSaveOrderNameTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('saved_name')->nullable();
        });
        Schema::table('grip_tapes', function (Blueprint $table) {
            $table->string('saved_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('saved_name');
        });
        Schema::table('grip_tapes', function (Blueprint $table) {
            $table->dropColumn('saved_name');
        });
    }
}
