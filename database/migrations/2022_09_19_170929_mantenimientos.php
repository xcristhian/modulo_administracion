<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mantenimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id_mantenimientos');
            $table->string('motivo_ingreso');
            $table->string('detalle_articulo_mantenimiento');
            $table->unsignedInteger('empleado_asignado');
            $table->foreign('empleado_asignado')
                    ->references("id_empleados")
                    ->on("empleados")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            $table->timestamps();
            $table->string('estado_mantenimiento');
            $table->unsignedInteger('cliente_mantenimiento');
            $table->foreign('cliente_mantenimiento')
                    ->references("id_cliente")
                    ->on("clientes")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
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
