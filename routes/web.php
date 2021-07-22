<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmpresaController;

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

Route::any('/', [EmpresaController::class, 'index'])
    ->middleware(['auth'])
    ->name('home');

Route::resource('/empresa', EmpresaController::class)->names('empresa')->middleware(['auth']);
//Route::resource('/empresa', EmpresaController::class)->names('projects')->parameters(['portafolio' => 'project']);


require __DIR__.'/auth.php';
