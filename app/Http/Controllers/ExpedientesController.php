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
use ZipArchive;
use File;

class ExpedientesController extends Controller
{
    public $carpeta_nucleo="UNEFA-LARA";
    public $carpeta_ing_sistema="\INGENIERIA DE SISTEMAS";
    public $carpeta_ing_electrica="\INGENIERIA DE ELECTRICA";
    public $carpeta_ing_agronomica="\INGENIERIA AGRONOMO";
    public $carpeta_emfermeria="\LIC. EMFERMERIA";
    public $carpeta_economia="\LIC. ECONOMIA";
    public $carpeta_administracion="\LIC. ADMINISTRACION";

   public function ing_sistem_index()
   {
       $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
       ->where('estudiantes.carreras_id',1)->get();
     return  view('expedientes.ing-sistema.index',compact('expedie'));
   }

   public function ing_sistem_edit($id)
   {
       $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
       ->where('estudiantes.id',$id)->get();
       $file_st = Expediente_file::where('expedientes_id',$id)->get();
       $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();
       $fechaComoEntero = strtotime($expedie[0]->fe_ingreso);
       $m = date("m", $fechaComoEntero);
       $y = date("Y", $fechaComoEntero);

       $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
        $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;

    // return response($expedie);
     return  view('expedientes.ing-sistema.edit',compact('expedie','file_st','all_perio'));
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
    $carpeta_carrera = "";
    $estud = Estudiantes::find($request['id_estudiantes']);
    $data_carrera = carrera::where('id',$estud->carreras_id)->first();
    switch ($data_carrera->code) {
        case '2613':
            $carpeta_carrera=$this->carpeta_ing_sistema;
            break;
        case '2213':
            $carpeta_carrera=$this->carpeta_ing_electrica;
            break;
        case '2013':
            $carpeta_carrera=$this->carpeta_ing_agronomica;
            break;
        case '0913':
            $carpeta_carrera=$this->carpeta_administracion;
            break;
        case '0313':
            $carpeta_carrera=$this->carpeta_emfermeria;
            break;
        case '1013':
            $carpeta_carrera=$this->carpeta_economia;
            break;
        default:
        return response()->json(['error' => 'Codigo de Carrera no existe en el sistemna.','status' => 404],201);
            break;
    }
    // return response($request);
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
                        $route_file = $this->carpeta_nucleo.$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR.$nam_patch;
                        $path = public_path().DIRECTORY_SEPARATOR.$this->carpeta_nucleo.$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes;
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
                    $can=Expediente_file::where('estudiantes_id',$request['id_estudiantes'])->get()->count();
                    if (!count($verfi_exp)) {
                        $porc = ($can*100)/14;
                        $exp = Expediente::create([
                            'estudiantes_id'=>$request['id_estudiantes'],
                            'progres'=>$porc,
                            'carpeta_student'=>$carpeta_estudiantes
                        ]);
                        Expediente_file::where('estudiantes_id',$request['id_estudiantes'])->update([
                            'expedientes_id'=>$exp->id,
                        ]);

                    }else{
                        $porc = ($can*100)/14;
                        Expediente::where('estudiantes_id',$request['id_estudiantes'])->update([
                            'progres'=>$porc
                        ]);
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
            $del_path = public_path().DIRECTORY_SEPARATOR.$r[0]->file_url;
            if (file_exists($del_path )) {
                unlink($del_path);
            }
            //  return response($del_path);

             Expediente_file::where('id',$id)->delete();
             return response()->json(['success' => 'Archivo eliminado correctamente','status' => 200,], 201);
        }

    }

    public function empaquetar_student($id)
    {

        $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
        ->where('estudiantes.id',$id)->get();
        // return response($expedie);
        // $file_st = Expediente_file::where('expedientes_id',$id)->get();
        $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();


        $estud = Estudiantes::find($expedie[0]->estudiantes_id);

        $fechaComoEntero = strtotime($estud->fe_ingreso);
        $m = date("m", $fechaComoEntero);
        $y = date("Y", $fechaComoEntero);

        $periodo = ($m>=06) ? "2-".$y : "1-".$y ;

        $carpeta_estudiantes=strtoupper($estud->primer_apellido)." ".strtoupper(substr($estud->nombres,0, 1))." ".$periodo."-".$data_carrera->code."-V-".$estud->cedula;

        $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
         $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;
        $zip = new ZipArchive();
        $filename = $all_perio.".zip";
        if ($zip->open(public_path($filename),ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path($this->carpeta_nucleo.DIRECTORY_SEPARATOR.$this->carpeta_ing_sistema.DIRECTORY_SEPARATOR.$carpeta_estudiantes));
            foreach($files as $key=> $value){
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value,$relativeNameInZipFile);

            }
            $zip->close();
        }

