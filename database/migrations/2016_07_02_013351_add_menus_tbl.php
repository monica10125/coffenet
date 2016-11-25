<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenusTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_men',45);
            $table->float('precio_menu');
            $table->integer('sucursal_id')->unsigned()->nullable();

            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onUpdate('cascade')->onDelete('set null');


            $table->timestamps();
        });

        Schema::create('menu_producto',function (Blueprint $table){
                $table->integer('producto_id')->unsigned();
                $table->integer('menu_id')->unsigned();
                $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade');//->onDelete('cascade');
                $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade');//->onDelete('cascade');
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
    Schema::drop('menu_producto');
    Schema::drop('menus');    

    }
}
