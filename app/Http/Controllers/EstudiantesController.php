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
        return view('estudiantes');
    }

    public function store()
    {
        return view('');
    }

    public function create()
    {
        return view('');
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
