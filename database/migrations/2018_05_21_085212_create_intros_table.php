<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->enique();
            $table->integer('position')->unique()->nullable();
            $table->boolean('status')->default(0);
            $table->string('image')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('title_seo')->nullable();
            $table->text('meta_key')->nullable();
            $table->text('meta_des')->nullable();
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
        Schema::dropIfExists('intros');
    }
}
