<?php

namespace App\Http\Controllers;

use App\Mail\EnvioNotasEstundetMail;
use App\Models\carrera;
use App\Models\DocumentoServicioComunitario;
use App\Models\Estudiantecomunitarios;
use App\Models\Estudiantes;
use App\Models\GrupoDocumentoServicioComunitario;
use App\Models\GrupoSC;
use App\Models\GrupoSCEstudiante;
use App\Models\GrupoSCFile;
use App\Models\Profesore;
use App\Models\TempGrupoSCEstudiante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServicioComunitarioController extends Controller
{
    public function home_comunitario(){
        $c=[];
        $carreras = carrera::all();
        foreach($carreras as $val){
            $studen = Estudiantes::where('carreras_id',$val->id)->count();
            $c[$val->id]=$studen;
        }
        return  view('servicio-comunitario.home_comunitario',compact('carreras','c'));
    }
    public function list_faseone()
    {
        $data=[];
        $fecha_actual = Carbon::now();
        // $fecha_actual = Carbon::parse('2023-05-25');
        $ano_actual = $fecha_actual->format('Y');
        $mes_actual = $fecha_actual->format('m');
        // if (intval($mes_actual) <= 06) {
        //     $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
        //     'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
        //     'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
        //     ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
        //     ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
        //     ->whereYear('grupo_s_c_s.created_at', $ano_actual)
        //     ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
        //     ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();
        // }else{
        //     $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
        //     'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
        //     'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
        //     ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
        //     ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
        //     ->whereYear('grupo_s_c_s.created_at', $ano_actual)
        //     ->whereMonth('grupo_s_c_s.created_at','>=' , '06')
        //     ->whereMonth('grupo_s_c_s.created_at','<=', '12')->get();
        // }ç
        $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.code','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
            'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
            'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
            ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
            ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')->where('grupo_s_c_s.status',1)->get();

      return  view('servicio-comunitario.list-faseone',compact('data'));
    }



    public function faseone_create()
    {
        $estudiantes=Estudiantecomunitarios::select('estudiantes.id','estudiantes.cedula',
         'estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','estudiantecomunitarios.turno',
         'estudiantecomunitarios.seccion','estudiantecomunitarios.semestre')
         ->join('estudiantes', 'estudiantes.id','=', 'estudiantecomunitarios.estudiantes_id')->where('estudiantecomunitarios.fase','=',1)->where('estudiantecomunitarios.tiene_grupo',false)->get();
        //  dd($estudiantes);
        // $data_sen_email =[];
        // $data_sen_email['nombre_estudiante'] = "TALLER DE SERVICIO COMUNITARIO";
        // $this->send_email_notas_estudent($data_sen_email);
         $profesor=Profesore::all();
         $carrera=carrera::all();
     return  view('servicio-comunitario.create-faseone',compact('estudiantes','profesor','carrera'));
    }

    public function temp_store_student(Request $request)
    {
    //    return response($request);ç
        $verif = GrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->where('reprobo',false)->get();
        if (count($verif)) {
            return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
        }else{
            $verif = TempGrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->get();
            if (count($verif)) {
                return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
            }else{
               if (count(TempGrupoSCEstudiante::all())<6) {
                TempGrupoSCEstudiante::create([
                    'estudiantes_id'=>$request->id_estudiante,
                    'user_id'=>1,
                ]);
                 return response()->json(['message' => "Estudiante Agregado Correctamente.",'status'=>200],201);
               }else{
                    return response()->json(['message' => "Error, Los grupos deber ser de 6 estudiantes.",'status'=>419],201);
               }

            }
        }

    }

    public function store_student(Request $request)
    {
    //    return response($request);
        $verif = GrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->where('grupo_s_c_id',$request->id_grupo)->get();
        if (count($verif)) {
            return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
        }else{
            $verif = GrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->where('reprobo',false)->get();
            if (count($verif)) {
                return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
            }else{
                if (count(GrupoSCEstudiante::where('grupo_s_c_id',$request->id_grupo)->get())<6) {
                    $verifi_est = Estudiantecomunitarios::where('estudiantes_id',$request->id_estudiante)->first();
                    GrupoSCEstudiante::create([
                        'estudiantes_id'=>$request->id_estudiante,
                        'grupo_s_c_id'=>$request->id_grupo,
                        'status'=>1,
                        'nota_eno'=>$verifi_est->nota_one
                    ]);
                    Estudiantecomunitarios::where('estudiantes_id',$request->id_estudiante)->update([
                        'tiene_grupo'=>true
                    ]);
                     return response()->json(['message' => "Estudiante Agregado Correctamente.",'status'=>200],201);
                }else{
                    return response()->json(['message' => "Error, Los grupos deber ser de 6 estudiantes.",'status'=>419],201);
                }

            }
        }

    }
    public function store_faseone(Request $request)
    {
    //    return response($request);

       $temp_student = TempGrupoSCEstudiante::all();

       $resp_grup = GrupoSC::create([
        'profesore_id'=>$request->profesor,
        'nombre_comunidad'=>$request->nombre_comunidad,
        'direccion_comunidad'=>$request->direccion_comunidad,
        'nombre_tutor_comunitario'=>$request->nomb_tutor_comunitario,
        'cedula_tutor_comunitario'=>$request->cedula_tutor_comunitario,
        'telefono_tutor_comunitario'=>$request->telefono_tutor_comunitario,
        'vinc_project_planes_prog'=>$request->vinculacion_project,
        'area_accion_project'=>$request->select_area_accion,
        'cant_beneficiados'=>$request->cant_beneficiados,
        'foros'=>$request->foro_check,
        'charlas'=>$request->charlas_check,
        'jornadas'=>$request->jornadas_check,
        'talleres'=>$request->talleres_check,
        'campanas'=>$request->campana_check,
        'reunion_misiones'=>$request->reunion_misiones_check,
        'ferias'=>$request->ferias_check,
        'alianzas_estrategicas'=>$request->alianzas_estrategicas_check,
        'carrera_id'=>$request->carrrera_id,
        'nombre_proyecto'=>$request->nombre_proyecto,
        'estado'=>0,
        'total_studiante'=>count($temp_student),
        'status'=>1,
       ]);
       if ($resp_grup == null) {
            return response()->json(['message' => 'Error al guardar','status' => 419,], 201);
            die;
       }
       GrupoSC::change_code($resp_grup->id);
       foreach ($temp_student as $key => $value) {
           GrupoSCEstudiante::create([
                'grupo_s_c_id'=>$resp_grup->id,
                'estudiantes_id'=>$value->estudiantes_id,
                'status'=>1,
           ]);

           Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->update([
                'tiene_grupo'=>true
           ]);

       }

       //tomo los documentos y agregarlo a grupo para validar los documentos.
       $document_service = DocumentoServicioComunitario::all();
       foreach ($document_service as $key => $value) {
            GrupoDocumentoServicioComunitario::create([
                'documento_servicio_comunitario_id'=>$value->id,
                'grupo_s_c_id'=>$resp_grup->id,
            ]);
       }

       TempGrupoSCEstudiante::where('user_id',1)->delete();
        return response()->json(['message' => 'Grupo Generado Correctamente','status' => 200,], 201);
    }
    public function update_faseone(Request $request)
    {
    //    return response($request);

       $temp_student = GrupoSCEstudiante::where('grupo_s_c_id',$request->id_grupo)->get();

        GrupoSC::where('id',$request->id_grupo)->update([
            'profesore_id'=>$request->profesor,
            'nombre_proyecto'=>$request->nombre_proyecto,
            'estado'=>0,
            'total_studiante'=>count($temp_student),
            'status'=>1,
            'nombre_comunidad'=>$request->nombre_comunidad,
            'direccion_comunidad'=>$request->direccion_comunidad,
            'nombre_tutor_comunitario'=>$request->nomb_tutor_comunitario,
            'cedula_tutor_comunitario'=>$request->cedula_tutor_comunitario,
            'telefono_tutor_comunitario'=>$request->telefono_tutor_comunitario,
            'vinc_project_planes_prog'=>$request->vinculacion_project,
            'area_accion_project'=>$request->select_area_accion,
            'cant_beneficiados'=>$request->cant_beneficiados,
            'foros'=>$request->foro_check,
            'charlas'=>$request->charlas_check,
            'jornadas'=>$request->jornadas_check,
            'talleres'=>$request->talleres_check,
            'campanas'=>$request->campana_check,
            'reunion_misiones'=>$request->reunion_misiones_check,
            'ferias'=>$request->ferias_check,
            'alianzas_estrategicas'=>$request->alianzas_estrategicas_check,
            'carrera_id'=>$request->carrrera_id,
        ]);


        return response()->json(['message' => 'Grupo Actualizado Correctamente','status' => 200,], 201);
    }
    public function List_student_temp()
    {
        $data = TempGrupoSCEstudiante::select('temp_grupo_s_c_estudiantes.id','carreras.name as nombre_carrera','carreras.code as codigo_carrera',
        'estudiantes.tel_hab','estudiantes.tel_cel','estudiantes.cedula','estudiantes.email','estudiantes.segundo_apellido','estudiantes.primer_apellido',
        'estudiantes.nombres','estudiantes.id as estudiantes_id')
        ->join('estudiantes', 'estudiantes.id', '=', 'temp_grupo_s_c_estudiantes.estudiantes_id')
        ->join('carreras', 'carreras.id', '=', 'estudiantes.carreras_id')->get();
        return response($data);
    }

    public function List_student($id_grupo)
    {
        $data = GrupoSCEstudiante::select('grupo_s_c_estudiantes.id','carreras.name as nombre_carrera','carreras.code as codigo_carrera',
        'estudiantes.tel_hab','estudiantes.tel_cel','estudiantes.cedula','estudiantes.email','estudiantes.segundo_apellido','estudiantes.primer_apellido',
        'estudiantes.nombres','estudiantes.id as estudiantes_id')
        ->join('estudiantes', 'estudiantes.id', '=', 'grupo_s_c_estudiantes.estudiantes_id')
        ->join('carreras', 'carreras.id', '=', 'estudiantes.carreras_id')
        ->where('grupo_s_c_estudiantes.grupo_s_c_id', $id_grupo)->get();
        return response($data);
    }

    public function delete_temp_student_list($id)
    {
        if ($id=="") {
            return response()->json(['message' => 'Error al eliminar un estudiante','status' => 200,], 201);
        }else{

            TempGrupoSCEstudiante::where('estudiantes_id',$id)->delete();
             return response()->json(['message' => 'Estudiante Eliminado Correctamente','status' => 200,], 201);
        }

    }
    public function delete_student_list($id)
    {
        if ($id=="") {
            return response()->json(['message' => 'Error al eliminar un estudiante','status' => 200,], 201);
        }else{

            GrupoSCEstudiante::where('estudiantes_id',$id)->delete();
            Estudiantecomunitarios::where('estudiantes_id',$id)->update([
                'tiene_grupo'=>false
            ]);
             return response()->json(['message' => 'Estudiante Eliminado Correctamente','status' => 200,], 201);
        }

    }
    public function delete_grupo($id)
    {
        if ($id=="") {
            return response()->json(['message' => 'Error al eliminar un grupo','status' => 419,], 201);
        }else{
            $gupr_es = GrupoSCEstudiante::where('grupo_s_c_id',$id)->get();
            foreach ($gupr_es as $key => $value) {
               Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->update([
                'tiene_grupo'=>false
               ]);
            }
            GrupoSC::where('id',$id)->delete();
            GrupoSCEstudiante::where('grupo_s_c_id',$id)->delete();
            GrupoDocumentoServicioComunitario::where('grupo_s_c_id',$id)->delete();
             return response()->json(['message' => 'Grupo Eliminado Correctamente','status' => 200,], 201);
        }

    }

    public function edit_faseone($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=Estudiantes::where('carreras_id',$grupo->carrera_id)->get();
        $profesor=Profesore::all();
        $carrera=carrera::all();
        return  view('servicio-comunitario.edit-faseone',compact('carrera','estudiantes','profesor','grupo'));
    }

    public function add_nota_faseone($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=GrupoSCEstudiante::select('grupo_s_c_estudiantes.id','grupo_s_c_estudiantes.estudiantes_id','grupo_s_c_estudiantes.observaciones',
        'grupo_s_c_estudiantes.nota_eno','estudiantes.cedula','estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','carreras.name as nombre_carrera',
        'estudiantes.fe_ingreso','estudiantes.inicio_programa','estudiantes.sexo','estudiantes.email')
        ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
        ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        ->where('grupo_s_c_estudiantes.grupo_s_c_id',$id)->get();

        $profesor=Profesore::where('id',$grupo->profesore_id)->first();
        return  view('servicio-comunitario.agregar_nota',compact('estudiantes','profesor','grupo'));
    }

    public function add_nota_fasetwo($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=GrupoSCEstudiante::select('grupo_s_c_estudiantes.id','grupo_s_c_estudiantes.estudiantes_id','grupo_s_c_estudiantes.observaciones',
        'grupo_s_c_estudiantes.nota_eno','grupo_s_c_estudiantes.nota_two','grupo_s_c_estudiantes.observaciones_2','estudiantes.cedula','estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','carreras.name as nombre_carrera',
        'estudiantes.fe_ingreso','estudiantes.inicio_programa','estudiantes.sexo','estudiantes.email')
        ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
        ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        ->where('grupo_s_c_estudiantes.grupo_s_c_id',$id)->get();

        $profesor=Profesore::where('id',$grupo->profesore_id)->first();
        return  view('servicio-comunitario.agregar_nota_fase_two',compact('estudiantes','profesor','grupo'));
    }

    public function views_faseone($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=GrupoSCEstudiante::select('grupo_s_c_estudiantes.id','grupo_s_c_estudiantes.estudiantes_id','grupo_s_c_estudiantes.observaciones',
        'grupo_s_c_estudiantes.nota_eno','estudiantes.cedula','estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','carreras.name as nombre_carrera',
        'estudiantes.fe_ingreso','estudiantes.inicio_programa','estudiantes.sexo','estudiantes.email')
        ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
        ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        ->where('grupo_s_c_estudiantes.grupo_s_c_id',$id)->get();

        $profesor=Profesore::where('id',$grupo->profesore_id)->first();
        return  view('servicio-comunitario.faseone_views',compact('estudiantes','profesor','grupo'));
    }


    public function add_nota_student(Request $request)
    {
        if ($request->fase == 1) {
            $resp = GrupoSCEstudiante::where('id',$request->id)->update([
                'observaciones'=>$request->observacion,
                'nota_eno'=>$request->nota,
            ]);
            $res = GrupoSCEstudiante::find($request->id);
            $es = Estudiantecomunitarios::where('estudiantes_id',$res->estudiantes_id)->update([
                'nota_one'=>$request->nota,
                'observacion_fase_one'=>$request->observacion
            ]);
            return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'data'=>$res],201);
        }else{
            $resp = GrupoSCEstudiante::where('id',$request->id)->update([
                'observaciones_2'=>$request->observacion,
                'nota_two'=>$request->nota,
            ]);
            $res = GrupoSCEstudiante::find($request->id);
            $es = Estudiantecomunitarios::where('estudiantes_id',$res->estudiantes_id)->update([
                'nota_twe'=>$request->nota,
                'observacion_fase_twe'=>$request->observacion
            ]);
            return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'data'=>$res],201);
        }

    }


    public function finalisar_fase_one(Request $request)
    {
        $data = GrupoSC::find($request->id);
        if ($data->status==1) {
            if ($data->nota_evaluada_one == 1) {
                $document_verifi = GrupoDocumentoServicioComunitario::where('documento_servicio_comunitario_id','>=',1)
                ->where('documento_servicio_comunitario_id','<=',32)->where('checket',false)->where('grupo_s_c_id',$request->id)->get();
                if (count($document_verifi)) {
                    return response()->json(['success' => 'Error, El Grupo Falta Evaluar Documentos, Debes Evaluar Los Documentos Para Asi Continuar.','status' => 419],201);
                }else{
                    $estudiante = GrupoSCEstudiante::where('grupo_s_c_id',$request->id)->get();
                    if (count($estudiante)) {
                        $num_estudent = count($estudiante);
                        $cont_repro = 0;
                        $data_sen_email =[];
                        foreach ($estudiante as $key => $value) {
                            $estud = Estudiantes::find($value->estudiantes_id);
                            $tutor = Profesore::find($data->profesore_id);

                            $data_sen_email['code_project'] = $data->code;
                            $data_sen_email['nombre_proyecto'] = $data->nombre_proyecto;
                            $data_sen_email['nombre_estudiante'] = $estud->nombres." ".$estud->primer_apellido." ".$estud->segundo_apellido;
                            $data_sen_email['email_estudiante'] = $value->email;
                            $data_sen_email['nota_estudiante'] = $value->nota_eno;
                            $data_sen_email['materia_estudiante'] = "TALLER DE SERVICIO COMUNITARIO";
                            $data_sen_email['nombre_profesor'] = $tutor->nombre;
                            $data_sen_email['primer_apellido_profesor'] = $tutor->primer_apellido;
                            $data_sen_email['segundo_apellido_profesor'] = $tutor->segundo_apellido;
                            $data_sen_email['cedula_profesor'] = $tutor->cedula;
                            $data_sen_email['email_profesor'] = $tutor->email;
                            $data_sen_email['telefono_profesor'] = $tutor->telefono;
                            // $this->send_email_notas_estudent($data_sen_email);
                            if ($value->nota_eno<10) {
                                $cont_repro++;
                                GrupoSCEstudiante::where('id',$value->id)->update([
                                    'reprobo'=>true
                                ]);
                                Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->update([
                                    'tiene_grupo'=>false
                                ]);
                            }else{
                                $est_s = Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->get();
                                if (count($est_s)) {
                                    Estudiantecomunitarios::where('estudiantes_id',$est_s[0]->estudiantes_id)->update([
                                        'fase'=>2
                                    ]);
                                }
                            }



                        }

                        if ($num_estudent==$cont_repro) {
                            GrupoSC::where('id',$request->id)->update([
                                'status'=>4, //grupo reprobado, ya que ningun estudiante no pudieron aprobar la fase 1
                                'archivo_subido'=>0
                            ]);
                        }else{
                            GrupoSC::where('id',$request->id)->update([
                                'status'=>2,
                                'archivo_subido'=>0
                            ]);
                        }
                        return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'ss'=>$data],201);
                    }else{
                        return response()->json(['success' => 'Error, Grupo sin estudiantes','status' => 419],201);
                    }
                }



            }else{
                return response()->json(['success' => 'Error, El Grupo Falta Evaluar, Debes Evaluar Los Estudiantes Para Asi Continuar.','status' => 419],201);
            }
        }else{
            if ($data->archivo_subido == 1 && $data->nota_evaluada_twe == 1) {
                $document_verifi = GrupoDocumentoServicioComunitario::where('documento_servicio_comunitario_id','>=',33)
                ->where('documento_servicio_comunitario_id','<=',54)->where('checket',false)->where('grupo_s_c_id',$request->id)->get();
                if (count($document_verifi)) {
                    return response()->json(['success' => 'Error, El Grupo Falta Evaluar Documentos, Debes Evaluar Los Documentos Para Asi Continuar.','status' => 419],201);
                }else{
                    GrupoSC::where('id',$request->id)->update([
                        // 'status'=>3,
                        'estado'=>true
                    ]);
                    $estudiante = GrupoSCEstudiante::where('grupo_s_c_id',$request->id)->get();
                    $num_estudent = count($estudiante);
                    $cont_repro = 0;

                    foreach ($estudiante as $key => $value) {
                        $estud = Estudiantes::find($value->estudiantes_id);
                        $tutor = Profesore::find($data->profesore_id);

                        $data_sen_email['code_project'] = $data->code;
                        $data_sen_email['nombre_proyecto'] = $data->nombre_proyecto;
                        $data_sen_email['nombre_estudiante'] = $estud->nombres." ".$estud->primer_apellido." ".$estud->segundo_apellido;
                        $data_sen_email['email_estudiante'] = $value->email;
                        $data_sen_email['nota_estudiante'] = $value->nota_eno;
                        $data_sen_email['materia_estudiante'] = "PROYECTO DE SERVICIO";
                        $data_sen_email['nombre_profesor'] = $tutor->nombre;
                        $data_sen_email['primer_apellido_profesor'] = $tutor->primer_apellido;
                        $data_sen_email['segundo_apellido_profesor'] = $tutor->segundo_apellido;
                        $data_sen_email['cedula_profesor'] = $tutor->cedula;
                        $data_sen_email['email_profesor'] = $tutor->email;
                        $data_sen_email['telefono_profesor'] = $tutor->telefono;
                        $this->send_email_notas_estudent($data_sen_email);
                        if (!$value->nota_two == null) {
                            if ($value->nota_two<10) {
                                $cont_repro++;
                                GrupoSCEstudiante::where('id',$value->id)->update([
                                    'reprobo'=>true
                                ]);
                                Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->update([
                                    'tiene_grupo'=>false
                                ]);
                            }else{
                                $est_s = Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->get();
                                if (count($est_s)) {
                                    Estudiantecomunitarios::where('estudiantes_id',$est_s[0]->estudiantes_id)->update([
                                        'fase'=>3 //completado
                                    ]);
                                }
                            }
                        }


                    }
                    return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'ss'=>$data],201);
                }

            }else{
                return response()->json(['success' => 'Error, El Grupo Falta Evaluarlo ó Cargar El Archivo, Debes Subir El Archivo Y Evaluar Los Estudiantes Para Asi Continuar.','status' => 419],201);
            }
        }



    }

    public function send_email_notas_estudent($data)
    {
        Mail::to("yixon2011@gmail.com")->send(new EnvioNotasEstundetMail($data));
    }

    public function get_files_fase_one($id)
    {
       $data = GrupoSCFile::where('grupo_s_c_id',$id)->get();
       return response($data);
    }
    public function store_file_fase_one(Request $request)
    {
     // return response($request);
     // $request->validate([
     //     'code' => [
     //         'required',
     //         'max:10',
     //         Rule::unique('expediente_files','code'),
     //     ],
     //     'name' => 'required',
     //     'description'=> 'nullable',
     // ],[],[
     //     'code' => 'Codigo',
     //     'name' => 'Nombre',
     //     'description' => 'Descripcion',
     // ]);
     // return response($request);

        $file = $request->file('file');
        if($file){
            $filename = $file->getClientOriginalName();
            $foo = \File::extension($filename);
                    $nam_patch = $filename;
                    $route_file = $nam_patch;
                    $path = public_path().DIRECTORY_SEPARATOR."SERVICIO-COMUNITARIO".DIRECTORY_SEPARATOR."FILES";
                    $path_guardar = "/SERVICIO-COMUNITARIO/FILES/".$route_file;
                    $file->move($path,$route_file);

                $file_operacion=GrupoSCFile::create([
                    'grupo_s_c_id'=>$request['id_grupo'],
                    'nombre'=>$route_file,
                    'url'=>$path_guardar,
                    'fase'=>$request['fase'],
                ]);

                if ($file_operacion) {
                    GrupoSC::where('id',$request['id_grupo'])->update([
                        'archivo_subido'=>true
                    ]);
                }

                return response()->json(['success' => 'Archivo subido correctamente.','status' => 200,'id_grupo'=>$request['id_grupo']],201);


        }else{
            return response()->json(['error' => 'Campo vacio.','campo'=>'file','status' => 404],201);
        }

    }
    public function store_value_nota(Request $request)
    {
        // return response($request);
        $grupo = GrupoSC::find($request->id_grupo);
        $grup_student = GrupoSCEstudiante::where('grupo_s_c_id',$request->id_grupo)->where('reprobo',false)->get();
        $resp_d = [];
        $resp_bool = true;
        $e=1;
        $n=0;
        if ($grupo->status==1) {
            foreach ($grup_student as $key => $value) {
                if (is_null($value->nota_eno)) {
                    $n++;
                    $resp_bool = false;
                    $e=0;
                    break;
                }else{
                    $resp_bool = true;
                    $e=1;
                }
            }
            foreach ($grup_student as $key => $value) {
                if (is_null($value->nota_eno)) {
                    $resp_d[$n]= $value;
                    $n++;
                }
            }
            if ($e==1) {
                GrupoSC::where('id',$request->id_grupo)->update([
                    'nota_evaluada_one'=>true
                ]);
            }

            return response()->json(['success' => 'Notas Evaluadas Correctamente.','status' => 200,'resp' => $resp_bool,'data'=>$resp_d],201);
        }else{
            foreach ($grup_student as $key => $value) {
                if (is_null($value->nota_two)) {
                    $n++;
                    $resp_bool = false;
                    $e=0;
                    break;
                }else{
                    $resp_bool = true;
                    $e=1;
                }
            }
            foreach ($grup_student as $key => $value) {
                if (is_null($value->nota_two)) {
                    $resp_d[$n]= $value;
                    $n++;
                }
            }
            if ($e==1) {
                GrupoSC::where('id',$request->id_grupo)->update([
                    'nota_evaluada_twe'=>true
                ]);
            }

            return response()->json(['success' => 'Notas Evaluadas Correctamente.','status' => 200,'resp' => $resp_bool,'data'=>$resp_d,'erro'=>"Debes evaluar los estudiantes."],201);
        }

    }

    public function change_status_document_grup(Request $request)
    {
        // return response($request);

        $resp = GrupoDocumentoServicioComunitario::where('id',$request->id)->update([
            'checket'=>$request->ckeck
        ]);
        if ($resp) {
            return response()->json(['message' => 'Estado cambiado correctamente.','status' => 200,], 201);
        }else{
            return response()->json(['message' => 'Error al actualizar.','status' => 419,], 201);
        }
    }

    public function list_evaluar_document($fase,$id_grupo)
    {
        $data_1 = GrupoDocumentoServicioComunitario::select('grupo_documento_servicio_comunitarios.id',
        'grupo_documento_servicio_comunitarios.documento_servicio_comunitario_id as num_document','documento_servicio_comunitarios.documento','grupo_documento_servicio_comunitarios.checket')
        ->join('documento_servicio_comunitarios', 'documento_servicio_comunitarios.id','=', 'grupo_documento_servicio_comunitarios.documento_servicio_comunitario_id')
        ->where('documento_servicio_comunitarios.fase','=',$fase)->where('grupo_documento_servicio_comunitarios.grupo_s_c_id','=',$id_grupo)->orderBy('grupo_documento_servicio_comunitarios.documento_servicio_comunitario_id','ASC')->get();

        $data_2 = GrupoDocumentoServicioComunitario::select('grupo_documento_servicio_comunitarios.id',
        'grupo_documento_servicio_comunitarios.documento_servicio_comunitario_id as num_document','documento_servicio_comunitarios.documento','grupo_documento_servicio_comunitarios.checket')
        ->join('documento_servicio_comunitarios', 'documento_servicio_comunitarios.id','=', 'grupo_documento_servicio_comunitarios.documento_servicio_comunitario_id')
        ->where('documento_servicio_comunitarios.fase','=',2)->where('grupo_documento_servicio_comunitarios.grupo_s_c_id','=',$id_grupo)->orderBy('grupo_documento_servicio_comunitarios.documento_servicio_comunitario_id','ASC')->get();
        $data = [
            'data_one'=>$data_1,
            'data_twe'=>$data_2,
        ];
        return response($data);
    }

    // --------------------------------------------------Code Face 2--------------------------------------------------

    public function list_fasetwo()
    {

        $data=[];
        $fecha_actual = Carbon::now();
        // $fecha_actual = Carbon::parse('2023-05-25');
        $ano_actual = $fecha_actual->format('Y');
        $mes_actual = $fecha_actual->format('m');

        $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.code','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
        'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','grupo_s_c_s.estado',
        'grupo_s_c_s.total_studiante','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.status','grupo_s_c_s.created_at')
        ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
        ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
        ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',0)->get();

      return  view('servicio-comunitario.list-fasetwo',compact('data'));
    }

    public function list_fasefinal(Request $request)
    {
        if ($request->periodo) {
            if ($request->periodo=="all") {
                $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.code','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
                'profesores.primer_apellido','profesores.segundo_apellido','carreras.name as nombre_carrera','carreras.code as codigo_carrera','profesores.especialidad','grupo_s_c_s.estado',
                'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
                ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
                ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
                ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)->get();
            }else{

                $array_periodo = explode("-",$request->periodo);
                // dd($array_periodo);
                if ($array_periodo[0] == 1) {
                    $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.code','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
                    'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
                    'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
                    ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
                    ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
                    ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)
                    ->whereYear('grupo_s_c_s.created_at', $array_periodo[1])
                    ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
                    ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();
                }else{
                    $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.code','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
                    'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
                    'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
                    ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
                    ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
                    ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)
                    ->whereYear('grupo_s_c_s.created_at', $array_periodo[1])
                    ->whereMonth('grupo_s_c_s.created_at','>=' , '06')
                    ->whereMonth('grupo_s_c_s.created_at','<=', '12')->get();
                }
            }

        }else{
            $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.code','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
            'profesores.primer_apellido','profesores.segundo_apellido','carreras.name as nombre_carrera','carreras.code as codigo_carrera','profesores.especialidad','grupo_s_c_s.estado',
            'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
            ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
            ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
            ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)->get();
        }

        $periodo = $request->periodo;
      return  view('servicio-comunitario.list_fase_culminados',compact('data','periodo'));
    }

    public function edit_fasetwo($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=Estudiantecomunitarios::select('estudiantes.id','estudiantes.cedula',
        'estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','estudiantecomunitarios.turno',
        'estudiantecomunitarios.seccion','estudiantecomunitarios.semestre')
        ->join('estudiantes', 'estudiantes.id','=', 'estudiantecomunitarios.estudiantes_id')->where('estudiantecomunitarios.fase',2)->where('estudiantecomunitarios.tiene_grupo',false)->get();
        $profesor=Profesore::all();
        $carrera=carrera::all();
        return  view('servicio-comunitario.edit-fasetwo',compact('carrera','estudiantes','profesor','grupo'));
    }

    public function update_fasetwo(Request $request)
    {
    //    return response($request);

       $temp_student = GrupoSCEstudiante::where('grupo_s_c_id',$request->id_grupo)->get();

       GrupoSC::where('id',$request->id_grupo)->update([
        'profesore_id'=>$request->profesor,
        'nombre_proyecto'=>$request->nombre_proyecto,
        'total_studiante'=>count($temp_student),
        'nombre_comunidad'=>$request->nombre_comunidad,
        'direccion_comunidad'=>$request->direccion_comunidad,
        'nombre_tutor_comunitario'=>$request->nomb_tutor_comunitario,
        'cedula_tutor_comunitario'=>$request->cedula_tutor_comunitario,
        'telefono_tutor_comunitario'=>$request->telefono_tutor_comunitario,
        'vinc_project_planes_prog'=>$request->vinculacion_project,
        'area_accion_project'=>$request->select_area_accion,
        'cant_beneficiados'=>$request->cant_beneficiados,
        'foros'=>$request->foro_check,
        'charlas'=>$request->charlas_check,
        'jornadas'=>$request->jornadas_check,
        'talleres'=>$request->talleres_check,
        'campanas'=>$request->campana_check,
        'reunion_misiones'=>$request->reunion_misiones_check,
        'ferias'=>$request->ferias_check,
        'alianzas_estrategicas'=>$request->alianzas_estrategicas_check,
        'carrera_id'=>$request->carrrera_id,
    ]);


        return response()->json(['message' => 'Grupo Actualizado Correctamente','status' => 200,], 201);
    }

    public function views_fasetwo($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=GrupoSCEstudiante::select('grupo_s_c_estudiantes.id','grupo_s_c_estudiantes.estudiantes_id','grupo_s_c_estudiantes.observaciones',
        'grupo_s_c_estudiantes.nota_eno','grupo_s_c_estudiantes.observaciones_2','grupo_s_c_estudiantes.nota_two','estudiantes.cedula','estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','carreras.name as nombre_carrera',
        'estudiantes.fe_ingreso','estudiantes.inicio_programa','estudiantes.sexo','estudiantes.email')
        ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
        ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
        ->where('grupo_s_c_estudiantes.grupo_s_c_id',$id)->get();

        $profesor_all=Profesore::all();
        $carrera=carrera::all();

        $profesor=Profesore::where('id',$grupo->profesore_id)->first();
        return  view('servicio-comunitario.fasetwo_views',compact('estudiantes','profesor','grupo','carrera','profesor_all'));
    }

}
