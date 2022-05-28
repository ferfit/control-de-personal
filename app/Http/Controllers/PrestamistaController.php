<?php

namespace App\Http\Controllers;

use App\Models\Prestamista;
use Illuminate\Http\Request;

class PrestamistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamistas = Prestamista::paginate(20);
        return view('admin.prestamistas.index',compact('prestamistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prestamistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'logo' => 'nullable',
            'nombre' => 'required',
            'whatsapp' => 'required',
            'limiteDiario' => 'required',
            'descripcion' => 'nullable',
        ]);

        $ruta_logo = null;


        //Creacion
        Prestamista::create([
            'logo' => $ruta_logo,
            'nombre' => $data['nombre'],
            'whatsapp' => $data['whatsapp'],
            'limiteDiario' => $data['limiteDiario'],
            'descripcion' => $data['descripcion'],

            /* 'imagenDniFrente' => $ruta_imagenDniFrente,
            'imagenDniDorso' => $ruta_imagenDniDorso,
 */
        ]);

        return redirect()->route('prestamistas.index')->with('Creado', 'El prestamista se creó exitosamente.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamista  $prestamista
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamista $prestamista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamista  $prestamista
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamista $prestamista)
    {
        return view('admin.prestamistas.edit',compact('prestamista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamista  $prestamista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamista $prestamista)
    {
        $data = request()->validate([
            'logo' => 'nullable',
            'nombre' => 'required',
            'whatsapp' => 'required',
            'limiteDiario' => 'required',
            'descripcion' => 'nullable',
        ]);

        $ruta_logo = null;

        //Actualiza datos
        $prestamista->logo =  NULL;
        $prestamista->nombre = $data['nombre'];
        $prestamista->whatsapp = $data['whatsapp'];
        $prestamista->limiteDiario = $data['limiteDiario'];
        $prestamista->descripcion = $data['descripcion'];
        $prestamista->save();

        return redirect()->route('prestamistas.index')->with('Actualizado', 'Datos del prestamista actualizados exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamista  $prestamista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamista $prestamista)
    {
        $prestamista->delete();

        return redirect()->route('prestamistas.index')->with('Borrado', 'Empleado borrado exitosamente.');

    }
}
