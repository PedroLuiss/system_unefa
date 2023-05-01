<?php

namespace App\Http\Controllers;

use App\Imports\EstudiateServicioImport;
use App\Models\carrera;
use App\Models\Estudiantes;
use App\Models\Estudiantecomunitarios;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\imports\importexcel;

class EstudiantesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {


        $estu = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.nombres','estudiantes.primer_apellido',
        'estudiantes.segundo_apellido','carreras.name','estudiantes.fe_ingreso','estudiantes.inicio_programa','estudiantes.sexo','estudiantes.sanguineo',
        'estudiantes.edo_civil','estudiantes.condicion','estudiantes.nucleo','estudiantes.etnia','estudiantes.discapacidad','estudiantes.pais','estudiantes.fe_nac',
        'estudiantes.lugar_nac','estudiantes.ciudad','estudiantes.direccion','estudiantes.tel_hab','estudiantes.tel_cel','estudiantes.email')
        ->join('carreras', 'carreras.id', '=', 'estudiantes.carreras_id')->get();
        // return response($estu);
        return view('estudiantedatos.index', compact('estu'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'cedula' => [
                'required',
                'max:20',
                Rule::unique('estudiantes','cedula'),
            ],
            'nombres' =>['required'],
            'primer_apellido' =>[],
            'segundo_apellido' =>[],
            'carrera' =>['required'],
            'fe_ingreso' =>['required'],
            'inicio_programa' =>['required'],
            'sexo' =>['required'],
            'sanguineo' =>['required'],
            'edo_civil' =>['required'],
            'condicion' =>['required'],
            'nucleo' =>['required'],
            'etnia' =>['required'],
            'discapacidad' =>['required'],
            'pais' =>['required'],
            'etnia' =>['required'],
            'fe_nac' =>['required'],
            'lugar_nac' =>['required'],
            'ciudad' =>['required'],
            'direccion' =>['required'],
            'tel_hab' =>['max:15'],
            'tel_cel' =>['max:15'],
            'email' => [
                'required',
                'max:100',
                'email',
                Rule::unique('estudiantes','email'),
            ]
        ],[],[
            'cedula' => '',
            'nombres' => '',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'carrera'=> '',
            'fe_ingreso' => '',
            'inicio_programa' => '',
            'sexo' => '',
            'sanguineo' => '',
            'edo_civil'=> '',
            'condicion' => '',
            'nucleo' => '',
            'etnia' => '',
            'discapacidad' => '',
            'pais'=> '',
            'etnia' => '',
            'fe_nac' => '',
            'lugar_nac' => '',
            'ciudad' => '',
            'direccion'=> '',
            'tel_hab' => '',
            'tel_cel' => '',
            'email' => '',
        ]);

            $data = $request->all();

            $estud_st =  Estudiantes::create([
            'cedula'=> $data['cedula'],
            'nombres'=> $data['nombres'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'carreras_id'=> $data['carrera'],
            'fe_ingreso'=> $data['fe_ingreso'],
            'inicio_programa'=> $data['inicio_programa'],
            'sexo'=> $data['sexo'],
            'sanguineo'=> $data['sanguineo'],
            'edo_civil'=> $data['edo_civil'],
            'condicion'=> $data['condicion'],
            'nucleo'=> $data['nucleo'],
            'etnia'=> $data['etnia'],
            'discapacidad'=> $data['discapacidad'],
            'pais'=> $data['pais'],
            'fe_nac'=> $data['fe_nac'],
            'lugar_nac'=> $data['lugar_nac'],
            'ciudad'=> $data['ciudad'],
            'direccion'=> $data['direccion'],
            'tel_hab'=> $data['tel_hab'],
            'tel_cel'=> $data['tel_cel'],
            'email'=> $data['email']
        ]);

        $messege = $estud_st ? 'Estudiante Creado Correctamente' : 'Error al agregar';
        return redirect()->route('estudiantedatos.index')->with('mensaje', $messege);
    }

    public function edit($id)
    {
        $estudent = Estudiantes::find($id);
        $carrera_estuden = carrera::find($estudent->id_carrera);
        $all_carreras = carrera::all();
        $data=[
            'estudent'=>$estudent,
            'carreras'=>$carrera_estuden,
            'all_carreras'=>$all_carreras
        ];
        // dd($data);
        return view('estudiantedatos.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([

            'cedula' => [
                'required',
                'max:20',
                Rule::unique('estudiantes','cedula')->ignore($request->id,'id'),
            ],
            'nombres' =>['required'],
            'primer_apellido' =>['required'],
            'segundo_apellido' =>['required'],
            'carrera' =>['required'],
            'fe_ingreso' =>['required'],
            'inicio_programa' =>['required'],
            'sexo' =>['required'],
            'sanguineo' =>['required'],
            'edo_civil' =>['required'],
            'condicion' =>['required'],
            'nucleo' =>['required'],
            'etnia' =>['required'],
            'discapacidad' =>['required'],
            'pais' =>['required'],
            'etnia' =>['required'],
            'fe_nac' =>['required'],
            'lugar_nac' =>['required'],
            'ciudad' =>['required'],
            'direccion' =>['required'],
            'tel_hab' =>['required','max:15'],
            'tel_cel' =>['required','max:15'],
            'email' => [
                'required',
                'max:100',
                'email',
                Rule::unique('estudiantes','email')->ignore($request->id,'id'),
            ]
        ],[],[
            'cedula' => '',
            'nombres' => '',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'carrera'=> '',
            'fe_ingreso' => '',
            'inicio_programa' => '',
            'sexo' => '',
            'sanguineo' => '',
            'edo_civil'=> '',
            'condicion' => '',
            'nucleo' => '',
            'etnia' => '',
            'discapacidad' => '',
            'pais'=> '',
            'etnia' => '',
            'fe_nac' => '',
            'lugar_nac' => '',
            'ciudad' => '',
            'direccion'=> '',
            'tel_hab' => '',
            'tel_cel' => '',
            'email' => '',
        ]);

        $data = $request->all();

        $estud_st =  Estudiantes::where('id',$data['id'])->update([
        'cedula'=> $data['cedula'],
        'nombres'=> $data['nombres'],
        'primer_apellido'=> $data['primer_apellido'],
        'segundo_apellido'=> $data['segundo_apellido'],
        'carreras_id'=> $data['carrera'],
        'fe_ingreso'=> $data['fe_ingreso'],
        'inicio_programa'=> $data['inicio_programa'],
        'sexo'=> $data['sexo'],
        'sanguineo'=> $data['sanguineo'],
        'edo_civil'=> $data['edo_civil'],
        'condicion'=> $data['condicion'],
        'nucleo'=> $data['nucleo'],
        'etnia'=> $data['etnia'],
        'discapacidad'=> $data['discapacidad'],
        'pais'=> $data['pais'],
        'fe_nac'=> $data['fe_nac'],
        'lugar_nac'=> $data['lugar_nac'],
        'ciudad'=> $data['ciudad'],
        'direccion'=> $data['direccion'],
        'tel_hab'=> $data['tel_hab'],
        'tel_cel'=> $data['tel_cel'],
        'email'=> $data['email']
    ]);

    $messege = $estud_st ? 'Estudiante Actualizado Correctamente' : 'Error al actualizar';
    return redirect()->route('estudiantedatos.index')->with('mensaje', $messege);

    }

    public function create()
    {
        $carreras = carrera::all();
        return view('estudiantedatos.create',compact('carreras'));

    }

    public function login()
    {
       return redirect()->route('login');
    }

    public function create_cc_estudiante()
    {
        $cc_estudiante = Estudiantes::all();

        return view('estudiantedatos.create_cc_estudiante',compact('cc_estudiante'));
    }

    public function index_cc_estudiante()
    {
        $estcs = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.nombres',
        'estudiantes.primer_apellido','estudiantes.segundo_apellido','estudiantes.email','estudiantecomunitarios.semestre',
        'estudiantecomunitarios.seccion','estudiantecomunitarios.turno','estudiantecomunitarios.created_at')
        ->join('estudiantecomunitarios','estudiantecomunitarios.estudiantes_id', '=', 'estudiantes.id')->get();

        // return response($estcs);
        return view('estudiantedatos.index_cc_estudiante', compact('estcs'));
    }

    public function store_cc_estudiante(Request $request)
    {


        $request->validate([

            'estudiantes_id' => [
                'required',
                Rule::unique('estudiantecomunitarios','estudiantes_id')->ignore($request->id,'id'),
            ],
            'semestre' =>['required'],
            'turno' =>['required'],
            'seccion' =>['required'],


        ],[],[

            'estudiantes_id' => 'Estudiante',
            'semestre' => 'Semestre',
            'turno' => 'Turno',
            'seccion' => 'Sección',
        ]);



            $data = $request->all();
           // dd($data);
            $estudiante_cc =  Estudiantecomunitarios::create([

            'estudiantes_id'=> $data['estudiantes_id'],
            'semestre'=> $data['semestre'],
            'turno'=> $data['turno'],
            'seccion'=> $data['seccion'],

        ]);

        // dd($data);

        $messege = $estudiante_cc ? 'Estudiante Creado Correctamente' : 'Error al agregar';
        return redirect()->route('estudiantedatos.index_cc_estudiante')->with('mensaje', $messege);
    }

    public function edit_cc_estudiante($id)
    {
        $estudent = Estudiantecomunitarios::where('estudiantes_id',$id)->first();

        $cc_estudiante = Estudiantes::all();

        return view('estudiantedatos.edit_cc_estudiante',compact('estudent','cc_estudiante'));

    }

    public function update_cc_estudiante(Request $request)
    {

        $request->validate([


            'semestre' =>['required'],
            'turno' =>['required'],
            'seccion' =>['required'],


        ],[],[


            'semestre' => '',
            'turno' => '',
            'seccion' => '',
        ]);



            $data = $request->all();
        //    dd($data);
            $estudiante_cc =  Estudiantecomunitarios::where('estudiantes_id',$data['id'])->update([
                'semestre'=> $data['semestre'],
                'turno'=> $data['turno'],
                'seccion'=> $data['seccion'],
            ]);

    $messege = $estudiante_cc ? 'Estudiante Actualizado Correctamente' : 'Error al actualizar';
    return redirect()->route('estudiantedatos.index_cc_estudiante')->with('mensaje', $messege);

    }


       public function importdocexcel(Request $request){

            $request->validate([

            'exceldocumento' => [
                'required',
                'file',
                'mimes:xlsx'
            ],

            ],[],[
                'exceldocumento' => 'archivo',
            ]);

            $file = $request->file('exceldocumento');
            // dd($request);
            Excel::import (new importexcel, $file );

            
            return redirect()->route('estudiantedatos.index')->with('mensaje', 'Estudiantes importados correctamente');
    }

     public function import_student_ssc_secretaria()
    {
        return view('estudiantedatos.add_secretaria_import');
    }



    public function import_student_sc_add()
    {
        return view('estudiantedatos.add_import_student_sc');
    }

    public function store_import_exel_sc(Request $request)
    {
        $request->validate([

            'import_file' => [
                'required',
                'file',
                'mimes:xlsx'
            ],

        ],[],[
            'import_file' => 'archivo',
        ]);

        $file = $request->file('import_file');

        Excel::import(new EstudiateServicioImport, $file);

        $student_hoy = Estudiantes::where('import_control',true)->whereDate('created_at', \Carbon\Carbon::today())->get();

        foreach($student_hoy as $key=>$student){
            if (!$student->string_sevicio_comunitario == null) {

                $student_verif = Estudiantes::where('cedula',$student->cedula)->where('import_control',false)->get();
                if (count($student_verif )) {
                    Estudiantes::where('id',$student->id)->delete();
                }else{
                    $fase_n =1;
                    $dos_fases =false;
                    $nota_one = null;
                    $observacion_one = null;
                    $array_asig =  explode(",", $student->string_sevicio_comunitario);

                    if (count($array_asig)==1) {
                        if ($array_asig[0] == "TALLER DE SERVICIO COMUNITARIO") {
                            $fase_n =1;
                        }else{
                            $fase_n =2;
                            $nota_one = 20;
                            $observacion_one = "Aprobado";
                        }
                    }else{
                        $fase_n =1;
                        $dos_fases = true;
                    }
                    Estudiantecomunitarios::create([
                        'estudiantes_id'=>$student->id,
                        // 'semestre',
                        'all_fase'=>$dos_fases,
                        'turno'=>$student->turno,
                        'fase'=>$fase_n,
                        'nota_one'=>$nota_one,
                        'observacion_fase_one'=>$observacion_one
                    ]);

                    Estudiantes::where('id',$student->id)->update([
                        'recorrido'=>true,
                        'import_control'=>false
                    ]);
                }

            }
        }
        // dd($student_hoy);

        return redirect()->route('estudiantedatos.index_cc_estudiante')->with('mensaje', 'Estudiantes importados correctamente');
    }




}
