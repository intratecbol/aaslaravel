<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(Curso::all())->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d=new Curso();
        $d->Codigo_Curso=$request->Codigo_Curso;
        $d->Nombre_Curso=$request->Nombre_Curso;
        $d->Id_Seccion_Curso=$request->Id_Seccion_Curso;
        $d->Ciclo_Curso	=$request->Ciclo_Curso	;
        $d->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //echo $id;
        //exit;
        if(strlen($request->Codigo_Curso)>10){
            return "El codigo no puede ser mas de 10 caracteres";
        }
        $d=Curso::find($id);
        $d->Codigo_Curso=$request->Codigo_Curso;
        $d->Nombre_Curso=$request->Nombre_Curso;
        $d->Id_Seccion_Curso=$request->Id_Seccion_Curso;
        $d->Ciclo_Curso	=$request->Ciclo_Curso	;
        $d->save();
        return "SI";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Curso::find($id);
        $d->delete();
    }
}
