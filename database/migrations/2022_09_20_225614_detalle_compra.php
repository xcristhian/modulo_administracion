<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->increments('id_detalle_compra');
            $table->unsignedInteger('id_compras');
            $table->foreign("id_compras")
                    ->references("id_compras")
                    ->on("compras")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            $table->unsignedInteger('id_producto');
            $table->foreign("id_producto")
                      ->references("id_producto")
                      ->on("producto")
                      ->onDelete("cascade")
                      ->onUpdate("cascade");
            $table->string('cantidad');
            $table->string('precio_compra');
            $table->string('total');   
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
