<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Estudiantes;
use App\Models\GrupoSC;
use App\Models\GrupoSCEstudiante;
use Illuminate\Contracts\View\View;;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromView, ShouldAutoSize
{
    public $periodo;
    public $fase;

    function __construct(String $periodo,String $fase) {
        $this->periodo= $periodo;
        $this->fase= $fase;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $array_request = explode('-',$this->periodo);
        if ($array_request[0] == 1) {

            $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
            'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
            'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
            'grupo_s_c_s.created_at as fecha_acta_grupo')
            ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
            ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
            ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
            ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
            ->where([
                ['estudiantecomunitarios.fase', '=', 1],
                ['estudiantecomunitarios.fase', '=', 2],
                ['estudiantecomunitarios.fase', '=', 3],
                ['nota_one', '>=', 0],
                ['nota_twe', '>=', 0],
            ])
            ->whereYear('grupo_s_c_s.created_at', $array_request[1])
            ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
            ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();

            $da = GrupoSC::where('nota_evaluada_one',true)
            ->whereYear('grupo_s_c_s.created_at',$array_request[1])
            ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
            ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();
            foreach ($da as $key => $value_grupo) {
                if ($this->fase == 1) {
                    $estudent[$key] = GrupoSCEstudiante::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
                    'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
                    'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
                    'grupo_s_c_s.created_at as fecha_acta_grupo')->where('grupo_s_c_estudiantes.grupo_s_c_id',$value_grupo->id)
                    ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
                    ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                    ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                    ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')->where('estudiantecomunitarios.fase',2)->get();
                }else if ($this->fase == 2){
                    $estudent[$key] = GrupoSCEstudiante::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
                    'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
                    'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
                    'grupo_s_c_s.created_at as fecha_acta_grupo')->where('grupo_s_c_estudiantes.grupo_s_c_id',$value_grupo->id)
                    ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
                    ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                    ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                    ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')->where('estudiantecomunitarios.fase',3)->get();
                }else{
                    $estudent[$key] = GrupoSCEstudiante::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
                    'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
                    'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
                    'grupo_s_c_s.created_at as fecha_acta_grupo')->where('grupo_s_c_estudiantes.grupo_s_c_id',$value_grupo->id)
                    ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
                    ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                    ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                    ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')->get();
                }

            }
            // dd($estudent);
            return view('reporte.exportexcel',[
                'data' => $estudent,
                'cant_data'=>count($estudent)

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
            ->where('estudiantecomunitarios.fase',2)
            ->whereYear('grupo_s_c_s.created_at', $array_request[1])
            ->whereMonth('grupo_s_c_s.created_at','>=' , '06')
            ->whereMonth('grupo_s_c_s.created_at','<=', '12')->get();

            return view('reporte.exportexcel',[
                'data' => $data,

            ]);
        }
        // if($this->fase == 1){


        // }else if ($this->fase == 2) {
        //     $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
        //     'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
        //     'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
        //     'grupo_s_c_s.created_at as fecha_acta_grupo')
        //     ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        //     ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
        //     ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
        //     ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
        //     ->where('estudiantecomunitarios.fase',3)->get();

        //     return view('reporte.exportexcel',[
        //         'data' => $data,
        //         'fase'=>$this->fase

        //     ]);
        // }else{

        // }

    }
}
