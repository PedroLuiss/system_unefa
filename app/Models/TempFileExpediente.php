<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempFileExpediente extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_log',
        'code',
        'name',
        'description',
        'name_file',
        'file_url',
    ];
}
