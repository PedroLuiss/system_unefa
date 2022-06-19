<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\Estudiantes;
use Illuminate\Http\Request;

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
        $data = $request->all();

        $estud_st=Estudiantes::create([
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

        $messege = $estud_st ? 'Etudiante Creado Correctamente' : 'Error al agregar';
        return redirect()->route('estudiantedatos.index')->with('mensaje', $messege);
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        /*$estud_st=Estudiantes::where('id',$data['cedula'])->update([
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


        return response()->json(['success' => 'Datos Actualizdos correctamente','status' => 200],201);
     */return view('estudiantedatos.edit');
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
