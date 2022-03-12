<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HijoController;
use Illuminate\Support\Facades\Auth;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::resource('usuarios', UserController::class)->middleware(['auth'])->names('usuarios');
Route::get('/usuarios/contrasena/{usuario}',  [UserController::class,'password'])->name('password');
Route::put('/usuarios/actualizarContrasena/{usuario}',  [UserController::class,'updatePassword'])->name('updatePassword');


Route::resource('empleados', EmpleadoController::class)->middleware(['auth'])->names('empleados');
//Route::resource('hijos', HijoController::class)->names('hijos');
Route::get('hijos/{empleado}', [HijoController::class,'index'])->middleware(['auth'])->name('hijos.index');
Route::get('hijos/create/{empleado}', [HijoController::class,'create'])->middleware(['auth'])->name('hijos.create');
Route::post('hijos/{empleado}', [HijoController::class,'store'])->middleware(['auth'])->name('hijos.store');
Route::post('hijos/{empleado}', [HijoController::class,'store'])->middleware(['auth'])->name('hijos.store');
Route::get('hijos/{hijo}/{empleado}/edit', [HijoController::class,'edit'])->middleware(['auth'])->name('hijos.edit');
Route::put('hijos/{hijo}/{empleado}', [HijoController::class,'update'])->middleware(['auth'])->name('hijos.update');
Route::delete('hijos/{hijo}/{empleado}', [HijoController::class,'destroy'])->middleware(['auth'])->name('hijos.destroy');
