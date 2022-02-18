<?php

namespace App\Http\Controllers;

use App\Models\Hijo;
use App\Models\Empleado;
use Illuminate\Http\Request;

class HijoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $hijos = Hijo::where('empleado_id',$empleado->id)->get();

        return view('admin.hijos.index',compact('hijos','empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('admin.hijos.create',compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Empleado $empleado)
    {
        //Validacion
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required'
        ]);

        try{
        //Crea
        Hijo::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'dni' => $data['dni'],
            'empleado_id' => $empleado->id
        ]);

        //Redirecciona
            return redirect()->route('hijos.index',$empleado)->with('Creado', 'Los datos del hijo/a se crearon exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('hijos.index',$empleado)->with('Error', 'Hubo un problema al crear los datos, vuelta a intentarlo.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hijo  $hijo
     * @return \Illuminate\Http\Response
     */
    public function show(Hijo $hijo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hijo  $hijo
     * @return \Illuminate\Http\Response
     */
    public function edit(Hijo $hijo, Empleado $empleado)
    {
        return view('admin.hijos.edit',compact('hijo','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hijo  $hijo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hijo $hijo,Empleado $empleado)
    {

        //Validacion
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required'
        ]);

        try {
            //Actualiza datos
            $hijo->nombre = $data['nombre'];
            $hijo->apellido = $data['apellido'];
            $hijo->dni = $data['dni'];
            $hijo->save();

            return redirect()->route('hijos.index',$empleado)->with('Actualizado', 'Datos del hijo/a actualizados exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('hijos.index',$empleado)->with('Error', 'Hubo un problema al actualizar los datos, vuelva a intentarlo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hijo  $hijo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hijo $hijo,Empleado $empleado)
    {
        try {
            $hijo->delete();
            return redirect()->route('hijos.index',$empleado)->with('Borrado', 'Datos del hijo/hija borrados exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('hijos.index',$empleado)->with('Error', 'Hubo un problema, vuelta a intentarlo.');
        }
    }
}
