<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantecomunitarios extends Model
{
    use HasFactory;

    protected $table='estudiantecomunitarios';
    protected $fillable = [
        'estudiantes_id',
        'semestre',
        'seccion',
        'turno',
        'fase',
        'all_fase',
        'tiene_grupo',
        'nota_one',
        'nota_twe',
        'observacion_fase_one',
        'observacion_fase_twe',
    ];

}
