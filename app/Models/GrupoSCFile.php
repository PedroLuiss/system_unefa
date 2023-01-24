<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSCFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'grupo_s_c_id',
        'nombre',
        'url',
    ];
}
