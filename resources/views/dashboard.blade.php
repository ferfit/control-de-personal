@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
    <div class="row pt-5">

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box  bg-dark">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empleados</span>
                    <span class="info-box-number">
                        {{count($empleados)}}
                        <small></small>
                    </span>
                </div>

            </div>
        </div>

    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script>
        console.log('Hi!');
    </script> --}}
@stop
