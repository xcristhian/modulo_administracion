<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id_producto');
            $table->string('nombre_producto', 255);
            $table->string('marca_producto', 255);
            $table->string('modelo_producto', 255);
            $table->unsignedInteger('categoria_producto');
            $table->foreign("categoria_producto")
                ->references("id_categoria")
                ->on("categoria")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->string('descripcion_producto', 255);
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
