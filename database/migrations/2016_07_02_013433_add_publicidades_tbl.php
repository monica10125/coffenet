<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicidadesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicidades', function (Blueprint $table) {
          $table->increments('id');
            $table->string('titulo',30);
            $table->string('imagen',150);
            $table->text('contenido');
            $table->date('fec_ini');
            $table->date('fec_fin');
            $table->string('estado',1);
            
            $table->integer('sucursal_id');//->unsigned();
            //$table->foreign('id_suc')->references('id_suc')->on('sucursales');

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
      Schema::drop('publicidades');
    }
}
