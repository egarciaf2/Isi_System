<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmpresaController;
use \App\Http\Controllers\EmpleadoController;
use \App\Http\Controllers\FuncionesController;

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

Route::get('/showImg', [FuncionesController::class, 'showImg']);

Route::get('/', [EmpresaController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::resource('/empresas', EmpresaController::class)->names('empresa')->middleware(['auth']);
Route::resource('/empleados', EmpleadoController::class)->names('empleado')->middleware(['auth']);


require __DIR__.'/auth.php';
