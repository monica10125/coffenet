<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMenuProductov3Tbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_producto', function (Blueprint $table) {



            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('menu_id')->references('id')->on('menus')->onUpdate('cascade')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_producto', function (Blueprint $table) {

            $table->dropForeign('producto_id_menu_producto_foreign');
            $table->dropForeign('menu_id_menu_producto_foreign');

        });
    }
}
