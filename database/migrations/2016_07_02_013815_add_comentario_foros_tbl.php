<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComentarioForosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_foros', function (Blueprint $table) {
            $table->increments('id');
            // usigned  significa de referencia
            $table->text('comentario');
            $table->date('fec_com');
            $table->string('estado',1);
            $table->integer('foro_id');//->unsigned();
            //$table->foreign('id_for')->references('id_for')->on('foros');
 
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
        Schema::drop('comentario_foros');
            //
        
    }
}
