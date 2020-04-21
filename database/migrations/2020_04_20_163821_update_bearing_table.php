<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBearingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bearing', function (Blueprint $table) {
            $table->string('shieldcolor')->nullable();;
            $table->string('firstbrandcolor')->nullable();;
            $table->string('secondbrandcolor')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bearing', function (Blueprint $table) {
            $table->dropColumn(['shieldcolor', 'firstbrandcolor','secondbrandcolor']);
        });
    }
}
