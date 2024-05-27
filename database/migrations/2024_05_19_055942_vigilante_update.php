<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VigilanteUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Vigilante', function (Blueprint $table) {
            $table->string('primerApellido')->nullable();
            $table->string('segundoApellido')->nullable();
            $table->string('telefono')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Vigilante', function (Blueprint $table) {
            $table->dropColumn(['primerApellido', 'segundoApellido', 'telefono']);
        });
    }
}
