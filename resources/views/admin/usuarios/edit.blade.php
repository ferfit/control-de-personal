@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">USUARIOS</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar usuario</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" id="formulario" action="{{ route('usuarios.update',$usuario) }}" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="card-body col-12 col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre*</label>
                            <input type="text" autofocus name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" placeholder="Ingrese un nombre" value="{{ $usuario->name }}">
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="card-body col-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" autofocus email="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Ingrese un nombre" value="{{ $usuario->email}}">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- rol --}}
                    <div class="card-body col-12 col-md-4">
                        <div class="form-group">
                            <label for="rol">Perfil*</label>
                            <select class="form-control" name="rol" id="">

                                <option value="{{$usuario->rol}}">{{$usuario->rol}}</option>

                                @switch($usuario->rol)
                                    @case('administrador')
                                        <option value="socio">socio</option>
                                        <option value="empleado">empleado</option>
                                        @break
                                    @case('socio')
                                    <option value="empleado">empleado</option>
                                    <option value="administrador">administrador</option>
                                        @break
                                    @case('empleado')
                                    <option value="socio">socio</option>
                                    <option value="administrador">administrador</option>
                                        @break

                                    @default

                                @endswitch
                            </select>
                            @error('rol')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" id="btnForm" class="btn btn-success btnCrear"><i
                                class="far fa-check-square mr-1"></i>Actualizar</button>
                        <a href="{{ route('usuarios.index') }}" class="ml-1 btn btn-secondary"> <i
                                class="fas fa-undo-alt mr-1"></i>Volver</a>
                    </div>
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
