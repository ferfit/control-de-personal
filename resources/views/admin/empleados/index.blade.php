@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container-fluid p-5">
        <div class="col-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-start align-items-center ">
                    <h3 class="card-title">Empleados</h3>
                    <a href="{{route('empleados.create')}}" class="btn btn-success ml-2"><i class="far fa-plus-square mr-1"></i>Crear</a>
                </div>

                <div class="card-body ">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dni</th>
                                <th>Email</th>
                                <th>Teléfono Part</th>
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
                                    <td> {{ $empleado->telefonoParticular }}</td>
                                    <td><div class="btn-group">
                                        <a href="{{ route('empleados.edit',$empleado)}}" class="btn btn-info">Ver</a>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <a class="dropdown-item" href="{{ route('empleados.edit',$empleado)}}">Ver</a>
                                            <a class="dropdown-item" href="{{ route('empleados.edit',$empleado)}}">Modificar</a>
                                            <a class="dropdown-item" href="#">Hijos</a>
                                            <div class="dropdown-divider"></div>
                                            <div class="p-2 ">
                                                <a class="dropdown-item bg-danger rounded" href="#">Eliminar</a>
                                            </div>
                                        </div>
                                    </div></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')

@stop
