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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perfil', [\App\Http\Controllers\PerfilController::class, 'index'])->name('perfil');
Route::post('/perfil', [\App\Http\Controllers\PerfilController::class, 'store'])->name('perfil.store');


Route::get('/mis-cursos', [\App\Http\Controllers\CursoController::class, 'index'])->name('cursos');
Route::post('/mi-curso-institucional', [\App\Http\Controllers\CursoController::class, 'storeCursoInstitucional'])->name('curso.store-curso-institucional');
Route::post('/mi-curso-institucional/actualizar', [\App\Http\Controllers\CursoController::class, 'updateCursoInstitucional'])->name('curso.update-curso-institucional');
Route::post('/mi-curso-institucional/eliminar', [\App\Http\Controllers\CursoController::class, 'deleteCursoInstitucional']);

Route::post('/mi-curso-extrainstitucional', [\App\Http\Controllers\CursoController::class, 'storeCursoExtrainstitucional'])->name('curso.store-curso-extrainstitucional');
Route::post('/mi-curso-extrainstitucional/actualizar', [\App\Http\Controllers\CursoController::class, 'updateCursoExtrainstitucional'])->name('curso.update-curso-extrainstitucional');
Route::post('/mi-curso-extrainstitucional/eliminar', [\App\Http\Controllers\CursoController::class, 'deleteCursoExtrainstitucional']);

Route::get('/mis-proyectos', [\App\Http\Controllers\ProyectoController::class, 'index'])->name('proyectos');
Route::post('/mis-proyectos', [\App\Http\Controllers\ProyectoController::class, 'store'])->name('proyecto.store');
Route::post('/mis-proyectos/actualizar', [\App\Http\Controllers\ProyectoController::class, 'update'])->name('proyecto.update');
Route::post('/mis-proyectos/eliminar', [\App\Http\Controllers\ProyectoController::class, 'delete']);

Route::get('/reportes', [\App\Http\Controllers\ReporteController::class, 'index'])->name('reportes');
Route::get('/get-efectivos', [\App\Http\Controllers\ReporteController::class, 'getEfectivos']);
Route::post('/filtrar-efectivos', [\App\Http\Controllers\ReporteController::class, 'filtrarEfectivos']);

Route::get('/reporte-efectivo/{id}', [\App\Http\Controllers\ReporteController::class, 'descargarPDF']);


Route::get('/get-departamentos/{id_division}', [\App\Http\Controllers\UtilsController::class, 'getDepartamentos']);
Route::get('/get-secciones/{id_departamento}', [\App\Http\Controllers\UtilsController::class, 'getSecciones']);
