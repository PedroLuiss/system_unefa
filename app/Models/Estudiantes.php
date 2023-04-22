<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table='estudiantes';
    protected $fillable = [
        'cedula',
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'carreras_id',
        'fe_ingreso',
        'inicio_programa',
        'sexo',
        'sanguineo',
        'edo_civil',
        'condicion',
        'nucleo',
        'etnia',
        'discapacidad',
        'pais',
        'fe_nac',
        'lugar_nac',
        'ciudad',
        'direccion',
        'tel_hab',
        'tel_cel',
        'email',
        'string_sevicio_comunitario',
        'recorrido',
        'turno'
    ];
}
