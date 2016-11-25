<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSucursalesTbl extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sucursales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('suc_dir',70);
            // $table->integer('suc_tel');
       
            //$table->integer('ext');
            $table->string('col_tex',40);
            $table->string('estado',1);
            $table->string('foto',50);
           // $table->integer('id_nov');//->unsigned();
           // $table->foreign('id_nov')->references('id_nov')->on('novedades');
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
        Schema::drop('sucursales');
    }
}
