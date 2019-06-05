<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColorColimnsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('bottom_print_color', 'bottomprint_color');
            $table->renameColumn('top_print_color', 'topprint_color');
            $table->renameColumn('carton_print_color', 'carton_color');
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
            $table->renameColumn('bottomprint_color', 'bottom_print_color');
            $table->renameColumn('topprint_color', 'top_print_color');
            $table->renameColumn('carton_color', 'carton_print_color');
        });
    }
}
