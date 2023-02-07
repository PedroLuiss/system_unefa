<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Estudiantes;
use Illuminate\Contracts\View\View;;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromView, ShouldAutoSize
{
    public $fase;

    function __construct(String $fase) {
        $this->fase= $fase;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        if($this->fase == 1){
            $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
            'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
            'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
            'grupo_s_c_s.created_at as fecha_acta_grupo')
            ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
            ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
            ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
            ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
            ->where('estudiantecomunitarios.fase',2)->get();

            return view('reporte.exportexcel',[
                'data' => $data,
                'fase'=>$this->fase

            ]);

        }else{
            $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
            'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
            'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
            'grupo_s_c_s.created_at as fecha_acta_grupo')
            ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
            ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
            ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
            ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
            ->where('estudiantecomunitarios.fase',3)->get();

            return view('reporte.exportexcel',[
                'data' => $data,
                'fase'=>$this->fase

            ]);
        }

    }
}
