<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('sub_cat_id');
            $table->integer('brand_id');
            $table->string('title');
            $table->string('slug');
            $table->string('sku');
            $table->text('description')->nullable();
            $table->double('price');
            $table->double('compare_price')->nullable();
            $table->integer('featured_product')->default('0');
            $table->text('image');
            $table->string('barcode')->nullable();
            $table->string('track_quantity');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('products');
    }
};
