<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

include 'librerias/generar_campos_form.php';

class ProfesorController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
//        return Profesor::with('persona')->get();
//        $datos=Profesor::with('persona')->get();
//        return view('datatables',compact(['datos']));
//        return datatables()->of(Profesor::with('persona')->get())->toJson();
//        $datos=Profesor::with('persona')->get();
//        $datos=Persona::with('profesor')->with('user')->get();
//        return $datos;

        $datos=DB::table('personas')
            ->join('users', 'users.Id_Persona', '=', 'personas.Id_Persona')
            ->join('profesores', 'profesores.Id_Persona', '=', 'personas.Id_Persona')
            ->where('users.Nivel_usuario','3')
//            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
//        return $datos;
        return view('profesores',compact(['datos']));
    }

    public function estado(Request $request,$id){
        $u=User::where('Id_Persona',$id)->get();
//        return  $u[0];
//        exit;
        if ($u->count()>0){
            if ($u[0]->Estado_Usuario==1){
                $u[0]->Estado_Usuario=0;
            }else{
                $u[0]->Estado_Usuario=1;
            }
            $u[0]->save();
            return redirect()->back()->with('success', 'estado saved!');
        }else{
            return redirect()->back()->with('success', 'Usuario no encontrado');
        }

    }


    public function store(Request $request)
    {

        $path = $request->file('image')->store('archivos/imagenes/fotos/');
//        $u=User::where('username','jose')->count();
//        if ($u>0){
//            return "Usuario no disponible";
//            exit;
//        }
        $persona= new Persona();
        $persona->Id_Tipo_Documento= '1';
        $persona->Nombre_Persona='JOSE';
        $persona->Ap_Paterno_Persona='a';
        $persona->Ap_Materno_Persona='a';
        $persona->Num_Documento_Persona='123';
        $persona->Ext_Documento_Persona='a';
        $persona->Sexo_Persona='M';
        $persona->Direccion_Persona='a';
        $persona->Ciudad_Persona='a';
        $persona->Provincia_Persona='a';
        $persona->Estado_Civil_Persona='a';
        $persona->Nacionalidad_Persona='a';
        $persona->Lugar_Nac_Persona='a';
        $persona->Telefono_Persona='a';
        $persona->Celular_Persona='a';
        $persona->Email_Persona='a';
        $persona->Url_Foto=$path;
        $persona->Fec_Reg_Persona='2020-01-01';
        $persona->Estado_Persona='1';
        $persona->Fecha_Nac_Persona='2020-12-15';
        $persona->save();
        $Id_Persona=$persona->Id_Persona;

        $user=new User();
        $user->username='jose';
        $user->password=Hash::make('jose');
        $user->Nivel_Usuario='3';
        $user->Id_Persona=$Id_Persona;
        $user->Estado_Usuario='1';
        $user->save();
        $Id_User=$user->id;

        $profesor=new Profesor();
        $profesor->Id_Persona=$Id_Persona;
        $profesor->Codigo_Profesor='abc';
        $profesor->Fecha_Ingreso=now();
        $profesor->save();
//        $Id_User=$user->id;
//        echo 1;
        return redirect('/profesor')->with('success', 'Contact saved!');
    }


    public function show($id,Request $request)
    {
       


        if ($request->ajax()) {
            //return response()->json($data);
            if(Auth::user()->Nivel_Usuario==1){
                $datos=DB::table('personas')
                ->join('users', 'users.Id_Persona', '=', 'personas.Id_Persona')
                ->join('profesores', 'profesores.Id_Persona', '=', 'personas.Id_Persona')
                ->where('users.Nivel_usuario','3')
                ->where('personas.Id_Persona',$id)
                ->get();
                return $datos;
            }
        }else{
            return redirect('/home');

        }

        //return view($template, $data);
        
        //return view('profesores',compact(['datos']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = $request->file('image')->store('archivos/imagenes/fotos/');
//        $u=User::where('username','jose')->count();
//        if ($u>0){
//            return "Usuario no disponible";
//            exit;
//        }
        $profesor= Profesor::find($id);
//        $profesor->Id_Persona=$Id_Persona;
        $profesor->Codigo_Profesor='abc';
        $profesor->Fecha_Ingreso=now();
        $profesor->save();
        $Id_Persona=$profesor->Id_Persona;


        $persona= Persona::find($Id_Persona);
        $persona->Id_Tipo_Documento= '1';
        $persona->Nombre_Persona='pepe';
        $persona->Ap_Paterno_Persona='a';
        $persona->Ap_Materno_Persona='a';
        $persona->Num_Documento_Persona='123';
        $persona->Ext_Documento_Persona='a';
        $persona->Sexo_Persona='M';
        $persona->Direccion_Persona='a';
        $persona->Ciudad_Persona='a';
        $persona->Provincia_Persona='a';
        $persona->Estado_Civil_Persona='a';
        $persona->Nacionalidad_Persona='a';
        $persona->Lugar_Nac_Persona='a';
        $persona->Telefono_Persona='a';
        $persona->Celular_Persona='a';
        $persona->Email_Persona='a';
        $persona->Url_Foto=$path;
        $persona->Fec_Reg_Persona='2020-01-01';
        $persona->Estado_Persona='1';
        $persona->Fecha_Nac_Persona='2020-12-15';
        $persona->save();

//        $Id_Persona=$persona->Id_Persona;
//echo $Id_Persona;
//    exit;
        $user=User::where('Id_Persona',$Id_Persona)->first();
//        echo $user->id;
//        exit;
//        echo $user->count();
        if ($user->count()>0){
            $user->username='pepe';
            $user->password=Hash::make('jose');
            $user->Nivel_Usuario='3';
//        $user->Id_Persona=$Id_Persona;
            $user->Estado_Usuario='1';
//            var_dump($user) ;
            $user->save();
        }
//        exit;

//        exit;
//        $Id_User=$user->id;

//        $profesor=new Profesor();
//        $profesor->Id_Persona=$Id_Persona;
//        $profesor->Codigo_Profesor='abc';
//        $profesor->Fecha_Ingreso=now();
//        $profesor->save();
//        $Id_User=$user->id;
//        echo 1;
        return redirect('/profesor')->with('success', 'update saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d=Profesor::find($id);
        $d->delete();
        $Id_Persona=$d->Id_Persona;
        $d=Persona::where('Id_Persona',$Id_Persona);
        $d->delete();
        $d=User::where('Id_Persona',$Id_Persona);
        $d->delete();
        return redirect('/profesor')->with('success', 'delete saved!');
    }
}
