<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPqrsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('correo');
            $table->string('pqr_cor',50);
            $table->string('tip_pqr');
            $table->text('descripsion');
            $table->date('fec_ini');
            $table->date('fec_fin');
            $table->string('estado',1);
            $table->string('activo',1);
            $table->integer('sucursal_id');//->unsigned();
           // $table->foreign('id_suc')->references('id_suc')->on('sucursales');
// dudas correo como puede ser de  un usuario de una tabla distinta 
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
         Schema::drop('pqrs');
    }
}
