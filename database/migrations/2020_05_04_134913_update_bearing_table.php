<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBearingPrintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bearing', function (Blueprint $table) {
            $table->string('cardbox_print')->nullable();;
            $table->string('cardboxtwo_print')->nullable();;
            $table->string('sticker_print')->nullable();;
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
            $table->dropColumn(['cardbox_print', 'cardboxtwo_print', 'sticker_print']);
        });
    }
}
