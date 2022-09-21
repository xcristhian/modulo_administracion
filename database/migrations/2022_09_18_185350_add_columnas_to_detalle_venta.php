<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnasToDetalleVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->unsignedInteger('cantidad_producto');
            $table->unsignedInteger('precio_producto');
            $table->unsignedInteger('total_compra');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->dropColumn('cantidad_producto');
            $table->dropColumn('precio_producto');
            $table->dropColumn('total_compra');
        });
    }
}
