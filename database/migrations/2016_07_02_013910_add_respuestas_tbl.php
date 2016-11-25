<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRespuestasTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('responsable',60);
            $table->date('fec_rec');
            $table->date('fec_res');
            $table->text('respuesta');
            $table->integer('pqr_id');//->unsigned();
            //$table->foreign('id_pqr')->references('id_pqr')->on('pqrs');
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
       Schema::drop('respuestas');
      }
}
