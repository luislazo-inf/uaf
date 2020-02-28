<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstructuraJuridicas extends Model
{
    protected $table = 'estructuras_juridicas';

    protected $fillable =
    [
        'id', 'rut_numero_gerencia', 'nombre', 'cargo', 'decla_juridico_id'
    ];

    public function declaJuridicos()
    {
        return $this->belongsTo('App\Modelo\DeclaJuridicos', 'decla_juridico_id', ' id');
    }
}
