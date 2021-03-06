@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container-fluid pt-5 p-md-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Usuarios</h3>
                    <a href="{{ route('usuarios.create') }}" class="btn btn-success ml-2"><i
                            class="far fa-plus-square mr-1"></i>Crear</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered my-5">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th style="width: 10px">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td> {{ $usuario->email }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('usuarios.edit', $usuario) }}"
                                                class="btn btn-primary">Editar</a>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only"></span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('usuarios.edit', $usuario) }}">Editar</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('password', $usuario) }}">Cambiar contrase??a</a>
                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                                        class="formulario-eliminar w-100 p-2">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger w-100">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')

    @include('includes.alertas')

@stop
