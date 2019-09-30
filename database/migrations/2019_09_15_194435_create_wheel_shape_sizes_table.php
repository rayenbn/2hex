<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWheelShapeSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheel_shape_sizes', function (Blueprint $table) {
            $table->increments('size_id');
            $table->string('size');
            $table->string('contact_patch');
            $table->unsignedInteger('shape_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('shape_id')->references('shape_id')->on('wheel_shapes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheel_shape_sizes');
    }
}
