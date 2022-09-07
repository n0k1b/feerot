<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('sub_category_id')->unsigned()->nullable();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('product_detail_image_1')->nullable();
            $table->string('product_detail_image_2')->nullable();
            $table->string('product_detail_image_3')->nullable();
            $table->string('product_detail_image_4')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('product_details',1000)->nullable();
            $table->string('product_look_after_me', 1000)->nullable();
            $table->string('product_about_me', 1000)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('product_brands')->onDelete('cascade');


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
}
