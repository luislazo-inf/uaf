<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClavesForaneasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->integer('tipo_formulario_id')->unsigned()->after('fecha_decla');
            $table->foreign('tipo_formulario_id')->references('id')->on('tipos_formularios');
        });

        Schema::table('juri_form', function (Blueprint $table) {
            $table->integer('decla_juridicos_id')->unsigned()->after('id');
            $table->foreign('decla_juridicos_id')->references('id')->on('decla_juridicos');
            $table->integer('formularios_id')->unsigned()->after('decla_juridicos_id');
            $table->foreign('formularios_id')->references('id')->on('formularios');
        });

        Schema::table('juridico_natural', function (Blueprint $table) {
            $table->integer('decla_naturales_id')->unsigned()->after('id');
            $table->foreign('decla_naturales_id')->references('id')->on('decla_naturales');
            $table->integer('decla_juridicos_id')->unsigned()->after('decla_naturales_id');
            $table->foreign('decla_juridicos_id')->references('id')->on('decla_juridicos');
        });

        Schema::table('beneficio_juridico', function (Blueprint $table) {
            $table->integer('beneficiarios_id')->unsigned()->after('id');
            $table->foreign('beneficiarios_id')->references('id')->on('beneficiarios');
            $table->integer('decla_juridicos_id')->unsigned()->after('beneficiarios_id');
            $table->foreign('decla_juridicos_id')->references('id')->on('decla_juridicos');
        });

        Schema::table('estructuras_juridicas', function(Blueprint $table){
            $table->integer('decla_juridico_id')->unsigned()->after('id');
            $table->foreign('decla_juridico_id')->references('id')->on('decla_juridicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claves_foraneas');
    }
}
