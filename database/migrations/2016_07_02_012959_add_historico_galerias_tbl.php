<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHistoricoGaleriasTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_galerias', function (Blueprint $table) {
        $table->increments('id');
            $table->string('tip_arc');
            $table->text('archivo');
            $table->string('nombre',50);
            $table->string('carpeta',30);
            $table->date('fec_cre');
            $table->string('estado',1);
            $table->integer('usuario_id');//->unsigned();
            //$table->foreign('id_usu')->references('id_usu')->on('usuarios');
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
       Schema::drop('historico_galerias');
        
    }
}
