@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Modificar datos del hijo/a</h3>
            </div>


            <form method="POST" action="{{route('hijos.update',[$hijo,$empleado])}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body row">
                    {{-- Nombre --}}
                    <div class="form-col-12 col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" autofocus name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre" placeholder="Ingrese un nombre" value="{{ $hijo->nombre }}">
                        @error('nombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- Apellido --}}
                    <div class="form-col-12 col-md-4">
                        <label for="apellido">Apellido</label>
                        <input type="text"  name="apellido"
                            class="form-control @error('apellido') is-invalid @enderror" id="apellido"
                            placeholder="Ingrese un apellido" value="{{ $hijo->apellido }}">
                        @error('apellido')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- Dni --}}
                    <div class="form-group col-12 col-md-4">
                        <label for="dni">Dni</label>
                        <input type="text"  name="dni" class="form-control @error('dni') is-invalid @enderror"
                            id="dni" placeholder="Ingrese un dni" value="{{ $hijo->dni }}">
                        @error('dni')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('hijos.index',$empleado)}}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')

@stop
