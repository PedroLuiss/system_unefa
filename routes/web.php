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
    Route::get('/estudiantedatos/{id}/edit',[App\Http\Controllers\EstudiantesController::class, 'edit'])->name('estudiantedatos.edit');
    Route::put('/estudiantedatos/update',[App\Http\Controllers\EstudiantesController::class, 'update'])->name('estudiantedatos.update');

    /**---------------------------------------------------------Expedientes--------------------------------------------------------- */
    Route::get('/expedientes/ingenieria-de-sistemas', [App\Http\Controllers\ExpedientesController::class, 'ing_sistem_index'])->name('expedientes.ingsistemas.index');

    Route::get('/expedientes/ingenieria-de-sistemas/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_sistem_edit'])->name('expedientes.ingsistemas.edit');
    Route::get('/expedientes/ingenieria-de-sistemas/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_sistem_create'])->name('expedientes.ingsistemas.create');
    /**---------------------------------------------------------End Expedientes--------------------------------------------------------- */

//electrica
Route::get('/expedientes/ingenieria-electrica', [App\Http\Controllers\ExpedientesController::class, 'ing_electrica_index'])->name('expedientes.ingelectrica.index');
Route::get('/expedientes/ingenieria-electrica/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_electrica_create'])->name('expedientes.ingelectrica.create');
Route::get('/expedientes/ingenieria-electrica/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_electrica_edit'])->name('expedientes.ingelectrica.edit');

//Agronomia
Route::get('/expedientes/ingenieria-agronomica', [App\Http\Controllers\ExpedientesController::class, 'ing_agronomica_index'])->name('expedientes.ingagronomica.index');
Route::get('/expedientes/ingenieria-agronomica/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_agronomica_create']);
Route::get('/expedientes/ingenieria-agronomica/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_agronomica_edit']);

//Administracion
Route::get('/expedientes/administracion', [App\Http\Controllers\ExpedientesController::class, 'ing_administracion_index'])->name('expedientes.administracion.index');
Route::get('/expedientes/administracion/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_administracion_create'])->name('expedientes.administracion.create');
Route::get('/expedientes/administracion/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_administracion_edit'])->name('expedientes.administracion.edit');

//Enfermeria
Route::get('/expedientes/enfermeria', [App\Http\Controllers\ExpedientesController::class, 'ing_enfermeria_index'])->name('expedientes.enfermeria.index');
Route::get('/expedientes/enfermeria/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_enfermeria_create'])->name('expedientes.enfermeria.create');
Route::get('/expedientes/enfermeria/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_enfermeria_edit'])->name('expedientes.enfermeria.edit');

//Economia
Route::get('/expedientes/economia', [App\Http\Controllers\ExpedientesController::class, 'ing_economia_index'])->name('expedientes.economia.index');
Route::get('/expedientes/economia/crear', [App\Http\Controllers\ExpedientesController::class, 'ing_economia_create'])->name('expedientes.economia.create');
Route::get('/expedientes/economia/{id}/edit', [App\Http\Controllers\ExpedientesController::class, 'ing_economia_edit'])->name('expedientes.economia.edit');


 /**-------------------------------------------------------------------------Expedientes----------------------------------------------------------- */

//  Ingenieria de sistemas
 Route::post('expedientes/store_file_expedientes_ig_sitem',[App\Http\Controllers\ExpedientesController::class,'store_file_expedientes_ig_sitem'])->name('expedientes.file.store');
 Route::get('expedientes/sistemas/{id}/get_files_ing_sistemas',[App\Http\Controllers\ExpedientesController::class,'get_files_ing_sistemas']);
 Route::delete('expedientes/delete_file_ing_sistemas/{id}',[App\Http\Controllers\ExpedientesController::class, 'delete_file_ing_sistemas']);
 Route::get('expedientes/empaquetar_student/{id}',[App\Http\Controllers\ExpedientesController::class, 'empaquetar_student'])->name('expedientes.empaquetar.student');

 /**-------------------------------------------------------------------------End Expedientes--------------------------------------------------------- */


 /**-------------------------------------------------------------------------Expedientes Carreras----------------------------------------------------------- */
 Route::get('expedientes-carreras/index',[App\Http\Controllers\ExpedienteCarrerasController::class,'index'])->name('expedientes.carreras.index');
 Route::get('expedientes/empaquetar_nucleo',[App\Http\Controllers\ExpedienteCarrerasController::class, 'empaquetar_nucleo'])->name('expedientes.empaquetar.nucleo');
 Route::get('expedientes/empaquetar_carrera/{id}',[App\Http\Controllers\ExpedienteCarrerasController::class, 'empaquetar_carrera'])->name('expedientes.empaquetar.cerrara');
 /**-------------------------------------------------------------------------End Expedientes Carreras----------------------------------------------------------- */

});

