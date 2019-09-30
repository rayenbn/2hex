<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWheelHardnessPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheel_hardness_prices', function (Blueprint $table) {
            $table->unsignedInteger('size_id');
            $table->unsignedInteger('hardness_id');
            $table->decimal('price')->default(0);

            $table->foreign('size_id')
                ->references('size_id')
                ->on('wheel_shape_sizes')
                ->onDelete('cascade');

            $table->foreign('hardness_id')
                ->references('hardness_id')
                ->on('wheel_hardness')
                ->onDelete('cascade');

            $table->primary(['size_id', 'hardness_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheel_hardness_prices');
    }
}
