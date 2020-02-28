<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class JuriForm extends Model
{
    protected $table = 'juri_form';

    protected $fillable =
    [
        'id',
        'decla_juridicos_id',
        'formularios_id'
    ];

    public function formulario()
    {
        return $this->belongsTo('App\Modelo\Formularios','formularios_id', 'id');
    }

    public function declaJuridicos()
    {
        return $this->belongsTo('App\Modelo\DeclaJuridicos', 'decla_juridicos_id', 'id');
    }
}
