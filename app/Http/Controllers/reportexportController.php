<?php

namespace App\Http\Controllers;

use App\Exports\ExportCS4;
use Illuminate\Http\Request;
use App\Models\GrupoSCEstudiante;
use App\Models\Estudiantes;
use App\Models\Estudiantecomunitarios;
use Barryvdh\DomPDF\Facade\Pdf;
use Excel;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Fxcel;
use App\Exports\UsersExport;
use App\Models\GrupoSC;
use Illuminate\Validation\Rule;

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

        // $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
        // 'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
        // 'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
        // 'grupo_s_c_s.created_at as fecha_acta_grupo')
        // ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        // ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
        // ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
        // ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
        // ->where('estudiantecomunitarios.fase',[2,3])
        // ->whereYear('grupo_s_c_s.created_at',2023)
        // ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
        // ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();

        // $da = GrupoSC::where('nota_evaluada_one',true)
        // ->whereYear('grupo_s_c_s.created_at',2023)
        // ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
        // ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();
        // foreach ($da as $key => $value_grupo) {
        //     $estudent[$key] = GrupoSCEstudiante::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
        //     'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
        //     'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2')->where('grupo_s_c_estudiantes.grupo_s_c_id',$value_grupo->id)
        //     ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'grupo_s_c_estudiantes.estudiantes_id')
        //     ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
        //     ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')->get();
        // }
        // dd($estudent);
        // echo print_r(json_decode(response($estudent)) $estudent);
    //    return response($request);

        return Excel::download(new UsersExport($request->periodo,$request->fase) ,'Data De Los Estudiantes Evaluados Periodo '.$request->periodo.'.xlsx');



    }

    public function export_cs4(Request $request)
    {
        // dd($request);
        return Excel::download(new ExportCS4($request->periodo) ,'Planilla S.C. 4 Cuadro de Proyectos '.$request->periodo.'.xlsx');
    }


    public function export_culminacion(Request $request)
    {
        $request->validate([

            'cedula' => [
                'required',
            ]


        ],[],[
            'cedula' => 'cédula',
        ]);

        $data_1 = [];
        $data_2 = [];
        $data_3 = [];

        $estud = Estudiantes::where('cedula',"V-".$request->cedula)->get();
        if (count($estud)) {
            $estud_comu = Estudiantecomunitarios::where('estudiantes_id',$estud[0]->id)->where('fase',3)->get();
            if (count($estud_comu)) {
                $data_1 = $estud[0];
                $data_1 = $estud[0];
                $estud_comu_ge = GrupoSCEstudiante::where('estudiantes_id',$estud[0]->id)->get();
                if (count($estud_comu_ge)) {

                    $grup = GrupoSC::where('id',$estud_comu_ge[0]->grupo_s_c_id)->get();
                    $data_2 = $grup[0];

                }else{
                    return redirect()->route('reporte.index')->with('mensaje', 'Error, Estudiante No ha culminado Servicio comunitario, y no tiene grupo asignado');
                }
                // return response( $estud);
            }else{
                return redirect()->route('reporte.index')->with('mensaje', 'Error, Estudiante No ha culminado Servicio comunitario');
            }
        }else{
            return redirect()->route('reporte.index')->with('mensaje', 'Error, Estudiante No Existe');
        }
        $daraResp = [
            'estudiante' => $data_1,
            'grupo' => $data_2,
            'carrera' => $this->text_viwes_carrera($estud[0]->carreras_id),
            'year' =>  date("Y"),
        ];
        // return response( $daraResp['estudiante']);
        return Pdf::loadView('pdf.report.culminacion',compact('daraResp','data_1'))->stream("Carta-de-culminacion-".$data_1->cedula.".pdf");

    }

    public function export_const_tutaria($id_projec)
    {


        $data_1 = [];
        $data_2 = [];
        $data_3 = [];

        $estud = Estudiantes::where('cedula',"V-28604274")->get();
        if (count($estud)) {
            $estud_comu = Estudiantecomunitarios::where('estudiantes_id',$estud[0]->id)->where('fase',3)->get();
            if (count($estud_comu)) {
                $data_1 = $estud[0];
                $data_1 = $estud[0];
                $estud_comu_ge = GrupoSCEstudiante::where('estudiantes_id',$estud[0]->id)->get();
                if (count($estud_comu_ge)) {

                    $grup = GrupoSC::where('id',$estud_comu_ge[0]->grupo_s_c_id)->get();
                    $data_2 = $grup[0];

                }else{
                    return redirect()->route('reporte.index')->with('mensaje', 'Error, Estudiante No ha culminado Servicio comunitario, y no tiene grupo asignado');
                }
                // return response( $estud);
            }else{
                return redirect()->route('reporte.index')->with('mensaje', 'Error, Estudiante No ha culminado Servicio comunitario');
            }
        }else{
            return redirect()->route('reporte.index')->with('mensaje', 'Error, Estudiante No Existe');
        }
        $daraResp = [
            'estudiante' => $data_1,
            'grupo' => $data_2,
            'carrera' => $this->text_viwes_carrera($estud[0]->carreras_id),
            'year' =>  date("Y"),
        ];
        // return response( $daraResp['estudiante']);
        return Pdf::loadView('pdf.tutor.constancia-tutoria',compact('daraResp','data_1'))->stream("CONSTANCIA DE TUTORÍA DE SERVICIO COMUNITARIO.pdf");

    }



    function text_viwes_carrera($id){
        $text = "";
        if ($id == 1 && $id == 7) {
            $text = "INGENIERO (A) SISTEMAS";
        }else if ($id == 2 && $id == 8) {
            $text = "INGENIERO (A) ELÉCTRICA";
        }else if ($id == 3) {
            $text = "INGENIERO (A) AGRONOMICA";
        }else if ($id == 4 && $id == 9) {
            $text = "LICENCIADO (A) EN ADMINISTRACIÓN Y GESTIÓN  MUNICIPAL";
        }else if ($id == 5) {
            $text = "TSU ENFERMERIA";
        }else if ($id == 6) {
            $text = "LICENCIADO (A) EN ECONOMÍA SOCIAL";
        }
        return $text;
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
