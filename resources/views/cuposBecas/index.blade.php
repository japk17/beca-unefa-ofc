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
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">Becas</li>
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
    @if(Session::has('message.nivel'))

    <div class="alert alert-{{ session('message.nivel') }} alert-dismissible" role="alert">
        <div class="m-alert__icon">
            <i class="fa fa-{{ session('message.icon') }}"></i>
        </div>
        <div class="m-alert__text">
            <strong>
                {{ session('message.title') }}
            </strong>
            {{ session('message.content') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
    @endif
</div>
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h3>Lista de Becados</h3></div>

                <div class="card-body">
                    @can('create user')
                    <div class="row justify-content-end pb-2">
                        <a href="#" class="btn btn-success">Nuevo Becado</a>
                    </div>
                    @endcan

                    <table class="table" id="table">
                        <thead>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha nacimiento</th>
                            <th>Tipo de Beca</th>
                            <th>Acciones</th>
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
</style>
<script>

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('cuposbecas.create')}}",
        columns: [
            
            {data: 'cedula', name: 'cedula'},
            {data: 'name', name: 'name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'fecha_nacimiento', name: 'fecha_nacimiento'},
            {data: 'type_beca', name: 'type_beca'},
            {data: 'action', name: 'action'}
        ],
        order: [[1, 'asc']]
    });

</script>
@endsection
@stop