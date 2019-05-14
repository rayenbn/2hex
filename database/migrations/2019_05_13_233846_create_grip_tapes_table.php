<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGripTapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grip_tapes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->default(0);
            $table->json('size');
            $table->boolean('perforation')->nullable();
            $table->string('color')->nullable();
            $table->string('grit')->nullable();
            $table->string('die_cut')->nullable();
            $table->string('top_print')->nullable();
            $table->string('top_print_color')->nullable();
            $table->string('backpaper')->nullable();
            $table->string('backpaper_print')->nullable();
            $table->string('backpaper_print_color')->nullable();
            $table->string('carton_print')->nullable();
            $table->string('carton_print_color')->nullable();
            $table->double('price', 8, 2)->default(0.0);
            $table->double('total', 8, 2)->default(0.0);
            $table->double('fixed_cost', 8, 2)->default(0.0);
            $table->string('created_by')->nullable();
            $table->boolean('submit')->default(false);
            $table->timestamp('saved_date')->nullable();
            $table->boolean('usenow')->default(true);
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
        Schema::dropIfExists('grip_tapes');
    }
}
