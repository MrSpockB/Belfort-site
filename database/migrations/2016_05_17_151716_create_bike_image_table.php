<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikeImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bike_image', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id');
            $table->integer('bike_id');
            $table->integer('orden');
            $table->enum('tipo', ['slider', 'galeria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bike_image');
    }
}
