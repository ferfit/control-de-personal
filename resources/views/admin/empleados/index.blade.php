@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container-fluid pt-5 p-md-5">
        <div class="col-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-start align-items-center ">
                    <h3 class="card-title">Empleados</h3>
                    <a href="{{ route('empleados.create') }}" class="btn btn-success ml-2"><i
                            class="far fa-plus-square mr-1"></i>Crear</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th>Teléfono Contacto</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->nombre }}</td>
                                        <td> {{ $empleado->apellido }}</td>
                                        <td> {{ $empleado->dni }}</td>
                                        <td> {{ $empleado->email }}</td>
                                        <td> {{ $empleado->telefonoDeContacto }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('empleados.show', $empleado) }}"
                                                    class="btn btn-primary">Ver</a>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only"></span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('empleados.show', $empleado) }}">Ver</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('empleados.edit', $empleado) }}">Editar</a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('hijos.index', $empleado) }}">Hijos</a>
                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('empleados.destroy', $empleado) }}"
                                                        method="POST" class="formulario-eliminar w-100 p-2">
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
                    {{ $empleados->links() }}
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
