<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaMantenedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_mantenedor', function (Blueprint $table) {
            $table->string('rut_bene');
            $table->string('nombres_bene');
            $table->string('apellidos_bene');
            $table->string('domi_bene');
            $table->string('ciu_bene');
            $table->string('pais_bene');
            $table->string('participacion');
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
        Schema::dropIfExists('tabla_mantenedor');
    }
}
