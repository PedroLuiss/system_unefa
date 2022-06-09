<?php

namespace App\Http\Controllers;
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
        $estu = Estudiantes::all();

        return view('estudiantedatos.index', compact('estu'));
    }

    public function store(Request $request)
    {
        $estu = new Estudiantes();

        $estu->cedula = $request->cedula;
        $estu->nombres = $request->nombres;
        $estu->primer_apellido = $request->primer_apellido;
        $estu->segundo_apellido = $request->segundo_apellido;
        $estu->fe_ingreso = $request->fe_ingreso;
        $estu->sexo = $request->sexo;
        $estu->sanguineo = $request->sanguineo;
        $estu->edo_civil = $request->edo_civil;
        $estu->condicion = $request->condicion;
        $estu->nucleo = $request->nucleo;
        $estu->etnia = $request->etnia;
        $estu->discapacidad = $request->discapacidad;
        $estu->pais = $request->pais;
        $estu->fe_nac = $request->fe_nac;
        $estu->lugar_nac = $request->lugar_nac;
        $estu->ciudad = $request->ciudad;
        $estu->direccion = $request->direccion;
        $estu->tel_hab = $request->tel_hab;
        $estu->tel_cel = $request->tel_cel;
        $estu->inicio_programa = $request->inicio_programa;
        $estu->email = $request->email;

        $estu->save();
    }

    public function create()
    {
        return view('estudiantedatos.create');
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
