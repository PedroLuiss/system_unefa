<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\Estudiantes;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ZipArchive;
use File;

class ExpedienteCarrerasController extends Controller
{

    public $carpeta_nucleo="SG-010-OC";
    public $carpeta_ing_sistema="INGENIERIA DE SISTEMAS";
    public $carpeta_ing_electrica="INGENIERIA DE ELECTRICA";
    public $carpeta_ing_agronomica="INGENIERIA AGRONOMO";
    public $carpeta_emfermeria="LIC. EMFERMERIA";
    public $carpeta_economia="LIC. ECONOMIA";
    public $carpeta_administracion="LIC. ADMINISTRACION";

    public function index()
    {
        $c=[];
        $carreras = carrera::all();
        foreach($carreras as $val){
            $studen = Estudiantes::where('carreras_id',$val->id)->count();
            $c[$val->id]=$studen;
        }

        // dd($c);
      return  view('expediente-carreras.index',compact('carreras','c'));
    }


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
                   $n=$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR;
                   $folder=public_path($this->carpeta_nucleo.DIRECTORY_SEPARATOR.$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR);

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

    public function empaquetar_carrera($id)
    {
        $all_carreras= carrera::where('id',$id)->get();
        // aqui me traigo los estudiantes y lo rrecorro que tenga los archivos
         $carpeta_carrera = "";
         $zip = new ZipArchive();

             $expedie = Expediente::select('*')->join('estudiantes', 'estudiantes.id', '=', 'expedientes.estudiantes_id')
             ->where('estudiantes.carreras_id',$all_carreras[0]->id)->get();
            // return response($expedie);
             for ($i=0; $i < count($expedie); $i++) {  //el metodo count() me trae la cantidad de registro en un array
                 $all_perio= "UNEFA-LARA-".$all_carreras[0]->code."-".strtoupper($all_carreras[0]->name); //nombre del zip

                $filename = $all_perio.".zip"; // nombre del zip
                if ($zip->open(public_path($filename),ZipArchive::CREATE) == TRUE) {


                    $data_carrera = carrera::where('id',$expedie[$i]->carreras_id)->first(); // me traigo la carrera del estudiante
                    $estud = Estudiantes::find($expedie[$i]->estudiantes_id); // me trigo el estudiante
                    switch ($all_carreras[0]->code) {
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
                    $n=$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR;
                    $folder=public_path($this->carpeta_nucleo.DIRECTORY_SEPARATOR.$carpeta_carrera.DIRECTORY_SEPARATOR.$carpeta_estudiantes.DIRECTORY_SEPARATOR);

                    $zip->addGlob("$folder*.*",GLOB_BRACE, [
                        "add_path"=> $n,
                        "remove_all_path"=>true
                    ]);

                }

             }
         $zip->close(); //cierro el zip

             // return response($folder);
          return response()->download(public_path($filename));
    }


}
