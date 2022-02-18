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
                    <a href="{{ route('empleados.create') }}" class="btn btn-success ml-2"><i
                            class="far fa-plus-square mr-1"></i>Crear</a>
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('empleados.show', $empleado) }}"
                                                class="btn btn-primary">Ver</a>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu" style="">
                                                <a class="dropdown-item"
                                                    href="{{ route('empleados.show', $empleado) }}">Ver</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('empleados.edit', $empleado) }}">Modificar</a>
                                                <a class="dropdown-item" href="#">Hijos</a>
                                                <div class="dropdown-divider"></div>

                                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST"
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
                    {{$empleados->links()}}
                </div>
            </div>
        </div>

    </div>
@stop

@section('css')
@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @if (session('Creado'))
        <script>
            Swal.fire(
                'Éxito!',
                '{{ session('Creado') }}',
                'success'
            )
        </script>
    @endif

    @if (session('Actualizado'))
        <script>
            Swal.fire(
                'Actualizado!',
                '{{ session('Actualizado') }}',
                'success'
            )
        </script>
    @endif

    @if (session('Borrado'))
        <script>
            Swal.fire(
                'Borrado!',
                '{{ session('Borrado') }}',
                'success'
            )
        </script>
    @endif


    @if (session('Error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('Error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        </script>
    @endif


    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Estas seguro?',
                text: "No podras revertir esto.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    /* Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ) */

                    this.submit();
                }

            })

        });
    </script>

@stop
