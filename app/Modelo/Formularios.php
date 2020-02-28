<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formularios extends Model
{
    protected $table = 'formularios';

    protected $fillable =
    [
        'id', 'numero','lugar_firma','fecha_decla','tipo_formulario_id'
    ];

    public function tipoFormulario()
    {
        return $this->BelongsTo('App\Modelo\TiposFormularios', 'id', 'tipo_formulario_id');
    }

    public function juriFormu()
    {
        return $this->hasOne('App\Modelo\JuriForm','formularios_id','id' );
    }
}
