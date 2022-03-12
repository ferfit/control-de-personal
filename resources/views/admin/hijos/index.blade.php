@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container p-5">
        <div class="col-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-start align-items-center ">
                    <h3 class="card-title">Hijos de {{$empleado->nombre}} {{$empleado->apellido}}</h3>
                    <a href="{{ route('hijos.create',$empleado)}}" class="btn btn-success ml-2"><i
                            class="far fa-plus-square mr-1"></i>Crear</a>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dni</th>
                                <th style="width:50px;">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($hijos as $hijo)
                                <tr>
                                    <td>{{ $hijo->nombre }}</td>
                                    <td> {{ $hijo->apellido }}</td>
                                    <td> {{ $hijo->dni }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('hijos.edit',[$hijo,$empleado])}}"
                                                class="btn btn-primary">Editar</a>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu" style="">

                                                <a class="dropdown-item"
                                                    href="{{ route('hijos.edit',[$hijo,$empleado])}}">Editar</a>

                                                <div class="dropdown-divider"></div>

                                                <form action="{{ route('hijos.destroy',[$hijo,$empleado])}}" method="POST"
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
                <div class="card-footer clearfix">
                    <a href="{{ route('empleados.index')}}" class="btn btn-secondary">Volver</a>
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
