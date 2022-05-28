<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HijoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrestamistaController;
use App\Http\Controllers\PrestamosController;

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

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

;

require __DIR__.'/auth.php';



Route::resource('usuarios', UserController::class)->middleware(['auth','administrador'])->names('usuarios');
Route::get('/usuarios/contrasena/{usuario}',  [UserController::class,'password'])->middleware(['auth','administrador'])->name('password');
Route::put('/usuarios/actualizarContrasena/{usuario}',  [UserController::class,'updatePassword'])->middleware(['auth','administrador'])->name('updatePassword');


Route::resource('empleados', EmpleadoController::class)->middleware(['auth','adminSocio'])->names('empleados');

//Route::resource('hijos', HijoController::class)->names('hijos');
Route::get('hijos/{empleado}', [HijoController::class,'index'])->middleware(['auth','adminSocio'])->name('hijos.index');
Route::get('hijos/create/{empleado}', [HijoController::class,'create'])->middleware(['auth','adminSocio'])->name('hijos.create');
Route::post('hijos/{empleado}', [HijoController::class,'store'])->middleware(['auth','adminSocio'])->name('hijos.store');
Route::post('hijos/{empleado}', [HijoController::class,'store'])->middleware(['auth','adminSocio'])->name('hijos.store');
Route::get('hijos/{hijo}/{empleado}/edit', [HijoController::class,'edit'])->middleware(['auth','adminSocio'])->name('hijos.edit');
Route::put('hijos/{hijo}/{empleado}', [HijoController::class,'update'])->middleware(['auth','adminSocio'])->name('hijos.update');
Route::delete('hijos/{hijo}/{empleado}', [HijoController::class,'destroy'])->middleware(['auth','adminSocio'])->name('hijos.destroy');


Route::resource('prestamistas', PrestamistaController::class)->middleware(['auth','adminSocio'])->names('prestamistas');
Route::resource('prestamos', PrestamoController::class)->middleware(['auth','adminSocio'])->names('prestamos');
