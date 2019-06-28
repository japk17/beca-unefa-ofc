@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Sistema de Beca')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">Cupos de Beca</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
        <li class="breadcrumb-item active">Incidencias</li>
    </ol>
</div>


<div class="col-lg-12">
    @if (count($errors) > 0)
    <div id="notificationError" class="alert alert-danger">
        <strong>Ocurrió un problema con tus datos de entrada</strong><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @include('flash::message')

</div>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h3>Lista de Incidencias</h3></div>

                <div class="card-body">


                    <table class="table" id="table">
                        <thead style="background:#2d90c4">
                            <th style="color:white">Id</th>
                            <th style="color:white">Cedula</th>
                            <th style="color:white">Nombre</th>
                            <th style="color:white">Apellido</th>
                            <th style="color:white">Tipo de Beca</th>
                            <th style="color:white">Observacion</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js-inferior')
@parent

	<script type="text/javascript" language="javascript" src="/js/jquery.dataTables.js"></script>

<style>

    .dataTables_wrapper .dataTables_length {
    float: left;
    }
    .dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: left;
    }
    .dataTables_wrapper .dataTables_paginate {
    float: right;
    }    
    .dataTables_wrapper .dataTables_info {
    float: left;
    }       
</style>
<script>

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('incidencias.show',$estudiante->id)}}",
        columns: [
            
            {data: 'id', name: 'id'},
            {data: 'cedula', name: 'cedula'},
            {data: 'name', name: 'name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'type_beca', name: 'type_beca'},
            {data: 'observacion', name: 'observacion'}
        ],
        order: [[1, 'asc']]
    });

</script>
@endsection
@stop