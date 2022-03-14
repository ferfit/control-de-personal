<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $empleados = Empleado::all();

        return view('dashboard',compact('empleados'));
    }
}
