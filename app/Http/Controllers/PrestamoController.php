<?php

namespace App\Http\Controllers;

use App\Models\Prestamista;
use App\Models\Prestamo;
use Illuminate\Http\Request;


class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamo::paginate(20);
        return view('admin.prestamos.index',compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestamistas = Prestamista::all();
        return view('admin.prestamos.create',compact('prestamistas'));
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
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'monto' => 'required',
            'prestamista' => 'required'
        ]);


        //Creacion
        Prestamo::create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'monto' => $data['monto'],
            'prestamista_id' => $data['prestamista'],

        ]);

        return redirect()->route('prestamos.index')->with('Creado', 'El prestamo se creó exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        $prestamistas = Prestamista::all();

        return view('admin.prestamos.edit',compact('prestamistas','prestamo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        $data = request()->validate([
            'titulo' => 'required',
            'descripcion' => 'nullable',
            'monto' => 'required',
            'prestamista' => 'required'
        ]);

        //Actualiza datos
        $prestamo->titulo = $data['titulo'];
        $prestamo->descripcion = $data['descripcion'];
        $prestamo->monto = $data['monto'];
        $prestamo->prestamista_id = $data['prestamista'];
        $prestamo->save();

        return redirect()->route('prestamistas.index')->with('Actualizado', 'Datos del prestamo actualizados exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('Borrado', 'Prestamo borrado exitosamente.');

    }
}
