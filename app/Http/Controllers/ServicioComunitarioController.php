<?php

namespace App\Http\Controllers;

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
        'grupo_s_c_s.total_studiante','grupo_s_c_s.status')
        ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')->get();
      return  view('servicio-comunitario.list-faseone',compact('data'));
    }

    public function faseone_create()
    {
         $estudiantes=Estudiantes::where('carreras_id',1)->get();
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

}
