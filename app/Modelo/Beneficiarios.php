<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class Beneficiarios extends Model
{
    protected $table = 'beneficiarios';

    protected $fillable =
    [
        'rut_bene',
        'nombres_bene',
        'apellidos_bene',
        'domi_bene',
        'ciu_bene',
        'pais_bene',
        'participacion'
    ];

    public function DeclaJuri()
    {
        return $this->belongsToMany('App\Modelo\DeclaJuridicos', 'beneficio_juridico', 'beneficiarios_id');
    }
}
