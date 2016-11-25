<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoPublicidadesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_publicidades', function (Blueprint $table) {
               $table->increments('id');
            $table->string('tip_pub',30);
            $table->text('descripsion');
            $table->integer('publicidad_id');//->unsigned();
            //$table->foreign('id_pub')->references('id_pub')->on('publicidades');
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
      Schema::drop('tipo_publicidades');
    }
}
