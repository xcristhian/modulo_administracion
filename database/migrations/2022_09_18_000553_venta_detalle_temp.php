<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VentaDetalleTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_detalle_temp', function (Blueprint $table) {
            $table->increments('id_detalle_venta');
            $table->unsignedInteger('id_venta');
            $table->foreign("id_venta")
                    ->references("id_venta")
                    ->on("ventas")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            $table->unsignedInteger('id_producto');
            $table->foreign("id_producto")
                      ->references("id_producto")
                      ->on("producto")
                      ->onDelete("cascade")
                      ->onUpdate("cascade");
            $table->unsignedInteger('cantidad');
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
        //
    }
}
