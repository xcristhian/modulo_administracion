<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnasToVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->string('subtotal');
            $table->string('iva');
            $table->string('total');
            $table->string('cantidad_pagada');
            $table->string('total_debido');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->string('subtotal');
            $table->string('iva');
            $table->string('total');
            $table->string('cantidad_pagada');
            $table->string('total_debido');
        });
    }
}
