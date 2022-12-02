<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavBarSectionShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav_bar_section_shops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nav_bar_section_id')->unsigned();
            $table->bigInteger('retailer_id')->unsigned();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('nav_bar_section_id')->references('id')->on('nav_bar_sections')->onDelete('cascade');
            $table->foreign('retailer_id')->references('id')->on('retailer_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nav_bar_section_products');
    }
}
