<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class JuridicoNatural extends Model
{
    protected $table = 'juridico_natural';

    protected $fillable =
    [
        'decla_naturales_id',
        'decla_juridicos_id'
    ];

    public function declaracionesNaturales()
    {
        return $this->belongsTo('App\Modelo\DeclaNaturales', 'decla_naturales_id', 'id');
    }

    public function declaracionJuridico()
    {
        return $this->belongsTo('App\Modelo\DeclaJuridicos', 'decla_juridicos_id', 'id');
    }

}
