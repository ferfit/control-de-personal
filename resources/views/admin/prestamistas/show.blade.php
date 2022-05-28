@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Datos del empleado empleado</h3>
            </div>


            <div class="card-body row">
                {{-- Nombre --}}
                <div class="form-col-12 col-md-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" autofocus disabled name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                        placeholder="Ingrese un nombre" value="{{ $empleado->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Apellido --}}
                <div class="form-col-12 col-md-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" disabled name="apellido" class="form-control @error('apellido') is-invalid @enderror"
                        id="apellido" placeholder="Ingrese un apellido" value="{{ $empleado->apellido }}">
                    @error('apellido')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Lugar de nacimiento --}}
                <div class="form-col-12 col-md-3">
                    <label for="lugarDeNacimiento">Lugar de nacimiento</label>
                    <input type="text" disabled name="lugarDeNacimiento"
                        class="form-control @error('lugarDeNacimiento') is-invalid @enderror" id="lugarDeNacimiento"
                        placeholder="Ingrese un lugar de nacimiento" value="{{ $empleado->lugarDeNacimiento }}">
                    @error('lugarDeNacimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Lugar de nacimiento --}}
                <div class="form-group col-12 col-md-3">
                    <label for="fechaDeNacimiento">Fecha de nacimiento</label>
                    <input type="date" disabled name="fechaDeNacimiento" class="form-control "
                        value="{{ $empleado->fechaDeNacimiento }}">
                    @error('fechaDeNacimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Estado civil --}}
                <div class="form-group col-12 col-md-3">
                    <label for="estadoCivil">Estado civil</label>
                    <input type="text" disabled name="estadoCivil"
                        class="form-control @error('estadoCivil') is-invalid @enderror" id="estadoCivil"
                        placeholder="Ingrese un estado civil" value="{{ $empleado->estadoCivil }}">
                    @error('estadoCivil')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Nacionalidad --}}
                <div class="form-group col-12 col-md-3">
                    <label for="nacionalidad">Nacionalidad</label>
                    <input type="text" disabled name="nacionalidad"
                        class="form-control @error('nacionalidad') is-invalid @enderror" id="nacionalidad"
                        placeholder="Ingrese una nacionalidad" value="{{ $empleado->nacionalidad }}">
                    @error('nacionalidad')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Domicilio --}}
                <div class="form-group col-12 col-md-3">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" disabled name="domicilio"
                        class="form-control @error('domicilio') is-invalid @enderror" id="domicilio"
                        placeholder="Ingrese un domicilio" value="{{ $empleado->domicilio }}">
                    @error('domicilio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Dni --}}
                <div class="form-group col-12 col-md-3">
                    <label for="dni">Dni</label>
                    <input type="text" disabled name="dni" class="form-control @error('dni') is-invalid @enderror" id="dni"
                        placeholder="Ingrese un dni" value="{{ $empleado->dni }}">
                    @error('dni')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Imagen dni frente --}}
                @if ($empleado->imagenDniFrente)
                    <div class="form-group col-12 col-md-6">
                        <label for="">Dni frente:</label> <br>
                        <img src="/storage/{{ $empleado->imagenDniFrente }}" alt="" class="w-100">
                    </div>

                @else
                    <div class="form-group col-12 col-md-3">
                        <label for="">Dni frente:</label> <br>
                        <p>No hay una imagén de dni cargada.</p>
                    </div>
                @endif


                {{-- Imagen dni dorso --}}
                @if ($empleado->imagenDniDorso)
                    <div class="form-group col-12 col-md-6">
                        <label for="">Dni dorso:</label> <br>
                        <img src="/storage/{{ $empleado->imagenDniDorso }}" alt="" class="w-100">
                    </div>
                @else
                    <div class="form-group col-12 col-md-3">
                        <label for="">Dni dorso:</label> <br>
                        <p>No hay una imagén de dni cargada.</p>
                    </div>
                @endif


                {{-- Email --}}
                <div class="form-group col-12 col-md-3">
                    <label for="email">Email</label>
                    <input type="email" disabled name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Ingrese un email" value="{{ $empleado->email }}">
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Telefono particular --}}
                <div class="form-group col-12 col-md-3">
                    <label for="telefonoParticular">Teléfono particular</label>
                    <input type="text" disabled name="telefonoParticular"
                        class="form-control @error('telefonoParticular') is-invalid @enderror" id="telefonoParticular"
                        placeholder="Ingrese un telefono particular" value="{{ $empleado->telefonoParticular }}">
                    @error('telefonoParticular')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Telefono de contacto --}}
                <div class="form-group col-12 col-md-3">
                    <label for="telefonoDeContacto">Teléfono de contacto</label>
                    <input type="text" disabled name="telefonoDeContacto"
                        class="form-control @error('telefonoDeContacto') is-invalid @enderror" id="telefonoDeContacto"
                        placeholder="Ingrese un telefono de contacto" value="{{ $empleado->telefonoDeContacto }}">
                    @error('telefonoDeContacto')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Apellido materno --}}
                <div class="form-group col-12 col-md-3">
                    <label for="apellidoMaterno">Apellido materno</label>
                    <input type="text" disabled name="apellidoMaterno"
                        class="form-control @error('apellidoMaterno') is-invalid @enderror" id="apellidoMaterno"
                        placeholder="Ingrese un apellidoMaterno" value="{{ $empleado->apellidoMaterno }}">
                    @error('apellidoMaterno')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Apellido paterno --}}
                <div class="form-group col-12 col-md-3">
                    <label for="apellidoPaterno">Apellido paterno</label>
                    <input type="text" disabled name="apellidoPaterno"
                        class="form-control @error('apellidoPaterno') is-invalid @enderror" id="apellidoPaterno"
                        placeholder="Ingrese un apellidoPaterno" value="{{ $empleado->apellidoPaterno }}">
                    @error('apellidoPaterno')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Conjuge nombre y apellido --}}
                <div class="form-group col-12 col-md-3">
                    <label for="conjugeApellidoNombre">Nombre y Apellido de conjuge</label>
                    <input type="text" disabled name="conjugeApellidoNombre"
                        class="form-control @error('conjugeApellidoNombre') is-invalid @enderror"
                        id="conjugeApellidoNombre" placeholder="Ingrese un Nombre y Apellido"
                        value="{{ $empleado->conjugeApellidoNombre }}">
                    @error('conjugeApellidoNombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Conjuge dni --}}
                <div class="form-group col-12 col-md-3">
                    <label for="conjugeDni">Dni del conjuge</label>
                    <input type="text" disabled name="conjugeDni"
                        class="form-control @error('conjugeDni') is-invalid @enderror" id="conjugeDni"
                        placeholder="Ingrese un Dni" value="{{ $empleado->conjugeDni }}">
                    @error('conjugeDni')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
            </div>

        </div>
    </div>
@stop

@section('css')
@stop

@section('js')

@stop
