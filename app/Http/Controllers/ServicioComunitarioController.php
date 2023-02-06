<?php

namespace App\Http\Controllers;

use App\Models\Estudiantecomunitarios;
use App\Models\Estudiantes;
use App\Models\GrupoSC;
use App\Models\GrupoSCEstudiante;
use App\Models\GrupoSCFile;
use App\Models\Profesore;
use App\Models\TempGrupoSCEstudiante;
use Illuminate\Http\Request;

class ServicioComunitarioController extends Controller
{
    public function list_faseone()
    {
        $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
        'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','grupo_s_c_s.estado',
        'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
        ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')->get();
      return  view('servicio-comunitario.list-faseone',compact('data'));
    }

    public function faseone_create()
    {
         $estudiantes=Estudiantecomunitarios::select('estudiantes.id','estudiantes.cedula',
         'estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','estudiantecomunitarios.turno',
         'estudiantecomunitarios.seccion','estudiantecomunitarios.semestre')
         ->join('estudiantes', 'estudiantes.id','=', 'estudiantecomunitarios.estudiantes_id')->where('estudiantecomunitarios.fase',1)->get();
         $profesor=Profesore::all();
     return  view('servicio-comunitario.create-faseone',compact('estudiantes','profesor'));
    }

    public function temp_store_student(Request $request)
    {
    //    return response($request);ç
        $verif = GrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->get();
        if (count($verif)) {
            return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
        }else{
            $verif = TempGrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->get();
            if (count($verif)) {
                return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
            }else{
                TempGrupoSCEstudiante::create([
                    'estudiantes_id'=>$request->id_estudiante,
                    'user_id'=>1,
                ]);
                 return response()->json(['message' => "Estudiante Agregado Correctamente.",'status'=>200],201);
            }
        }

    }

    public function store_student(Request $request)
    {
    //    return response($request);ç
        $verif = GrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->get();
        if (count($verif)) {
            return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
        }else{
            $verif = TempGrupoSCEstudiante::where('estudiantes_id',$request->id_estudiante)->get();
            if (count($verif)) {
                return response()->json(['message' => "Estudiante Ya Esta Registrado",'status'=>419],201);
            }else{
                GrupoSCEstudiante::create([
                    'estudiantes_id'=>$request->id_estudiante,
                    'grupo_s_c_id'=>$request->id_grupo,
                    'status'=>1,
                ]);
                 return response()->json(['message' => "Estudiante Agregado Correctamente.",'status'=>200],201);
            }
        }

    }
    public function store_faseone(Request $request)
    {
    //    return response($request);

       $temp_student = TempGrupoSCEstudiante::all();

       $resp_grup = GrupoSC::create([
        'profesore_id'=>$request->profesor,
        'nombre_proyecto'=>$request->nombre_proyecto,
        'estado'=>0,
        'total_studiante'=>count($temp_student),
        'status'=>1,
       ]);

       foreach ($temp_student as $key => $value) {
           GrupoSCEstudiante::create([
                'grupo_s_c_id'=>$resp_grup->id,
                'estudiantes_id'=>$value->estudiantes_id,
                'status'=>1,
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
        ]);


        return response()->json(['message' => 'Grupo Actualizado Correctamente','status' => 200,], 201);
    }
    public function List_student_temp()
    {
        $data = TempGrupoSCEstudiante::select('*')->join('estudiantes', 'estudiantes.id', '=', 'temp_grupo_s_c_estudiantes.estudiantes_id')->get();
        return response($data);
    }

    public function List_student($id_grupo)
    {
        $data = GrupoSCEstudiante::select('*')->join('estudiantes', 'estudiantes.id', '=', 'grupo_s_c_estudiantes.estudiantes_id')
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
             return response()->json(['message' => 'Estudiante Eliminado Correctamente','status' => 200,], 201);
        }

    }
    public function delete_grupo($id)
    {
        if ($id=="") {
            return response()->json(['message' => 'Error al eliminar un grupo','status' => 419,], 201);
        }else{

            GrupoSC::where('id',$id)->delete();
            GrupoSCEstudiante::where('grupo_s_c_id',$id)->delete();
             return response()->json(['message' => 'Grupo Eliminado Correctamente','status' => 200,], 201);
        }

    }

