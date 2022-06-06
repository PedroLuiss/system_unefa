<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\Estudiantes;
use App\Models\Expediente;
use App\Models\Expediente_file;
use App\Models\TempFileExpediente;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpedientesController extends Controller
{
    public $carpeta_ing_sistema="\INGENIERIA DE SISTEMAS";

   public function ing_sistem_index()
   {
       $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')->get();
     return  view('expedientes.ing-sistema.index',compact('expedie'));
   }

   public function ing_sistem_create()
   {
        $estudiantes=Estudiantes::where('carreras_id',1)->get();
    return  view('expedientes.ing-sistema.create',compact('estudiantes'));
   }

   public function store_file_expedientes_ig_sitem(Request $request)
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

    $estud = Estudiantes::find($request['id_estudiantes']);
    $data_carrera = carrera::where('id',$estud->carreras_id)->first();
    // return response($data_carrera);
    $fechaComoEntero = strtotime($estud->fe_ingreso);
    $m = date("m", $fechaComoEntero);
    $y = date("Y", $fechaComoEntero);

    $periodo = ($m>=06) ? "2-".$y : "1-".$y ;

    $carpeta_estudiantes=strtoupper($estud->primer_apellido)." ".strtoupper(substr($estud->nombres,0, 1))." ".$periodo."-".$data_carrera->code."-V-".$estud->cedula;

       $file = $request->file('file');
       if($file){
           $verifi_code= Expediente_file::where('code',$request['code'])->where('estudiantes_id',$request['id_estudiantes'])->get();
           if (count($verifi_code)) {
            return response()->json(['error' => 'Este codigo ya existe.','campo'=>'code','status' => 404],201);
           }else{
                $filename = $file->getClientOriginalName();
                $foo = \File::extension($filename);
                if($foo == 'pdf'|| $foo == 'docx'){
                        $nam_patch = strtoupper($request['code']).'.'.$foo;
                        $route_file = $this->carpeta_ing_sistema.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR.$nam_patch;
                        $path = public_path().DIRECTORY_SEPARATOR.$this->carpeta_ing_sistema.DIRECTORY_SEPARATOR.$carpeta_estudiantes;
                        $file->move($path,$route_file);

                    $file_operacion=Expediente_file::create([
                        'expedientes_id'=>null,
                        'estudiantes_id'=>$request['id_estudiantes'],
                        'code'=>strtoupper($request['code']),
                        'name'=>$request['name'],
                        'description'=>$request['description'],
                        'name_file'=>$nam_patch,
                        'file_url'=>$route_file,
                        'path'=>$path,
                    ]);
                    $verfi_exp=Expediente::where('estudiantes_id',$request['id_estudiantes'])->get();

                    if (!count($verfi_exp)) {
                        $exp = Expediente::create([
                            'estudiantes_id'=>$request['id_estudiantes'],
                        ]);
                        Expediente_file::where('estudiantes_id',$request['id_estudiantes'])->update([
                            'expedientes_id'=>$exp->id,
                        ]);

                    }else{
                        $j= Expediente::where('estudiantes_id',$request['id_estudiantes'])->get();
                        Expediente_file::where('estudiantes_id',$request['id_estudiantes'])->update([
                            'expedientes_id'=>$j[0]->id,
                        ]);
                    }

                    return response()->json(['success' => 'Archivo subido correctamente.','status' => 200],201);

                }else{
                    return response()->json(['error' => 'Error solo archivos con extención pdf, docx.','campo'=>'file','status' => 404],201);
                }
           }

       }else{
           return response()->json(['error' => 'Campo vacio.','campo'=>'file','status' => 404],201);
       }

   }

   public function get_files_ing_sistemas($id)
   {
    $data = Expediente_file::where('estudiantes_id',$id)->orderBy('expediente_files.created_at','DESC')->paginate(7);
    return response($data);
   }

       public function delete_file_ing_sistemas($id)
    {
        if ($id=="") {
            return response()->json(['error' => 'Error al eliminar un achivo','status' => 200,], 201);
        }else{

            $r=Expediente_file::where('id',$id)->get();
            $del_path = public_path().$r[0]->file_url;
            //  return response($del_path);
             unlink($del_path);
             Expediente_file::where('id',$id)->delete();
             return response()->json(['success' => 'Archivo eliminado correctamente','status' => 200,], 201);
        }

    }
}
