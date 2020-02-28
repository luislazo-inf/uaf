<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class DeclaJuridicos extends Model
{
    protected $table = 'decla_juridicos';

    protected $fillable =
    [
        'rut',
        'razon_social',
        'domicilio',
        'ciudad',
        'pais_const',
        'telefono',
        'rep_rut',
        'rep_nombre',
        'tipo_entidad'
    ];

    public function juriForm()
    {
        return $this->hasMany('App\Modelo\JuriForm', 'decla_juridicos_id', 'id');
    }

    public function juridicosNaturales(Type $var = null)
    {
        return $this->hasMany('App\Modelo\JuridicoNatural', 'decla_juridicos_id', 'id');
    }

    public function estructuraJuridica(){
        return $this->hasMany('App\Modelo\EstructuraJuridicas', 'decla_juridico_id', 'id');
    }

    public function beneficiario(){
        return $this->belongsToMany('App\Modelo\Beneficiarios', 'beneficio_juridico', 'decla_juridicos_id');
    }

    public function beneJuri()
    {
        return $this->hasMany('App\Modelo\BeneficioJuridico', 'decla_juridicos_id', 'id');
    }

    public function DeclaNaturales()
    {
        return $this->belongsToMany('App\Modelo\DeclaNaturales', 'juridico_natural', 'decla_juridicos_id');
    }
}
