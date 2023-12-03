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
        // $image = $request->file('foto');
        // dd($image);die;
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
                'telefono' =>['required'],
                'primer_apellido' =>[],
                'foto' => 'image|mimes:jpeg,png,jpg',
                'segundo_apellido' =>[],
                'especialidad' =>['required'],
                'tipo_perfil' =>['required'],


            ],[],[
                'cedula' => 'cédula',
                'nombres' => 'nombres',
                'primer_apellido' => 'primer apellido',
                'segundo_apellido' => 'segundo apellido',
                'especialidad' => 'especialidad',
                'email' => 'Email',
                'tipo_perfil' => 'tipo perfil',
                'telefono' => 'telefono',
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
                'foto' => 'image|mimes:jpeg,png,jpg',
                'telefono' =>['required'],
                'especialidad' =>['required'],
                'tipo_perfil' =>['required'],
                'tipo_perfil_unidad_admi' =>['required'],


            ],[],[
                'cedula' => 'cédula',
                'nombres' => 'nombres',
                'primer_apellido' => 'primer apellido',
                'segundo_apellido' => 'segundo apellido',
                'especialidad' => 'especialidad',
                'email' => 'Email',
                'tipo_perfil' => 'tipo perfil',
                'tipo_perfil_unidad_admi' => 'unidad',
                'telefono' => 'telefono',
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
                'foto' => 'image|mimes:jpeg,png,jpg',
                'primer_apellido' =>[],
                'segundo_apellido' =>[],
                'telefono' =>['required'],
                'especialidad' =>['required'],
                'tipo_perfil' =>['required'],
                'tipo_perfil_unidad_doce' =>['required'],


            ],[],[
                'cedula' => 'cédula',
                'nombres' => 'nombres',
                'primer_apellido' => 'primer apellido',
                'segundo_apellido' => 'segundo apellido',
                'especialidad' => 'especialidad',
                'email' => 'Email',
                'tipo_perfil' => 'tipo perfil',
                'tipo_perfil_unidad_admi' => 'unidad',
                'telefono' => 'telefono',
            ]);
        }

        // dd($request);
        $data = $request->all();
        $dataSend = [
            'cedula'=> $data['cedula'],
            'nombre'=> $data['nombres'],
            'email'=> $data['email'],
            'telefono'=> $data['telefono'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'especialidad'=> $data['especialidad'],
            'tipo_perfil'=> $data['tipo_perfil'],
            'tipo_perfil_unidad_admi'=> $data['tipo_perfil_unidad_admi'],
            'tipo_perfil_unidad_doce'=> $data['tipo_perfil_unidad_doce'],

        ];
        $file = $request->file('foto');
        if($file){
            $id = uniqid();
            // $filename = $file->getClientOriginalName();
            $filename = $id . '.' . $file->getClientOriginalExtension();
            $foo = \File::extension($filename);
            $nam_patch = $filename;
            $route_file = $nam_patch;
            $path = public_path().DIRECTORY_SEPARATOR."FOTO-PROFESOR";
            $path_guardar = '/FOTO-PROFESOR/'.$route_file;
            $file->move($path,$route_file);
            $dataSend['foto'] = $path_guardar;

        }
        // dd($dataSend); die;
        $profe_st =  Profesore::create($dataSend);

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
            'foto' => 'image|mimes:jpeg,png,jpg',
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
            'foto' => '',

        ]);
        // dd($request);
        $data = $request->all();
        $file = $request->file('foto');

        $dataSend = [
            'cedula'=> $data['cedula'],
            'nombre'=> $data['nombres'],
            'email'=> $data['email'],
            'primer_apellido'=> $data['primer_apellido'],
            'segundo_apellido'=> $data['segundo_apellido'],
            'especialidad'=> $data['especialidad'],
            'tipo_perfil'=> $data['tipo_perfil'],
            'telefono'=> $data['telefono'],
            'tipo_perfil_unidad_admi'=> $data['tipo_perfil_unidad_admi'],
            'tipo_perfil_unidad_doce'=> $data['tipo_perfil_unidad_doce'],

        ];
        if($file){
            $id = uniqid();
            // $filename = $file->getClientOriginalName();
            $filename = $id . '.' . $file->getClientOriginalExtension();
            $foo = \File::extension($filename);
            $nam_patch = $filename;
            $route_file = $nam_patch;
            $path = public_path().DIRECTORY_SEPARATOR."FOTO-PROFESOR";
            $path_guardar = '/FOTO-PROFESOR/'.$route_file;
            $file->move($path,$route_file);
            $dataSend['foto'] = $path_guardar;

        }
        $profe_st =  Profesore::where('id',$data['id'])->update($dataSend);



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
