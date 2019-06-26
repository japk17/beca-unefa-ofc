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
    <h1 class="m-0 text-dark">Seguridad</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
        <li class="breadcrumb-item active">Seguridad</li>
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
                <div class="card-header"><h3>Lista de Usuarios</h3></div>

                <div class="card-body">
                    @can('create user')
                    <div class="row justify-content-end pb-2">
                        <a href="{{ url('/usuarios/create') }}" class="btn btn-success">Nuevo usuario</a>
                    </div>
                    @endcan

                    <table class="table" id="table">
                        <thead style="background:#2d90c4">
                            <th style="color:white">Tipo ID</th>
                            <th style="color:white">Doc ID</th>
                            <th style="color:white">Nombre</th>
                            <th style="color:white">Apellido</th>
                            <th style="color:white">Correo</th>
                            <th style="color:white">Rol</th>
                            <th style="color:white">Acciones</th>
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
        ajax: "{{route('users-list')}}",
        columns: [

            {data: 'doc_type', name: 'doc_type'},
            {data: 'doc_id', name: 'doc_id'},
            {data: 'name', name: 'name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'action', name: 'action'}
        ],
        order: [[1, 'asc']]
    });

</script>
@endsection
@stop