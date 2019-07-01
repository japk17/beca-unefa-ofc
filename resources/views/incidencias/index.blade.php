@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Sistema de Beca')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">Incidencias</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default color-palette-box">

            <div class="card-header">
                <h3 class="card-title">
                    <h3>Registro de Incidencias</h3>
                </h3>
            </div>

            <div class="card-body">
                <!-- Body -->
                {!! Form::open(['route' => 'incidencias.create', 'method' => 'get'])!!}
                <div class="form-group row">
                    <br>
                    <div class="col-4 "></div>
                    <div class="col-4 justify-content-center">
                        <label class="">Cedula</label>
                        {!!Form::text('cedula',null,['class' => 'form-control'])!!}
                    </div>
                </div>
                 <div class="form-group row">
                    <div class="col-12 text-center">
                        <input type="submit" class="btn btn-success" value="buscar">
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent

@endsection
@stop