         return response()->download(public_path($filename));
        // return response($carpeta_estudiantes);
    }

//---------------------------------------------------------End Ingenieria sistemas---------------------------------------------------------

//---------------------------------------------------------------Electrica-------------------------------------------------------
public function ing_electrica_index()
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.carreras_id',2)->get();
  return  view('expedientes.ing-electrica.index',compact('expedie'));
}


public function ing_electrica_create()
{
     $estudiantes=Estudiantes::where('carreras_id',2)->get();
 return  view('expedientes.ing-electrica.create',compact('estudiantes'));
}

public function ing_electrica_edit($id)
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.id',$id)->get();
    $file_st = Expediente_file::where('expedientes_id',$id)->get();
    $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();
    $fechaComoEntero = strtotime($expedie[0]->fe_ingreso);
    $m = date("m", $fechaComoEntero);
    $y = date("Y", $fechaComoEntero);

    $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
     $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;

 // return response($expedie);
  return  view('expedientes.ing-electrica.edit',compact('expedie','file_st','all_perio'));
}


//---------------------------------------------------------------End Electrica-------------------------------------------------------

//---------------------------------------------------------------Agronomia-------------------------------------------------------
public function ing_agronomica_index()
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.carreras_id',3)->get();
  return  view('expedientes.ing-agronomia.index',compact('expedie'));
}

public function ing_agronomica_create()
{
     $estudiantes=Estudiantes::where('carreras_id',3)->get();
 return  view('expedientes.ing-agronomia.create',compact('estudiantes'));
}

public function ing_agronomica_edit($id)
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.id',$id)->get();
    $file_st = Expediente_file::where('expedientes_id',$id)->get();
    $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();
    $fechaComoEntero = strtotime($expedie[0]->fe_ingreso);
    $m = date("m", $fechaComoEntero);
    $y = date("Y", $fechaComoEntero);

    $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
     $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;

 // return response($expedie);
  return  view('expedientes.ing-agronomia.edit',compact('expedie','file_st','all_perio'));
}
//---------------------------------------------------------------End Agronomia-------------------------------------------------------


//---------------------------------------------------------------Administracion-------------------------------------------------------
public function ing_administracion_index()
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.carreras_id',4)->get();
  return  view('expedientes.lic-administracion.index',compact('expedie'));
}

public function ing_administracion_create()
{
     $estudiantes=Estudiantes::where('carreras_id',4)->get();
 return  view('expedientes.lic-administracion.create',compact('estudiantes'));
}

public function ing_administracion_edit($id)
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.id',$id)->get();
    $file_st = Expediente_file::where('expedientes_id',$id)->get();
    $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();
    $fechaComoEntero = strtotime($expedie[0]->fe_ingreso);
    $m = date("m", $fechaComoEntero);
    $y = date("Y", $fechaComoEntero);

    $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
     $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;

 // return response($expedie);
  return  view('expedientes.lic-administracion.edit',compact('expedie','file_st','all_perio'));
}
//---------------------------------------------------------------End Administracion-------------------------------------------------------

//---------------------------------------------------------------Enfermeria-------------------------------------------------------
public function ing_enfermeria_index()
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.carreras_id',5)->get();
  return  view('expedientes.lic-enfermeria.index',compact('expedie'));
}

public function ing_enfermeria_create()
{
     $estudiantes=Estudiantes::where('carreras_id',5)->get();
 return  view('expedientes.lic-enfermeria.create',compact('estudiantes'));
}

