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


    //PROFESORES
    Route::get('/profesoresdatos', [App\Http\Controllers\ProfesoresController::class, 'index'])->name('profesoresdatos.index');

    Route::get('/profesoresdatos/create', [App\Http\Controllers\ProfesoresController::class, 'create'])->name('profesoresdatos.create');


    Route::post('/profesoresdatos',[App\Http\Controllers\ProfesoresController::class, 'store'])->name('profesoresdatos.store');

    Route::get('/profesoresdatos/{id}/edit',[App\Http\Controllers\ProfesoresController::class, 'edit'])->name('profesoresdatos.edit');

    Route::put('/profesoresdatos/update',[App\Http\Controllers\ProfesoresController::class, 'update'])->name('profesoresdatos.update');

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

 /**-------------------------------------------------------------------------Servicio Comunitario---------------------------------------------------------- */
 // fase 1
 Route::get('servicio-comunitario/faseone',[App\Http\Controllers\ServicioComunitarioController::class,'list_faseone'])->name('serviciocomunitario.listfaseone');
 Route::get('servicio-comunitario/faseone/crear', [App\Http\Controllers\ServicioComunitarioController::class, 'faseone_create'])->name('faseone.create');
 Route::post('servicio-comunitario/faseone/estudent/store', [App\Http\Controllers\ServicioComunitarioController::class, 'temp_store_student'])->name('faseone.temp_store_student');
 Route::post('servicio-comunitario/faseone/estudent/edit', [App\Http\Controllers\ServicioComunitarioController::class, 'store_student'])->name('faseone.store_student');
 Route::post('servicio-comunitario/faseone/store', [App\Http\Controllers\ServicioComunitarioController::class, 'store_faseone'])->name('faseone.store_faseone');
 Route::post('servicio-comunitario/faseone/update', [App\Http\Controllers\ServicioComunitarioController::class, 'update_faseone'])->name('faseone.update_faseone');
 Route::post('servicio-comunitario/fasetwo/update', [App\Http\Controllers\ServicioComunitarioController::class, 'update_fasetwo'])->name('faseone.update_fasetwo');
 Route::get('servicio-comunitario/faseone/estudent/list_temp_student', [App\Http\Controllers\ServicioComunitarioController::class, 'List_student_temp'])->name('faseone.listtempstudent');
 Route::get('servicio-comunitario/faseone/estudent/list_student/{id_grupo}', [App\Http\Controllers\ServicioComunitarioController::class, 'List_student'])->name('faseone.listtempstudent.edit');
 Route::delete('servicio-comunitario/delete_temp_student/{id}',[App\Http\Controllers\ServicioComunitarioController::class, 'delete_temp_student_list']);
 Route::delete('servicio-comunitario/delete_student/{id}',[App\Http\Controllers\ServicioComunitarioController::class, 'delete_student_list']);
 Route::delete('servicio-comunitario/delet_grupo/{id}',[App\Http\Controllers\ServicioComunitarioController::class, 'delete_grupo']);
 Route::get('servicio-comunitario/faseone/{id}/edit',[App\Http\Controllers\ServicioComunitarioController::class, 'edit_faseone'])->name('faseone.edit');
 Route::get('servicio-comunitario/fasetwo/{id}/edit',[App\Http\Controllers\ServicioComunitarioController::class, 'edit_fasetwo'])->name('fasetwo.edit');
 Route::get('servicio-comunitario/faseone/get_files/{id}',[App\Http\Controllers\ServicioComunitarioController::class, 'get_files_fase_one'])->name('faseone.get_files_fase_one');
 Route::post('servicio-comunitario/store_file_fase_one',[App\Http\Controllers\ServicioComunitarioController::class,'store_file_fase_one'])->name('faseone.file.store');
 Route::get('servicio-comunitario/faseone/{id}/add-nota',[App\Http\Controllers\ServicioComunitarioController::class, 'add_nota_faseone'])->name('faseone.add_nota_faseone');
 Route::get('servicio-comunitario/fasetwo/{id}/add-nota',[App\Http\Controllers\ServicioComunitarioController::class, 'add_nota_fasetwo'])->name('fasetwo.add_nota_fasetwo');
 Route::get('servicio-comunitario/faseone/{id}/views',[App\Http\Controllers\ServicioComunitarioController::class, 'views_faseone'])->name('faseone.views');
 Route::get('servicio-comunitario/fasetwo/{id}/views',[App\Http\Controllers\ServicioComunitarioController::class, 'views_fasetwo'])->name('fasetwo.views');
 Route::put('servicio-comunitario/faseone/add-nota',[App\Http\Controllers\ServicioComunitarioController::class, 'add_nota_student'])->name('faseone.add_nota_student');
 Route::put('servicio-comunitario/faseone/finalizar',[App\Http\Controllers\ServicioComunitarioController::class, 'finalisar_fase_one'])->name('faseone.finalizar');
 Route::post('servicio-comunitario/faseone/store_value_nota',[App\Http\Controllers\ServicioComunitarioController::class,'store_value_nota'])->name('faseone.nota.store');

 // Fase 2
 Route::get('servicio-comunitario/fasetwo',[App\Http\Controllers\ServicioComunitarioController::class,'list_fasetwo'])->name('serviciocomunitario.listfasetwo');
 /**-------------------------------------------------------------------------End Servicio Comunitario----------------------------------------------------------- */


/**-----------------------------------------------------------
Registro estudiantes comunitarios */

Route::get('/estudiantedatos/ccregistro', [App\Http\Controllers\EstudiantesController::class, 'index_cc_estudiante'])->name('estudiantedatos.index_cc_estudiante');

Route::get('/estudiantedatos/ccregistro/create_cc_registro', [App\Http\Controllers\EstudiantesController::class, 'create_cc_estudiante'])->name('estudiantedatos.create_cc_estudiante');

Route::post('/estudiantedatos/ccregistro/store_cc_estudiante',[App\Http\Controllers\EstudiantesController::class, 'store_cc_estudiante'])->name('estudiantedatos.store_cc_estudiante');

Route::get('/estudiantedatos/{id}/ccregistro/edit_cc_registro',[App\Http\Controllers\EstudiantesController::class, 'edit_cc_estudiante'])->name('estudiantedatos.edit_cc_estudiante');

Route::put('/estudiantedatos/ccregistr0/update_cc_registro',[App\Http\Controllers\EstudiantesController::class, 'update_cc_estudiante'])->name('estudiantedatos.update_cc_estudiante');

/**-----------------------------------------------------------
Registro estudiantes comunitarios */


/**Reporte */

Route::get('/estudiantedatos/reporte', [App\Http\Controllers\ReportexportController::class, 'index'])->name('reporte.index');

Route::get('/estudiantedatos/reporte/exportar/{fase}', [App\Http\Controllers\ReportexportController::class, 'exportar_csc'])->name('reporte.exportar_csc');


/**-----------------------------------------------------------
*/

//----------------------------------------------User----------------------------------------------
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
//----------------------------------------------End User----------------------------------------------


Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);

});

