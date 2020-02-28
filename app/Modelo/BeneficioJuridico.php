<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class BeneficioJuridico extends Model
{
    protected $table = 'beneficio_juridico';

    protected $fillable =
    [
        'beneficiarios_id',
        'decla_juridicos_id'
    ];

    public function declaracionesJuridicos()
    {
        return $this->belongsTo('App\Modelo\DeclaJuridicos', 'id', 'decla_juridicos_id');
    }

    public function beneficiario()
    {
        return $this->belongsTo('App\Modelo\Beneficiarios', 'id', 'decla_juridicos_id');
    }

}
