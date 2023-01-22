<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\Profesore;
use Illuminate\Http\Request;

class ServicioComunitarioController extends Controller
{
    public function list_faseone()
    {

      return  view('servicio-comunitario.list-faseone');
    }

    public function faseone_create()
    {
         $estudiantes=Estudiantes::where('carreras_id',1)->get();
         $profesor=Profesore::all();
     return  view('servicio-comunitario.create-faseone',compact('estudiantes','profesor'));
    }
    public function temp_store_student(Request $request)
    {
       return response($request);

    }
}
