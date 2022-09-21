<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id_compras');
            $table->unsignedInteger('id_proveedor');
            $table->foreign("id_proveedor")
                    ->references("id_proveedor")
                    ->on("proveedors")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            $table->string('n_factura_compra');
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
