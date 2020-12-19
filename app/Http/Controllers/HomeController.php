<?php

namespace App\Http\Controllers;
include 'librerias/sumas.php';
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //echo sumar(3,4);
        //session('key' => 'value']);
        //$value = session('Cargo_Nivel');
        return view('home');
    }
    public function inicio(){
        $d=DB::table('usuarios_niveles')->where('Nivel_Usuario',Auth::user()->Nivel_Usuario)->first();
        //$users = DB::table('users')->get();
        session(['Cargo_Nivel' => $d->Cargo_Nivel]);
        session(['Nivel_Usuario' => $d->Nivel_Usuario]);
        $d=DB::table('personas')->where('Id_Persona',Auth::user()->Id_Persona)->first();
//        return Auth::user()->Id_Persona;
        session(['Id_Persona' => $d->Id_Persona]);
        session(['Nombre_Persona' => $d->Nombre_Persona]);
        session(['Ap_Paterno_Persona' => $d->Ap_Paterno_Persona]);
        return view('home');
        //return $d->Cargo_Nivel;
    }
    public function  tabla($tabla){
        return DB::table($tabla)->get();
    }
}
