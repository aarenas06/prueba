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
        'hora',
    ];
    protected $dates = ['fecha_cita'];
}