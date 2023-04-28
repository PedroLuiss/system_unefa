<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoServicioComunitario extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento',
        'checket',
        'fase',
    ];
}
