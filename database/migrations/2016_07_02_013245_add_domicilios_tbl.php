<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDomiciliosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
                $table->increments('id');
            $table->string('dom_dir',35);
            $table->integer('pedido_id');//->unsigned();
            //$table->foreign('id_ped')->references('id_ped')->on('pedidos');
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
        Schema::drop('domicilios');
    }
}
