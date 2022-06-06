<?php

namespace App\Http\Controllers;

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
        return view('estudiantedatos.index');
    }

    public function store()
    {
        return view('');
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
