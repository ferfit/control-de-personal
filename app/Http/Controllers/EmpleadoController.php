<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('apellido','asc')->paginate(20);

        return view('admin.empleados.index', compact('empleados'));
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

        //return $request;die();
        //Validación
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'lugarDeNacimiento' => 'required',
            'fechaDeNacimiento' => 'required',
            'estadoCivil' => 'required',
            'nacionalidad' => 'required',
            'domicilio' => 'required',
            'dni' => 'required',
            'imagenDniFrente' => 'nullable',
            'imagenDniDorso' => 'nullable',
            'email' => 'required',
            'telefonoParticular' => 'required',
            'telefonoDeContacto' => 'nullable',
            'apellidoMaterno' => 'nullable',
            'apellidoPaterno' => 'nullable',
            'conjugeApellidoNombre' => 'nullable',
            'conjugeDni' => 'nullable',
        ]);

        //obtenemos la ruta de la imagen y la almacenamos con el metodo "store"
        if(request('imagenDniFrente')){
            $ruta_imagenDniFrente = $request['imagenDniFrente']->store('imagenes-dni', 'public');
        } else {
            $ruta_imagenDniFrente = null;
        }

        if(request('imagenDniDorso')){
            $ruta_imagenDniDorso = $request['imagenDniDorso']->store('imagenes-dni', 'public');
        } else {
            $ruta_imagenDniDorso = null;
        }


        try {
            //Creacion
            Empleado::create([
                'nombre' => $data['nombre'],
                'apellido' => $data['apellido'],
                'lugarDeNacimiento' => $data['lugarDeNacimiento'],
                'fechaDeNacimiento' => $data['fechaDeNacimiento'],
                'estadoCivil' => $data['estadoCivil'],
                'nacionalidad' => $data['nacionalidad'],
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
        return view('admin.empleados.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('admin.empleados.edit', compact('empleado'));
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
        //Validación
        $data = request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'lugarDeNacimiento' => 'required',
            'fechaDeNacimiento' => 'required',
            'estadoCivil' => 'required',
            'nacionalidad' => 'required',
            'domicilio' => 'required',
            'dni' => 'required',
            'imagenDniFrente' => 'nullable',
            'imagenDniDorso' => 'nullable',
            'email' => 'required',
            'telefonoParticular' => 'required',
            'telefonoDeContacto' => 'nullable',
            'apellidoMaterno' => 'nullable',
            'apellidoPaterno' => 'nullable',
            'conjugeApellidoNombre' => 'nullable',
            'conjugeDni' => 'nullable',
        ]);


        //si existe una imagen frente
        if (request('imagenDniFrente')) {

            //borra imagen anterior
            $url = 'public/'.$empleado->imagenDniFrente;
            Storage::delete($url);
            //Carga nueva imagen
            $ruta_imagenDniFrente = $request['imagenDniFrente']->store('imagenes-dni', 'public');

        } else if (request('imagen_actual_frente')) {

            $ruta_imagenDniFrente = $request['imagen_actual_frente'];
        } else {

            $ruta_imagenDniFrente = null;
        }

        //si existe una imagen dorso
        if (request('imagenDniDorso')) {
            //borra imagen anterior
            $url = 'public/'.$empleado->imagenDniDorso;
            Storage::delete($url);
            //Carga nueva imagen
            $ruta_imagenDniDorso = $request['imagenDniDorso']->store('imagenes-dni', 'public');
        } else if (request('imagen_actual_dorso')) {

            $ruta_imagenDniDorso = $request['imagen_actual_dorso'];
        } else {

            $ruta_imagenDniDorso = null;
        }


         try {
            //Actualiza datos
            $empleado->nombre =  $data['nombre'];
            $empleado->apellido = $data['apellido'];
            $empleado->lugarDeNacimiento = $data['lugarDeNacimiento'];
            $empleado->fechaDeNacimiento = $data['fechaDeNacimiento'];
            $empleado->estadoCivil = $data['estadoCivil'];
            $empleado->nacionalidad = $data['nacionalidad'];
            $empleado->domicilio = $data['domicilio'];
            $empleado->dni = $data['dni'];
            $empleado->imagenDniFrente = $ruta_imagenDniFrente;
            $empleado->imagenDniDorso = $ruta_imagenDniDorso;
            $empleado->email = $data['email'];
            $empleado->telefonoParticular = $data['telefonoParticular'];
            $empleado->telefonoDeContacto = $data['telefonoDeContacto'];
            $empleado->apellidoMaterno = $data['apellidoMaterno'];
            $empleado->apellidoPaterno = $data['apellidoPaterno'];
            $empleado->conjugeApellidoNombre = $data['conjugeApellidoNombre'];
            $empleado->conjugeDni = $data['conjugeDni'];
            $empleado->save();

            return redirect()->route('empleados.index')->with('Actualizado', 'Datos del empleado actualizados exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('empleados.index')->with('Error', 'Hubo un problema al actualizar los datos del empleado, vuelva a intentarlo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        try {

            $urlFrente = 'public/'.$empleado->imagenDniFrente;
            Storage::delete($urlFrente);
            $urlDorso = 'public/'.$empleado->imagenDniDorso;
            Storage::delete($urlDorso);

            $empleado->delete();
            return redirect()->route('empleados.index')->with('Borrado', 'Empleado borrado exitosamente.');
        } catch (\Throwable $th) {
            return redirect()->route('empleados.index')->with('Error', 'Hubo un problema, vuelta a intentarlo.');
        }
    }
}
