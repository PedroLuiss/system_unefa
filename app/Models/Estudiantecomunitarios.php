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

    ];
}
