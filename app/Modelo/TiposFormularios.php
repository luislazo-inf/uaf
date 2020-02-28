<?php

namespace App\Modelo;

use Illuminate\Database\Eloquent\Model;

class TiposFormularios extends Model
{
    protected $table = 'tipos_formularios';

    protected $fillable = ['id','nombre'];

    public function formularios()
    {
        return $this->hasMany('App\Modelo\Formularios', 'id', 'tipo_formulario_id');
    }
}
