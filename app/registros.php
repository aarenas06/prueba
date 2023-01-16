<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registros extends Model
{
    protected $fillable = [
        'cc',
        'nombre',
        'apellido',
        'nombreMas',
        'fecha_cita',
    ];
    protected $dates = ['fecha_cita'];
}