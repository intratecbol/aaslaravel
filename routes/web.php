<?php

use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

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
Route::apiResource('/curso',App\Http\Controllers\CursoController::class)->middleware('auth');
