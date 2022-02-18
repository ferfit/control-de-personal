<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HijoController;



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


Route::resource('usuarios', UserController::class)->names('usuarios');
Route::resource('empleados', EmpleadoController::class)->names('empleados');
//Route::resource('hijos', HijoController::class)->names('hijos');
Route::get('hijos/{empleado}', [HijoController::class,'index'])->name('hijos.index');
Route::get('hijos/create/{empleado}', [HijoController::class,'create'])->name('hijos.create');
Route::post('hijos/{empleado}', [HijoController::class,'store'])->name('hijos.store');
Route::post('hijos/{empleado}', [HijoController::class,'store'])->name('hijos.store');
Route::get('hijos/{hijo}/{empleado}/edit', [HijoController::class,'edit'])->name('hijos.edit');
Route::put('hijos/{hijo}/{empleado}', [HijoController::class,'update'])->name('hijos.update');
Route::delete('hijos/{hijo}/{empleado}', [HijoController::class,'destroy'])->name('hijos.destroy');
