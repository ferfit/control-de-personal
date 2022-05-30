@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar prestamo</h3>
            </div>

            {{ $prestamo }}

            <form method="POST" id="formulario" action="{{ route('prestamos.update', $prestamo) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body row">


                    {{-- Titulo --}}
                    <div class="form-group col-12 col-md-3">
                        <label for="titulo">Título</label>
                        <input type="text" autofocus name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                            id="titulo" placeholder="Ingrese un titulo" value="{{ $prestamo->titulo }}">
                        @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- Descripcion --}}
                    <div class="form-group col-12">
                        <label for="descripcion">Descripción</label>
                        <textarea type="number" name="descripcion" cols="30" rows="10"
                            class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                            placeholder="Ingrese una descripción"> {{ $prestamo->descripcion }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Monto --}}
                    <div class="form-group my-5 mx-2">

                        <label for="monto">Monto</label>

                        <select name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror"
                            id="monto">
                            @if ($prestamo->monto)
                                <option value="{{ $prestamo->monto }}">{{ $prestamo->monto }}</option>
                            @endif
                            <option value="">Seleccione</option>
                            <option value="$500-$1.000">$500-$1.000</option>
                            <option value="$5.000-$10.000">$5.000-$10.000</option>
                            <option value="$10.000-$50.000">$10.000-$50.000</option>
                        </select>

                        @error('monto')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group my-5 mx-2">

                        <label for="prestamista">Prestamista</label>

                        <select name="prestamista" id="prestamista"
                            class="form-control @error('prestamista') is-invalid @enderror" id="prestamista">
                            @if ($prestamo->prestamista_id)
                                <option value="{{ $prestamo->prestamista_id }}">
                                    {{ $prestamo->prestamista->nombre }}
                                </option>
                            @endif
                            <option value="">Seleccione</option>
                            @foreach ($prestamistas as $prestamista)
                                <option value=" {{ $prestamista->id }}">
                                    {{ $prestamista->nombre }}
                                </option>
                            @endforeach
                        </select>

                        @error('prestamista')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" id="btnForm" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    @include('includes.btnForm')
@stop
