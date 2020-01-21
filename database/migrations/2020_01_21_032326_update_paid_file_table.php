<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePaidFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paid_files', function (Blueprint $table) {
            $table->text('selected_orders')->nullable();;
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paid_files', function (Blueprint $table) {
            $table->dropColumn('selected_orders');
            $table->dropColumn('created_by');
        });
    }
}
