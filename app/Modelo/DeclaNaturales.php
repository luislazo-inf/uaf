<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class DeclaNaturales extends Model
{
    protected $table = 'decla_naturales';

    protected $fillable =
    [
        'rut',
        'nombres',
        'apel_pat',
        'apel_mat',
        'origen',
        'relacion_juridica'
    ];

    public function JuridicoNatural()
    {
        return $this->hasMany('App\Modelo\JuridicoNatural', 'id', 'decla_naturales_id');
    }

    public function DeclaJuridico()
    {
        return $this->belongsToMany('App\Modelo\DeclaJuridico', 'juridico_natural', 'decla_naturales_id');
    }
}
