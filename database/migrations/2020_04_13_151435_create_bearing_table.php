<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBearingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bearing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity')->default(0);
            $table->string('material');
            $table->string('abec')->nullable();
            $table->string('race')->nullable();
            $table->string('race_print')->nullable();
            $table->string('retainer')->nullable();
            $table->string('shield')->nullable();
            $table->string('shield_brand')->nullable();
            $table->string('shield_brand_print')->nullable();
            $table->string('shield_brand_color')->nullable();
            $table->string('spamaterial')->nullable();
            $table->string('spacolor')->nullable();
            $table->string('packfirst')->nullable();
            $table->string('brandfirst')->nullable();
            $table->string('packsecond')->nullable();
            $table->string('brandsecond')->nullable();
            $table->string('designname')->nullable();
            $table->json('pantone_color')->nullable();
            $table->string('pantone_print')->nullable();
            $table->boolean('reorder')->default(false);
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
        Schema::dropIfExists('bearing');
    }
}
