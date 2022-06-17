<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'login']);
Auth::routes();


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/estudiantedatos', [App\Http\Controllers\EstudiantesController::class, 'index'])->name('estudiantedatos.index');
    Route::get('/estudiantedatos/create', [App\Http\Controllers\EstudiantesController::class, 'create'])->name('estudiantedatos.create');
    Route::post('/estudiantedatos',[App\Http\Controllers\EstudiantesController::class, 'store'])->name('estudiantedatos.store');


    /**---------------------------------------------------------Expedientes--------------------------------------------------------- */
    Route::get('/expedientes/ingenieria-de-sistemas', [App\Http\Controllers\ExpedientesController::class, 'ing_sistem_index'])->name('expedientes.ingsistemas.index');
    Route::get('/expedientes/ingenieria-de-sistemas/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_sistem_edit'])->name('expedientes.ingsistemas.edit');
    Route::get('/expedientes/ingenieria-de-sistemas/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_sistem_create'])->name('expedientes.ingsistemas.create');
    /**---------------------------------------------------------End Expedientes--------------------------------------------------------- */



 /**-------------------------------------------------------------------------Expedientes----------------------------------------------------------- */

//  Ingenieria de sistemas
 Route::post('expedientes/store_file_expedientes_ig_sitem',[App\Http\Controllers\ExpedientesController::class,'store_file_expedientes_ig_sitem'])->name('expedientes.file.store');
 Route::get('expedientes/sistemas/{id}/get_files_ing_sistemas',[App\Http\Controllers\ExpedientesController::class,'get_files_ing_sistemas']);
 Route::delete('expedientes/delete_file_ing_sistemas/{id}',[App\Http\Controllers\ExpedientesController::class, 'delete_file_ing_sistemas']);
 Route::get('expedientes/empaquetar_student/{id}',[App\Http\Controllers\ExpedientesController::class, 'empaquetar_student'])->name('expedientes.empaquetar.student');

 /**-------------------------------------------------------------------------End Expedientes--------------------------------------------------------- */


 /**-------------------------------------------------------------------------Expedientes Carreras----------------------------------------------------------- */
 Route::get('expedientes-carreras/index',[App\Http\Controllers\ExpedienteCarrerasController::class,'index'])->name('expedientes.carreras.index');
 Route::get('expedientes/empaquetar_nucleo',[App\Http\Controllers\ExpedientesController::class, 'empaquetar_nucleo'])->name('expedientes.empaquetar.nucleo');
 /**-------------------------------------------------------------------------End Expedientes Carreras----------------------------------------------------------- */

});

