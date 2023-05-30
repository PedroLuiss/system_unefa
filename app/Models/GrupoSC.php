<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSC extends Model
{
    use HasFactory;
    protected $fillable = [
        'profesore_id',
        'carrera_id',
        'estado',
        'total_studiante',
        'status',
        'nombre_proyecto',
        'nombre_comunidad',
        'nombre_tutor_comunitario',
        'cedula_tutor_comunitario',
        'telefono_tutor_comunitario',
        'cant_beneficiados',
        'vinc_project_planes_prog',
        'area_accion_project',
        'direccion_comunidad',
        'archivo_subido',
        'nota_evaluada_one',
        'nota_evaluada_twe',
        'exportar_exel',
        'foros',
        'charlas',
        'jornadas',
        'talleres',
        'campanas',
        'reunion_misiones',
        'ferias',
        'alianzas_estrategicas',


    ];


    public function estudiantes_grupo()
    {
        return $this->belongsTo(GrupoSCEstudiante::class,'grupo_s_c_id');
    }
}
