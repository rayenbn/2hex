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
            $table->string('type');
            $table->string('type_colors')->nullable();
            $table->string('shape');
            $table->string('shape_print')->nullable();
            $table->string('size');
            $table->string('contact_patch');
            $table->string('hardness');
            $table->boolean('is_shr')->default(false);
            $table->string('top_print')->nullable();
            $table->string('top_colors')->nullable();
            $table->string('back_print')->nullable();
            $table->string('back_colors')->nullable();
            $table->string('placement');
            $table->string('cardboard_print')->nullable();
            $table->string('carton_print')->nullable();
            $table->string('carton_colors')->nullable();
            $table->decimal('price')->default(0.0);
            $table->decimal('total')->default(0.0);
            $table->decimal('fix_cost')->default(0.0);
            $table->boolean('usenow')->default(true);
            $table->boolean('submit')->default(false);
            $table->string('created_by')->nullable();
            $table->timestamp('saved_date')->nullable();

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
        Schema::dropIfExists('wheels');
    }
}
