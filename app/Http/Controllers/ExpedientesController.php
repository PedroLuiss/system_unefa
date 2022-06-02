<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpedientesController extends Controller
{
   public function ing_sistem_index()
   {
     return  view('expedientes.ing-sistema.index');
   }

   public function ing_sistem_create()
   {

    return  view('expedientes.ing-sistema.create');
   }
}
