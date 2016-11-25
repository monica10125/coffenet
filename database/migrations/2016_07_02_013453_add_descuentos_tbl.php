<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescuentosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
             $table->increments('id');
            $table->string('estado',1);
            $table->integer('can_des');
            $table->integer('publicidad_id');//->unsigned();
            $table->integer('factura_id');//->unsigned();
            //$table->foreign('id_pub')->references('id_pub')->on('publicidades');    
            //$table->foreign('id_fac')->references('id_fac')->on('facturas');    
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
       Schema::drop('descuentos');
    }
}
