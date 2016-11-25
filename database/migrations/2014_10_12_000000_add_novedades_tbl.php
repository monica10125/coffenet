<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNovedadesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',50);
            $table->string('imagen',100);
            $table->text('contenido');
            $table->date('fec_cre');
            $table->dateTime('fec_eve');
            $table->date('fec_fin');
            $table->string('estado',1);

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
        Schema::drop('novedades');
    }
}
