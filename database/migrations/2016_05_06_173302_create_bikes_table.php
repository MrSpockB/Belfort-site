<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('precio');
            $table->string('modelo');
            $table->integer('submodelo');
            $table->integer('talla');
            $table->string('rodado');
            $table->string('year');
            $table->string('color');
            $table->string('aplicacion');
            $table->string('recorrido');
            $table->string('categoria');
            $table->string('codigoAX');
            $table->string('descAX');
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
        Schema::drop('bikes');
    }
}
