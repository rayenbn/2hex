<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheels', function (Blueprint $table) {
            $table->increments('wheel_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedInteger('type_id');
            $table->json('type_colors')->nullable();
            $table->unsignedInteger('shape_id');
            $table->string('shape_print')->nullable();
            $table->string('hardness');
            $table->boolean('is_shr')->default(false);
            $table->string('top_print')->nullable();
            $table->string('top_colors')->nullable();
            $table->string('back_print')->nullable();
            $table->string('back_colors')->nullable();
            $table->string('placement');
            $table->string('cardboard_print')->nullable();
            $table->string('cardboard_colors')->nullable();
            $table->string('carton_print')->nullable();
            $table->string('carton_colors')->nullable();
            $table->double('price', 8, 2)->default(0.0);
            $table->double('total', 8, 2)->default(0.0);
            $table->string('created_by')->nullable();
            $table->boolean('submit')->default(false);
            $table->timestamp('saved_date')->nullable();
            $table->boolean('usenow')->default(true);
            $table->timestamps();

            $table->foreign('type_id')
                ->references('type_id')
                ->on('wheel_types')
                ->onDelete('cascade');

            $table->foreign('shape_id')
                ->references('shape_id')
                ->on('wheel_shapes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheels');
    }
}
