<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'lugarDeNacimiento' => 'required',
            'fechaDeNacimiento' => 'required',
            'estadoCivil' => 'required',
            'domicilio' => 'required',
            'dni' => 'required',
            'imagenDniFrente' => 'required',
            'imagenDniDorso' => 'required',
            'email' => 'required',
            'telefonoParticular' => 'required',
            'telefonoDeContacto' => 'required',
            'apellidoMaterno' => 'required',
            'apellidoPaterno' => 'required',
            'conjugeApellidoNombre' => 'required',
            'conjugeDni' => 'required',
        ]);

        //obtenemos la ruta de la imagen y la almacenamos con el metodo "store"
        $ruta_imagenDniFrente = $request['imagenDniFrente']->store('imagenes-dni', 'public');
        $ruta_imagenDniDorso = $request['imagenDniDorso']->store('imagenes-dni', 'public');

        try {
            //Creacion
            Empleado::create([
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'],
                'lugarDeNacimiento' => $data['lugarDeNacimiento'],
                'fechaDeNacimiento' => $data['fechaDeNacimiento'],
                'estadoCivil' => $data['estadoCivil'],
                'domicilio' => $data['domicilio'],
                'dni' => $data['dni'],
                'imagenDniFrente' => $ruta_imagenDniFrente,
                'imagenDniDorso' => $ruta_imagenDniDorso,
                'email' => $data['email'],
                'telefonoParticular' => $data['telefonoParticular'],
                'telefonoDeContacto' => $data['telefonoDeContacto'],
                'apellidoMaterno' => $data['apellidoMaterno'],
                'apellidoPaterno' => $data['apellidoPaterno'],
                'conjugeApellidoNombre' => $data['conjugeApellidoNombre'],
                'conjugeDni' => $data['conjugeDni']
            ]);

            //retorno
            return redirect()->route('empleados.index')->with('Creado', 'El empleado se creó exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('empleados.index')->with('Error', 'Hubo un problema al crear el empleado, vuelta a intentarlo.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
