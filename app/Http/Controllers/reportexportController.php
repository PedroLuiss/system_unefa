<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoSCEstudiante;
use App\Models\Estudiantes;
use App\Models\Estudiantecomunitarios;
use Excel;
use Maatwebsite\Excel\Facades\Fxcel;
use App\Exports\UsersExport;

class reportexportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        // $estudiante_c = Estudiantes::all();

        // $estudicomunitario = GrupoSCEstudiante::select('grupo_s_c_estudiantes.estudiantes_id','estudiantecomunitarios.semestre')
        // ->join('Estudiantecomunitarios', 'Estudiantecomunitarios.estudiantes_id', '=', 'grupo_s_c_estudiantes.estudiantes_id')->get();

        // $data =[

        //     'estudiante_c' => $estudiante_c,
        //     'estudicomunitario' => $estudicomunitario,
        // ];
        
        // dd($data);
        // dd($datosreport);
       return view('reporte.index');
    }


    public function  exportar_csc(){

        $dat = Estudiantes::all();

        return Excel::download(new UsersExport ,'reporte.xlsx');

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
