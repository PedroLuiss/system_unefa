<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente_file extends Model
{
    use HasFactory;
    protected $fillable = [
        'expedientes_id',
        'estudiantes_id',
        'code',
        'name',
        'description',
        'name_file',
        'file_url',
        'path'
    ];
}
