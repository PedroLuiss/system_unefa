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
        // $estu = new Estudiantes();

        // $estu->cedula = $request->cedula;
        // $estu->nombres = $request->nombres;
        // $estu->primer_apellido = $request->primer_apellido;
        // $estu->segundo_apellido = $request->segundo_apellido;
        // $estu->fe_ingreso = $request->fe_ingreso;
        // $estu->sexo = $request->sexo;
        // $estu->sanguineo = $request->sanguineo;
        // $estu->edo_civil = $request->edo_civil;
        // $estu->condicion = $request->condicion;
        // $estu->nucleo = $request->nucleo;
        // $estu->etnia = $request->etnia;
        // $estu->discapacidad = $request->discapacidad;
        // $estu->pais = $request->pais;
        // $estu->fe_nac = $request->fe_nac;
        // $estu->lugar_nac = $request->lugar_nac;
        // $estu->ciudad = $request->ciudad;
        // $estu->direccion = $request->direccion;
        // $estu->tel_hab = $request->tel_hab;
        // $estu->tel_cel = $request->tel_cel;
        // $estu->inicio_programa = $request->inicio_programa;
        // $estu->email = $request->email;

        // $estu->save();
        $messege = $estud_st ? 'Etudiante Creado Correctamente' : 'Error al agregar';
        return redirect()->route('estudiantedatos.index')->with('mensaje', $messege);
    }

    public function create()
    {
        $carreras = carrera::all();
        return view('estudiantedatos.create',compact('carreras'));
    }

    public function destroy()
    {
        return view('');
    }
    public function login()
    {
       return redirect()->route('login');
    }
}
