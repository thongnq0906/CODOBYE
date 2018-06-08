<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('holine')->nullable();
            $table->string('facebook')->nullable();
            $table->string('zalo')->nullable();
            $table->longText('contact_info')->nullable();
            $table->longText('contact_info1')->nullable();
            $table->longText('contact_info2')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
