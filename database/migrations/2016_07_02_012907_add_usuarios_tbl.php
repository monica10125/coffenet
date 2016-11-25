<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuariosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('usuarios', function (Blueprint $table) {
                    
       $table->increments('id');
       $table->string('correo')->unique();
       $table->string('usu_nom');
       $table->string('usu_ape');
       $table->string('password');
       $table->date('fec_nac');
       $table->text('usu_fot');
       $table->integer('logeo');
       $table->integer('estado');
       $table->enum('roll',['cliente','empleado','gerencia','admin'])->default('cliente');
       $table->integer('id_suc')->unsigned();
       
       
       $table->foreign('id_suc')->references('id')->on('sucursales')->onDelete('cascade')->onUpdate('cascade');
      
       
       $table->rememberToken();
       $table->timestamps ();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
            //
    public function down()
    {
       Schema::drop('usuarios'); 
        
    }
}
