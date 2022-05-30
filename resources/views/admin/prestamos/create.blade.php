@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Crear prestamista</h3>
            </div>


            <form method="POST" id="formulario" action="{{route('prestamos.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">


                    {{-- Titulo --}}
                    <div class="form-group col-12 col-md-3">
                        <label for="titulo">Título</label>
                        <input type="text" autofocus name="titulo" class="form-control @error('titulo') is-invalid @enderror"
                            id="titulo" placeholder="Ingrese un titulo" value="{{ old('titulo') }}">
                        @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- Descripcion --}}
                    <div class="form-group col-12">
                        <label for="descripcion">Descripción</label>
                        <textarea type="number"  name="descripcion" cols="30" rows="10"
                            class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                            placeholder="Ingrese una descripción" value="{{ old('descripcion') }}"> </textarea>
                        @error('descripcion')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Monto --}}
                    <div class="form-group my-5 mx-2">

                        <label for="monto">Monto</label>

                        <select name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror" id="monto">
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

                        <select name="prestamista" id="prestamista" class="form-control @error('prestamista') is-invalid @enderror" id="prestamista">
                            <option value="">Seleccione</option>
                            @foreach ($prestamistas as $prestamista)
                                <option value=" {{ $prestamista->id}}">
                                    {{ $prestamista->nombre}}
                                </option>
                            @endforeach
                        </select>

                        @error('prestamista')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    {{-- Lugar de nacimiento --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="fechaDeNacimiento">Fecha de nacimiento</label>
            textarea type="date" name="fechaDeNacimiento" class="form-control "
                            value="{{ old('fechaDeNacimiento') }}">
                        @error('fechaDeNacimiento')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Estado civil --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="estadoCivil">Estado civil</label>
                        <input type="text"  name="estadoCivil"
                            class="form-control @error('estadoCivil') is-invalid @enderror" id="estadoCivil"
                            placeholder="Ingrese un estado civil" value="{{ old('estadoCivil') }}">
                        @error('estadoCivil')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Nacionalidad --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text"  name="nacionalidad"
                            class="form-control @error('nacionalidad') is-invalid @enderror" id="nacionalidad"
                            placeholder="Ingrese una nacionalidad" value="{{ old('nacionalidad') }}">
                        @error('nacionalidad')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Domicilio --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="domicilio">Domicilio</label>
                        <input type="text"  name="domicilio"
                            class="form-control @error('domicilio') is-invalid @enderror" id="domicilio"
                            placeholder="Ingrese un domicilio" value="{{ old('domicilio') }}">
                        @error('domicilio')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Dni --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="dni">Dni</label>
                        <input type="text"  name="dni" class="form-control @error('dni') is-invalid @enderror"
                            id="dni" placeholder="Ingrese un dni" value="{{ old('dni') }}">
                        @error('dni')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Imagen dni frente --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="imagenDniFrente">Imagen dni frente</label>
                        <input type="file" class="form-control @error('imagenDniFrente') is-invalid @enderror" name="imagenDniFrente"
                        value="{{ old('imagenDniFrente') }}">
                        @error('imagenDniFrente')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Imagen dni dorso --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="imagenDniDorso">Imagen dni dorso</label>
                        <input type="file" class="form-control @error('imagenDniDorso') is-invalid @enderror" name="imagenDniDorso"
                        value="{{ old('imagenDniDorso') }}">
                        @error('imagenDniDorso')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Email --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="email">Email</label>
                        <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Ingrese un email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Telefono particular --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="telefonoParticular">Teléfono particular</label>
                        <input type="text"  name="telefonoParticular" class="form-control @error('telefonoParticular') is-invalid @enderror"
                            id="telefonoParticular" placeholder="Ingrese un telefono particular" value="{{ old('telefonoParticular') }}">
                        @error('telefonoParticular')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Telefono de contacto --}}
                   {{--  <div class="form-group col-12 col-md-3">
                        <label for="telefonoDeContacto">Teléfono de contacto</label>
                        <input type="text"  name="telefonoDeContacto" class="form-control @error('telefonoDeContacto') is-invalid @enderror"
                            id="telefonoDeContacto" placeholder="Ingrese un telefono de contacto" value="{{ old('telefonoDeContacto') }}">
                        @error('telefonoDeContacto')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{--   Apellido materno --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="apellidoMaterno">Apellido materno</label>
                        <input type="text"  name="apellidoMaterno" class="form-control @error('apellidoMaterno') is-invalid @enderror"
                            id="apellidoMaterno" placeholder="Ingrese un apellidoMaterno" value="{{ old('apellidoMaterno') }}">
                        @error('apellidoMaterno')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                    {{-- Apellido paterno --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="apellidoPaterno">Apellido paterno</label>
                        <input type="text"  name="apellidoPaterno" class="form-control @error('apellidoPaterno') is-invalid @enderror"
                            id="apellidoPaterno" placeholder="Ingrese un apellidoPaterno" value="{{ old('apellidoPaterno') }}">
                        @error('apellidoPaterno')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Conjuge nombre y apellido --}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="conjugeApellidoNombre">Nombre y Apellido de conjuge</label>
                        <input type="text"  name="conjugeApellidoNombre" class="form-control @error('conjugeApellidoNombre') is-invalid @enderror"
                            id="conjugeApellidoNombre" placeholder="Ingrese un Nombre y Apellido" value="{{ old('conjugeApellidoNombre') }}">
                        @error('conjugeApellidoNombre')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    {{-- Conjuge dni--}}
                    {{-- <div class="form-group col-12 col-md-3">
                        <label for="conjugeDni">Dni del conjuge</label>
                        <input type="text"  name="conjugeDni" class="form-control @error('conjugeDni') is-invalid @enderror"
                            id="conjugeDni" placeholder="Ingrese un Dni" value="{{ old('conjugeDni') }}">
                        @error('conjugeDni')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}

                </div>

                <div class="card-footer">
                    <button type="submit" id="btnForm" class="btn btn-primary">Guardar</button>
                    <a href="{{route('prestamistas.index')}}" class="btn btn-secondary">Volver</a>
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
