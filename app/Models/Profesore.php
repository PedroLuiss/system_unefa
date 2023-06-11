<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesore extends Model
{
    use HasFactory;
    protected $table='profesores';
    protected $fillable = [
        'cedula',
        'nombre',
        'email',
        'primer_apellido',
        'segundo_apellido',
        'especialidad',
        'tipo_perfil',
        'tipo_perfil_unidad_admi',
        'tipo_perfil_unidad_doce',
    ];
}
