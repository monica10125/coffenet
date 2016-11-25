<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPedidosTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tip_ped',100);
            $table->text('descripcion');
            $table->dateTime('fecha');
            $table->string('nom_sol',50);
            $table->string('estado',1);

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();

        });
        Schema::create('pedido_menu', function (Blueprint $table){

        $table->integer('menu_id')->unsigned();
        $table->integer('pedido_id')->unsigned();
        $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade');
        $table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('cascade');

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

        Schema::drop('pedido_menu');
        Schema::drop('pedidos');
    }
}
