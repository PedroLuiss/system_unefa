<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\Estudiantes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudiantesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        $estu = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.nombres','estudiantes.primer_apellido',
        'estudiantes.segundo_apellido','carreras.name','estudiantes.fe_ingreso','estudiantes.inicio_programa','estudiantes.sexo','estudiantes.sanguineo',
        'estudiantes.edo_civil','estudiantes.condicion','estudiantes.nucleo','estudiantes.etnia','estudiantes.discapacidad','estudiantes.pais','estudiantes.fe_nac',
        'estudiantes.lugar_nac','estudiantes.ciudad','estudiantes.direccion','estudiantes.tel_hab','estudiantes.tel_cel','estudiantes.email')
        ->join('carreras', 'carreras.id', '=', 'estudiantes.carreras_id')->get();
        // return response($estu);
        return view('estudiantedatos.index_cc_estudiante', compact('estu'));
    }

    public function store_cc_estudiante(Request $request)
    {   

          
        $request->validate([

            'estudiantes_id' =>['required'],
            'semestre' =>['required'],
            'turno' =>['required'],
            'seccion' =>['required'],
            
            
        ],[],[

            'estudiantes_id' => '',
            'semestre' => '',
            'turno' => '',
            'seccion' => '',
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
        $estudent = Estudiantes::find($id);
        $carrera_estuden = carrera::find($estudent->id_carrera);
        $all_carreras = carrera::all();
        $data=[
            'estudent'=>$estudent,
            'carreras'=>$carrera_estuden,
            'all_carreras'=>$all_carreras
        ];

        return view('estudiantedatos.edit',compact('data'));
    }

    public function update_cc_estudiante(Request $request)
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
}
