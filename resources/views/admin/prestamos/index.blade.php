@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="container-fluid pt-5 p-md-5">
        <div class="col-12">
            <div class="card ">
                <div class="card-header d-flex justify-content-start align-items-center ">
                    <h3 class="card-title">Prestamos</h3>
                    <a href="{{ route('prestamos.create') }}" class="btn btn-success ml-2"><i
                            class="far fa-plus-square mr-1"></i>Crear</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered my-5 ">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Prestamista</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($prestamos as $prestamo)
                                    <tr>
                                        <td>{{ $prestamo->titulo }}</td>
                                        <td> {{ $prestamo->descripcion }}</td>
                                        <td> {{ $prestamo->monto }}</td>
                                        <td> {{ $prestamo->prestamista->nombre }}</td>
                                        <td>
                                            <div class="btn-group index-2">
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only"></span>
                                                </button>
                                                <div class="dropdown-menu" role="menu" style="">
                                                    <a class="dropdown-item"
                                                        href="{{ route('prestamos.edit', $prestamo) }}">Editar</a>
                                                    <div class="dropdown-divider"></div>

                                                    <form action="{{ route('prestamos.destroy', $prestamo) }}"
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
                    {{ $prestamos->links() }}
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
