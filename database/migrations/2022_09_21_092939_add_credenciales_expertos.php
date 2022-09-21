<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCredencialesExpertos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            //
        });
        DB::table("usuarios")
            ->insert([
                "nombre" => "admin",
                "password" => "$2y$10$8f07gF4Xvhmk3G.TMd2.Mea0eESyz9wE0EU6JP9OfqVH3geffFQwK",
            ]);
           
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
