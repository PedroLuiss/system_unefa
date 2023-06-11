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

        $profe_all = Profesore::All();

        return view('profesoresdatos.index', compact('profe_all'));
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
        if ($request->tipo_perfil == "") {
            $request->validate([

                'cedula' => [
                    'required',
                    'max:20',
                    Rule::unique('profesores','cedula'),
                ],
                'email' => [
                    'required',
                    Rule::unique('profesores','email'),
                ],
                'nombres' =>['required'],
                'primer_apellido' =>[],
                'segundo_apellido' =>[],
                'especialidad' =>['required'],
                'tipo_perfil' =>['required'],


            ],[],[
                'cedula' => '',
                'nombres' => '',
                'primer_apellido' => '',
                'segundo_apellido' => '',
                'especialidad' => '',
                'email' => 'Email',
                'tipo_perfil' => 'tipo perfil',
            ]);
        }else if ($request->tipo_perfil == "ADMINISTRATIVO") {
            $request->validate([

                'cedula' => [
                    'required',
                    'max:20',
                    Rule::unique('profesores','cedula'),
                ],
                'email' => [
                    'required',
                    Rule::unique('profesores','email'),
                ],
                'nombres' =>['required'],
                'primer_apellido' =>[],
                'segundo_apellido' =>[],
                'especialidad' =>['required'],
                'tipo_perfil' =>['required'],
                'tipo_perfil_unidad_admi' =>['required'],


            ],[],[
                'cedula' => '',
                'nombres' => '',
                'primer_apellido' => '',
                'segundo_apellido' => '',
                'especialidad' => '',
                'email' => 'Email',
                'tipo_perfil' => 'tipo perfil',
                'tipo_perfil_unidad_admi' => 'unidad',
            ]);
        }else{
            $request->validate([

                'cedula' => [
                    'required',
                    'max:20',
                    Rule::unique('profesores','cedula'),
                ],
                'email' => [
                    'required',
                    Rule::unique('profesores','email'),
                ],
                'nombres' =>['required'],
                'primer_apellido' =>[],
                'segundo_apellido' =>[],
                'especialidad' =>['required'],
                'tipo_perfil' =>['required'],
                'tipo_perfil_unidad_doce' =>['required'],


            ],[],[
                'cedula' => '',
                'nombres' => '',
                'primer_apellido' => '',
                'segundo_apellido' => '',
                'especialidad' => '',
                'email' => 'Email',
                'tipo_perfil' => 'tipo perfil',
                'tipo_perfil_unidad_doce' => 'tipo',
            ]);
        }

        // dd($request);
            $data = $request->all();
        $profe_st =  Profesore::create([
            'cedula'=> $data['cedula'],
            'nombre'=> $data['nombres'],
            'email'=> $data['email'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'especialidad'=> $data['especialidad'],
            'tipo_perfil'=> $data['tipo_perfil'],
            'tipo_perfil_unidad_admi'=> $data['tipo_perfil_unidad_admi'],
            'tipo_perfil_unidad_doce'=> $data['tipo_perfil_unidad_doce'],

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
        $profe_ed = Profesore::find($id);


        return view('profesoresdatos.edit',compact('profe_ed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([

            'cedula' => [
                'required',
                'max:20',
                Rule::unique('profesores','cedula')->ignore($request->id,'id'),
            ],
            'email' => [
                'required',
                Rule::unique('profesores','email')->ignore($request->id,'id'),
            ],
            'nombres' =>['required'],
            'primer_apellido' =>[],
            'segundo_apellido' =>[],
            'especialidad' =>['required'],
            'tipo_perfil' =>['required'],


        ],[],[
            'cedula' => '',
            'nombres' => '',
            'primer_apellido' => '',
            'segundo_apellido' => '',
            'especialidad' => '',
            'tipo_perfil' => '',
            'email' => '',

        ]);
        // dd($request);
        $data = $request->all();
        $profe_st =  Profesore::where('id',$data['id'])->update([
            'cedula'=> $data['cedula'],
            'nombre'=> $data['nombres'],
            'email'=> $data['email'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'especialidad'=> $data['especialidad'],
            'tipo_perfil'=> $data['tipo_perfil'],
            'tipo_perfil_unidad_admi'=> $data['tipo_perfil_unidad_admi'],
            'tipo_perfil_unidad_doce'=> $data['tipo_perfil_unidad_doce'],

        ]);

        $messege = $profe_st ? 'Profesores Actualizado Correctamente' : 'Error al actualizar';
        return redirect()->route('profesoresdatos.index')->with('mensaje', $messege);
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
