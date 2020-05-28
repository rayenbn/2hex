<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoltNutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('bolt_nut', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->default(0);
            $table->string('color')->nullable();
            $table->string('costset')->nullable();
            $table->string('allocation')->nullable();
            $table->string('material')->nullable();
            $table->string('size')->nullable();
            $table->string('phil_allen')->nullable();
            $table->string('allen_type')->nullable();
            $table->string('pack')->nullable();
            $table->string('designname')->nullable();
            $table->json('pack_color')->nullable();
            $table->string('pack_print')->nullable();
            $table->double('price', 8, 2)->default(0.0);
            $table->double('total', 8, 2)->default(0.0);
            $table->double('fixed_cost', 8, 2)->default(0.0);
            $table->string('created_by')->nullable();
            $table->boolean('submit')->default(false);
            $table->timestamp('saved_date')->nullable();
            $table->boolean('usenow')->default(true);
            $table->string('saved_name')->nullable();
            $table->integer('saved_batch')->nullable();
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
        Schema::dropIfExists('bolt_nut');
    }
}
