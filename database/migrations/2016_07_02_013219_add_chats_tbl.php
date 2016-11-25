<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChatsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->text('mensaje');
            $table->string('usu_cor',100);
            $table->dateTime('fecha');
            $table->string('estado',1);
            $table->integer('usuario_id');//->unsigned();
           // $table->integer('id_usu')->unsigned();
           // $table->foreign('id_usu')->references('id_usu')->on('usuarios');
           // $table->foreign('id_usu')->references('id_usu')->on('usuarios');

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
       Schema::drop('chats');
    }
}
