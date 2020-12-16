<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profesor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = $request->file('image')->store('archivos/imagenes/fotos/');

//        return $path;
//        DB::table('personas')->insert(['Id_Tipo_Documento'=>'1','Fecha_Nac_Persona'=>'2000-01-01']);
        DB::table('personas')->insert([
            'Id_Tipo_Documento' => '1',
            'Nombre_Persona'=>'JOSE',
            'Ap_Paterno_Persona'=>'a',
            'Ap_Materno_Persona'=>'a',
//            'Id_Tipo_Documento'=>'a',
            'Num_Documento_Persona'=>'123',
            'Ext_Documento_Persona'=>'a',
            'Sexo_Persona'=>'M',
            'Direccion_Persona'=>'a',
            'Ciudad_Persona'=>'a',
            'Provincia_Persona'=>'a',
            'Estado_Civil_Persona'=>'a',
            'Nacionalidad_Persona'=>'a',
            'Lugar_Nac_Persona'=>'a',
            'Telefono_Persona'=>'a',
            'Celular_Persona'=>'a',
            'Email_Persona'=>'a',
            'Url_Foto'=>$path,
            'Fec_Reg_Persona'=>'2020-01-01',
//            'Celular_Persona'=>'a',
            'Estado_Persona'=>'1',
            'Fecha_Nac_Persona' => '2020-12-15'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        //
    }
}
