<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSC extends Model
{
    use HasFactory;
    protected $fillable = [
        'profesore_id',
        'estado',
        'total_studiante',
        'status',
        'nombre_proyecto',
        'archivo_subido',
    ];
}
