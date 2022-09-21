<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Serie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie', function (Blueprint $table) {
            $table->increments('id_serie');
            $table->unsignedInteger('id_producto');
            $table->foreign('id_producto')
                    ->references("id_producto")
                    ->on("producto")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            $table->string('numero_serie');
            $table->unsignedInteger('bodega');
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
