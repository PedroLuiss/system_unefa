<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\GrupoSCEstudiante;
use App\Models\Profesore;
use App\Models\TempGrupoSCEstudiante;
use Illuminate\Http\Request;

class ServicioComunitarioController extends Controller
{
    public function list_faseone()
    {

      return  view('servicio-comunitario.list-faseone');
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
                ]);
                 return response()->json(['message' => "Estudiante Agregado Correctamente.",'status'=>200],201);
            }
        }

    }
    public function List_student_temp()
    {
        $data = TempGrupoSCEstudiante::select('*')->join('estudiantes', 'estudiantes.id', '=', 'temp_grupo_s_c_estudiantes.estudiantes_id')->get();
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
}
