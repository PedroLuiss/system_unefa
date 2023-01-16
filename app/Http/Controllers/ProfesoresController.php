<?php

namespace App\Http\Controllers;

use App\Models\Profesore;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profesoresdatos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesoresdatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'cedula' => [
                'required',
                'max:20',
                Rule::unique('profesores','cedula'),
            ],
            'nombres' =>['required'],
            'primer_apellido' =>[],
            'segundo_apellido' =>[],
            'especialidad' =>['required'],


        ],[],[
            'cedula' => '',
            'nombres' => '',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'especialidad' => '',

        ]);
        // dd($request);
            $data = $request->all();
        $profe_st =  Profesore::create([
            'cedula'=> $data['cedula'],
            'nombre'=> $data['nombres'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'especialidad'=> $data['especialidad'],

        ]);

        $messege = $profe_st ? 'Profesor Creado Correctamente' : 'Error al agregar';
        return redirect()->route('profesoresdatos.index')->with('mensaje', $messege);
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
