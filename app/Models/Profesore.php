<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesore extends Model
{
    use HasFactory;
    protected $fillable = [
        'cedula',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'especialidad'
    ];
}
