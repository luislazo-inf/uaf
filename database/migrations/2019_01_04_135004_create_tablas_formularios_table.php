<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablasFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

         //crea tabla tipo formularios
         Schema::create('tipos_formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreT',45);
            $table->timestamps();
        });

        //crear tabla formularios
        Schema::create('formularios', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger('numero_form');
            $table->string('lugar_firma');
            $table->date('fecha_decla');
            $table->timestamps();
        });

        //crear tabla juri form
        Schema::create('juri_form', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        //crear tabla decla juridicos
        Schema::create('decla_juridicos', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('rut_declaJ',12);
            $table->string('razon_social',60);
            $table->string('domi_declaJ',60);
            $table->string('ciu_declaJ',30);
            $table->string('pais_const',40);
            $table->string('telefono',20);
            $table->string('rep_rut',12);
            $table->string('rep_nombre',45);
            $table->string('tipo_entidad',45);
            $table->timestamps();
        });

        //crear tabla juridico natural
        Schema::create('juridico_natural', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        //crear tabla decla naturales
        Schema::create('decla_naturales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut_declaN',12);
            $table->string('nombres_declaN',60);
            $table->string('apel_pat_declaN',30);
            $table->string('apel_mat_declaN',30);
            $table->string('origen',45);
            $table->string('relacion_juridica',60);
            $table->timestamps();
        });

        //crear tabla beneficio juridico
        Schema::create('beneficio_juridico', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        //crear tabla beneficiarios
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id',11);
            $table->string('rut_bene',12);
            $table->string('nombres_bene');
            $table->string('apellidos_bene');
            $table->string('domi_bene',45);
            $table->string('ciu_bene',45);
            $table->string('pais_bene',45);
            $table->double('participacion');
            $table->timestamps();
        });

        Schema::create('estructuras_juridicas', function(Blueprint $table){
            $table->increments('id', 11);
            $table->string('rut_numero_gerencia',12);
            $table->string('cargo',45);
            $table->string('nombre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

    Schema::dropIfExists('formularios');
    Schema::dropIfExists('tipos_formularios');
    Schema::dropIfExists('juri_form');
    Schema::dropIfExists('decla_juridicos');
    Schema::dropIfExists('juridico_natural');
    Schema::dropIfExists('decla_naturales');
    Schema::dropIfExists('beneficio_juridico');
    Schema::dropIfExists('beneficiarios');
    Schema::dropIfExists('estructuras_juridicas');

    }
}
