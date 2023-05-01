<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSCEstudiante extends Model
{
    use HasFactory;
    protected $fillable = [
        'grupo_s_c_id',
        'estudiantes_id',
        'observaciones',
        'observaciones_2',
        'nota_eno',
        'nota_two',
        'status',
        'reprobo'
    ];
}
