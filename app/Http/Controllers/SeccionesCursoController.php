<?php

namespace App\Http\Controllers;

use App\Models\secciones_curso;
use Illuminate\Http\Request;

class SeccionesCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return secciones_curso::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\secciones_curso  $secciones_curso
     * @return \Illuminate\Http\Response
     */
    public function show(secciones_curso $secciones_curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\secciones_curso  $secciones_curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, secciones_curso $secciones_curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\secciones_curso  $secciones_curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(secciones_curso $secciones_curso)
    {
        //
    }
}
