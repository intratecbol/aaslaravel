<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AdministrativoController extends Controller
{
    function index(){
        //return Administrativo::all();
        $datos=Usuario::all();
        return view('datatables',compact(['datos']));
    }
    function update(Request $request){
        
        $usuario=Usuario::find($request->id);
        $usuario->Usuario_Usuario=$request->Usuario_Usuario;
        $usuario->save();
        return redirect()->back()->with('success','Datos actualizado');
    }
    function destroy($id){
        
        $usuario=Usuario::find($id);
        $usuario->delete();
        return redirect()->back()->with('success','Datos eliminado');
    }
    function storage(Request $request){
        
        $usuario=new Usuario();
        $usuario->Usuario_Usuario=$request->Usuario_Usuario;
        $usuario->Password_Usuario=$request->Password_Usuario;
        $usuario->Nivel_Usuario=1;
        $usuario->Id_Persona=1;
        
        $usuario->Estado_Usuario=1;
        $usuario->save();
        return redirect()->back()->with('success','Datos creado');
    }
    public function datos(){
        return datatables()->of(Usuario::all())->toJson();

    }
    
}
