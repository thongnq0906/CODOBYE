<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->enique();
            $table->integer('price')->nullable();
            $table->integer('cate_product_id')->unsigned()->nullable();
            $table->integer('position')->unique()->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_home')->default(0);
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('content2')->nullable();
            $table->text('content3')->nullable();
            $table->string('title_seo')->nullable();
            $table->text('meta_key')->nullable();
            $table->text('meta_des')->nullable();
            $table->timestamps();
            $table->foreign('cate_product_id')->references('id')->on('cate_products')->onDelete('cascade');
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