public function ing_enfermeria_edit($id)
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.id',$id)->get();
    $file_st = Expediente_file::where('expedientes_id',$id)->get();
    $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();
    $fechaComoEntero = strtotime($expedie[0]->fe_ingreso);
    $m = date("m", $fechaComoEntero);
    $y = date("Y", $fechaComoEntero);

    $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
     $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;

 // return response($expedie);
  return  view('expedientes.lic-enfermeria.edit',compact('expedie','file_st','all_perio'));
}
//---------------------------------------------------------------End Enfermeria-------------------------------------------------------


//---------------------------------------------------------------Economia-------------------------------------------------------
public function ing_economia_index()
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.carreras_id',6)->get();
  return  view('expedientes.lic-economia.index',compact('expedie'));
}

public function ing_economia_create()
{
     $estudiantes=Estudiantes::where('carreras_id',6)->get();
 return  view('expedientes.lic-economia.create',compact('estudiantes'));
}

public function ing_economia_edit($id)
{
    $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
    ->where('estudiantes.id',$id)->get();
    $file_st = Expediente_file::where('expedientes_id',$id)->get();
    $data_carrera = carrera::where('id',$expedie[0]->carreras_id)->first();
    $fechaComoEntero = strtotime($expedie[0]->fe_ingreso);
    $m = date("m", $fechaComoEntero);
    $y = date("Y", $fechaComoEntero);

    $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
     $all_perio= $periodo."-".$data_carrera->code."-V-".$expedie[0]->cedula;

 // return response($expedie);
  return  view('expedientes.lic-economia.edit',compact('expedie','file_st','all_perio'));
}
//---------------------------------------------------------------End Economia-------------------------------------------------------

























    public function empaquetar_nucleo()
    {

        $all_carreras= carrera::all();
       // aqui me traigo los estudiantes y lo rrecorro que tenga los archivos
        $carpeta_carrera = "";
        $zip = new ZipArchive();
        for ($j=0; $j < count($all_carreras); $j++) {

            $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
            ->where('estudiantes.carreras_id',$all_carreras[$j]->id)->get();

            for ($i=0; $i < count($expedie); $i++) {  //el metodo count() me trae la cantidad de registro en un array
                $all_perio= "UNEFA-LARA"; //nombre del zip

               $filename = $all_perio.".zip"; // nombre del zip
               if ($zip->open(public_path($filename),ZipArchive::CREATE) == TRUE) {


                   $data_carrera = carrera::where('id',$expedie[$i]->carreras_id)->first(); // me traigo la carrera del estudiante
                   $estud = Estudiantes::find($expedie[$i]->estudiantes_id); // me trigo el estudiante
                   switch ($data_carrera->code) {
                       case '2613':
                           $carpeta_carrera=$this->carpeta_ing_sistema;
                           break;
                       case '2213':
                           $carpeta_carrera=$this->carpeta_ing_electrica;
                           break;
                       case '2013':
                           $carpeta_carrera=$this->carpeta_ing_agronomica;
                           break;
                       case '0913':
                           $carpeta_carrera=$this->carpeta_administracion;
                           break;
                       case '0313':
                           $carpeta_carrera=$this->carpeta_emfermeria;
                           break;
                       case '1013':
                           $carpeta_carrera=$this->carpeta_economia;
                           break;
                       default:
                       return response()->json(['error' => 'Codigo de Carrera no existe en el sistemna.','status' => 404],201);
                           break;
                   }


                   $fechaComoEntero = strtotime($estud->fe_ingreso);
                   $m = date("m", $fechaComoEntero);
                   $y = date("Y", $fechaComoEntero);

                   $periodo = ($m>=06) ? "2-".$y : "1-".$y ;

                   $periodo = ($m>=06) ? "2-".$y : "1-".$y ;
                   $carpeta_estudiantes=strtoupper($estud->primer_apellido)." ".strtoupper(substr($estud->nombres,0, 1))." ".$periodo."-".$data_carrera->code."-V-".$estud->cedula; //aqui creo la carpeta del estudiante
                   $n=$this->carpeta_nucleo.$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR;
                   $folder=public_path($this->carpeta_nucleo.$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR);

                   $zip->addGlob("$folder*.*",GLOB_BRACE, [
                       "add_path"=> $n,
                       "remove_all_path"=>true
                   ]);

               }

            }
        }
        $zip->close(); //cierro el zip

            // return response($folder);
         return response()->download(public_path($filename));

    }
}