    public function edit_faseone($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=Estudiantes::where('carreras_id',1)->get();
        $profesor=Profesore::all();
        return  view('servicio-comunitario.edit-faseone',compact('estudiantes','profesor','grupo'));
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
            return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'data'=>$res],201);
        }else{
            $resp = GrupoSCEstudiante::where('id',$request->id)->update([
                'observaciones_2'=>$request->observacion,
                'nota_two'=>$request->nota,
            ]);
            $res = GrupoSCEstudiante::find($request->id);
            return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'data'=>$res],201);
        }

    }


    public function finalisar_fase_one(Request $request)
    {
        $data = GrupoSC::find($request->id);
        if ($data->status==1) {
            if ($data->archivo_subido == 1 && $data->nota_evaluada_one == 1) {
                GrupoSC::where('id',$request->id)->update([
                    'status'=>2,
                    'archivo_subido'=>0
                ]);
                $estudiante = GrupoSCEstudiante::where('grupo_s_c_id',$request->id)->get();
                foreach ($estudiante as $key => $value) {
                    $est_s = Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->get();
                    if (count($est_s)) {
                        Estudiantecomunitarios::where('estudiantes_id',$est_s[0]->estudiantes_id)->update([
                            'fase'=>2
                        ]);
                    }

                }
                return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'ss'=>$data],201);
            }else{
                return response()->json(['success' => 'Error, El Grupo Falta Evaluarlo ó Cargar El Archivo, Debes Subir El Archivo Y Evaluar Los Estudiantes Para Asi Continuar.','status' => 419],201);
            }
        }else{
            if ($data->archivo_subido == 1 && $data->nota_evaluada_twe == 1) {
                GrupoSC::where('id',$request->id)->update([
                    'status'=>3,
                    'estado'=>true
                ]);
                $estudiante = GrupoSCEstudiante::where('grupo_s_c_id',$request->id)->get();
                foreach ($estudiante as $key => $value) {
                    $est_s = Estudiantecomunitarios::where('estudiantes_id',$value->estudiantes_id)->get();
                    if (count($est_s)) {
                        Estudiantecomunitarios::where('estudiantes_id',$est_s[0]->estudiantes_id)->update([
                            'fase'=>2 //completado
                        ]);
                    }

                }
                return response()->json(['success' => 'Operación Realizado Correctamente.','status' => 200,'ss'=>$data],201);
            }else{
                return response()->json(['success' => 'Error, El Grupo Falta Evaluarlo ó Cargar El Archivo, Debes Subir El Archivo Y Evaluar Los Estudiantes Para Asi Continuar.','status' => 419],201);
            }
        }



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

                return response()->json(['success' => 'Archivo subido correctamente.','status' => 200],201);


        }else{
            return response()->json(['error' => 'Campo vacio.','campo'=>'file','status' => 404],201);
        }

    }
    public function store_value_nota(Request $request)
    {
        // return response($request);
        $grupo = GrupoSC::find($request->id_grupo);
        $grup_student = GrupoSCEstudiante::where('grupo_s_c_id',$request->id_grupo)->get();
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

    // --------------------------------------------------Code Face 2--------------------------------------------------

    public function list_fasetwo()
    {
        $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor','profesores.cedula','profesores.nombre','profesores.email',
        'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','grupo_s_c_s.estado',
        'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
        ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')->where('grupo_s_c_s.status','=',2)->get();
      return  view('servicio-comunitario.list-fasetwo',compact('data'));
    }
    public function edit_fasetwo($id)
    {
        $grupo = GrupoSC::find($id);
        $estudiantes=Estudiantecomunitarios::select('estudiantes.id','estudiantes.cedula',
        'estudiantes.nombres','estudiantes.primer_apellido','estudiantes.segundo_apellido','estudiantecomunitarios.turno',
        'estudiantecomunitarios.seccion','estudiantecomunitarios.semestre')
        ->join('estudiantes', 'estudiantes.id','=', 'estudiantecomunitarios.estudiantes_id')->where('estudiantecomunitarios.fase',2)->get();
        $profesor=Profesore::all();
        return  view('servicio-comunitario.edit-fasetwo',compact('estudiantes','profesor','grupo'));
    }

    public function update_fasetwo(Request $request)
    {
    //    return response($request);

       $temp_student = GrupoSCEstudiante::where('grupo_s_c_id',$request->id_grupo)->get();

        GrupoSC::where('id',$request->id_grupo)->update([
            'profesore_id'=>$request->profesor,
            'nombre_proyecto'=>$request->nombre_proyecto,
            'total_studiante'=>count($temp_student),
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

        $profesor=Profesore::where('id',$grupo->profesore_id)->first();
        return  view('servicio-comunitario.fasetwo_views',compact('estudiantes','profesor','grupo'));
    }

}
