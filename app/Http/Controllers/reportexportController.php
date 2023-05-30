<?php

namespace App\Http\Controllers;

use App\Exports\ExportCS4;
use Illuminate\Http\Request;
use App\Models\GrupoSCEstudiante;
use App\Models\Estudiantes;
use App\Models\Estudiantecomunitarios;
use Excel;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Fxcel;
use App\Exports\UsersExport;
use App\Models\GrupoSC;

class reportexportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        // $estudiante_c = Estudiantes::all();

        // $estudicomunitario = GrupoSCEstudiante::select('grupo_s_c_estudiantes.estudiantes_id','estudiantecomunitarios.semestre')
        // ->join('Estudiantecomunitarios', 'Estudiantecomunitarios.estudiantes_id', '=', 'grupo_s_c_estudiantes.estudiantes_id')->get();

        // $data =[

        //     'estudiante_c' => $estudiante_c,
        //     'estudicomunitario' => $estudicomunitario,
        // ];

        // dd($data);
        // dd($datosreport);

        $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.status','grupo_s_c_s.status','grupo_s_c_s.estado','grupo_s_c_s.direccion_comunidad','grupo_s_c_s.alianzas_estrategicas',
                'grupo_s_c_s.ferias','grupo_s_c_s.reunion_misiones','grupo_s_c_s.total_studiante','grupo_s_c_s.campanas','grupo_s_c_s.talleres','grupo_s_c_s.jornadas','grupo_s_c_s.charlas',
                'grupo_s_c_s.foros','grupo_s_c_s.cant_beneficiados','grupo_s_c_s.area_accion_project','grupo_s_c_s.vinc_project_planes_prog','grupo_s_c_s.telefono_tutor_comunitario',
                'grupo_s_c_s.cedula_tutor_comunitario','grupo_s_c_s.nombre_tutor_comunitario','grupo_s_c_s.nombre_comunidad','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor'
                ,'profesores.cedula','profesores.nombre','profesores.email',
                 'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
                 'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
                 ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
                 ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
                 ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)
                 ->whereYear('grupo_s_c_s.created_at', 2023)
                 ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
                 ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();
// return response($data);
       return view('reporte.index');
    }


    public function  exportar_csc(Request $request){

        $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
        'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
        'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
        'grupo_s_c_s.created_at as fecha_acta_grupo')
        ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
        ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
        ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
        ->where('estudiantecomunitarios.fase',[2,3])
        ->whereYear('grupo_s_c_s.created_at',2023)
        ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
        ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();

        $da = GrupoSC::where('nota_evaluada_one',true)
        ->whereYear('grupo_s_c_s.created_at',2023)
        ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
        ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();
        foreach ($da as $key => $value_grupo) {
            $estudent[$key] = GrupoSCEstudiante::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
            'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
            'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2')->where('grupo_s_c_estudiantes.grupo_s_c_id',$value_grupo->id)
            ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'grupo_s_c_estudiantes.estudiantes_id')
            ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
            ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')->get();
        }
        // dd($estudent);
        // echo print_r(json_decode(response($estudent)) $estudent);
    //    return response($estudent[0]);
        $dat = Estudiantes::all();

        return Excel::download(new UsersExport($request->periodo,$request->fase) ,'Data De Los Estudiantes Evaluados Periodo '.$request->periodo.'.xlsx');



    }

    public function export_cs4(Request $request)
    {
        // dd($request);
        return Excel::download(new ExportCS4($request->periodo) ,'Planilla S.C. 4 Cuadro de Proyectos '.$request->periodo.'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
