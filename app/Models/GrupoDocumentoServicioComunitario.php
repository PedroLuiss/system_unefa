<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoDocumentoServicioComunitario extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento_servicio_comunitario_id',
        'grupo_s_c_id',
        'checket'
    ];
}
