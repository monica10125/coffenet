<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('foto',150);
            $table->text('descripsion');
            $table->double('valor');
            $table->string('estado',1);
            //$table->integer('id_ped');//->unsigned();
            $table->integer('inventario_id')->unsigned()->nullable();
            //$table->foreign('id_ped')->references('id_ped')->on('pedidos');
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('set null')->onUpdate('cascade');
            
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
       Schema::drop('productos');
    }
}
