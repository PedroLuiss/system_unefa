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
        $estu = Estudiantes::select('*')->join('carreras', 'carreras.id', '=', 'estudiantes.carreras_id')->get();

        return view('estudiantedatos.index', compact('estu'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'cedula' =>['required'],
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
            'email' => ['required']

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

    public function edit(Estudiantes $estud_st)
    {
        $carreras = carrera::all();
        return view('estudiantedatos.edit',compact('estud_st','carreras'));
    }

    public function update()
    {

        return view('estudiantedatos.update');
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
}
