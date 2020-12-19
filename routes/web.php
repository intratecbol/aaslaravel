<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    //session(['key' =>'value']);
    //$value = session('key');

    return view('home');
})->middleware('auth');*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'inicio'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/adm',[App\Http\Controllers\AdministrativoController::class, 'index']);
Route::post('/adm',[App\Http\Controllers\AdministrativoController::class, 'update'])->name('adm');
Route::post('/adminsert',[App\Http\Controllers\AdministrativoController::class, 'storage'])->name('adminsert');
Route::delete('/admdestroy/{id}',[App\Http\Controllers\AdministrativoController::class, 'destroy'])->name('adm.destroy');
Route::get('/contenido_datatables',[App\Http\Controllers\AdministrativoController::class, 'datos']);



Route::get('/fcurso', function () {
    return view('curso');
})->middleware('auth');

Route::get('/portada', function () {
    return view('portada');
})->middleware('auth');


Route::get('/fprofesor', [App\Http\Controllers\ProfesorController::class,'findex'])->middleware('auth');
Route::get('/tabla/{id}',[App\Http\Controllers\HomeController::class,'tabla'])->middleware('auth');
Route::post('/estado/{id}',[App\Http\Controllers\ProfesorController::class,'estado'])->middleware('auth')->name('profesor.estado');
Route::apiResource('/curso',App\Http\Controllers\CursoController::class)->middleware('auth');
Route::apiResource('/seccion',App\Http\Controllers\SeccionesCursoController::class)->middleware('auth');
Route::apiResource('/profesor',App\Http\Controllers\ProfesorController::class)->middleware('auth');
Route::apiResource('/alumno',App\Http\Controllers\AlumnoController::class)->middleware('auth');

Route::apiResource('/seccion',App\Http\Controllers\SeccionesCursoController::class)->middleware('auth');
Route::apiResource('/profesor',App\Http\Controllers\ProfesorController::class)->middleware('auth');
Route::apiResource('/alumno',App\Http\Controllers\AlumnoController::class)->middleware('auth');



Route::apiResource('/cursosalumnos',App\Http\Controllers\ProfesorController::class)->middleware('auth');
Route::apiResource('/asignaturaprofesorcursos',App\Http\Controllers\AlumnoController::class)->middleware('auth');
