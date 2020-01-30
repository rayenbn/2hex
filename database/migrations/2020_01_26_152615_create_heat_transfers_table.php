<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeatTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heat_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('design_name');
            $table->boolean('transparency')->default(false);
            $table->string('colors');
            $table->string('small_preview');
            $table->string('large_preview');
            $table->unsignedInteger('quantity')->default(0);
            $table->string('size');
            $table->string('created_by');
            $table->double('price', 8, 2)->default(0.0);
            $table->double('total', 8, 2)->default(0.0);
            $table->boolean('submit')->default(false);
            $table->timestamp('saved_date')->nullable();
            $table->boolean('usenow')->default(true);
            $table->timestamp('reorder_at')->nullable();
            $table->boolean('reorder')->default(false);
            $table->boolean('saved_batch')->default(false);
            $table->string('saved_name')->nullable();
            $table->string('invoice_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heat_transfers');
    }
}
