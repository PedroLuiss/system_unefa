<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use Illuminate\Http\Request;

class ExpedienteCarrerasController extends Controller
{
    public function index()
    {
        $carreras = carrera::all();
      return  view('expediente-carreras.index',compact('carreras'));
    }
}
