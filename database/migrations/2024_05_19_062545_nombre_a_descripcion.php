<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NombreADescripcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Caso', function (Blueprint $table) {
            $table->renameColumn('nombre', 'descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Caso', function (Blueprint $table) {
            $table->renameColumn('descripcion', 'nombre');
        });
    }
}
