@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" href="/AdminLTE/plugins/select2/select2.min.css">
@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Guia')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">Título Inicial</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">localidad</li>
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
<div class="row">
    <div class="col-lg-12">
        <div class="card card-default color-palette-box">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tag"></i>
                    <!-- Title -->
                </h3>
            </div>

            <div class="card-body">
                {!! Form::open(['route'=>'cuposbecas.store','method'=>'post'])!!} <!-- Rates + Surchargers -->
                <div class="form-group row">
                    <div class="col-sm-6">

                        <label>Cedula Estudiantes:</label>
                        {!! Form::select('estudiante_id',$estudiantes,null,['class' => 'form-control select2'])!!}
                    </div>
                    <div class="col-sm-6">
                        <label>Tipo de Beca:</label>
                        {!! Form::select('type_beca_id',$type_beca,null,['class' => 'form-control select2'])!!}

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <center>
                            <input type="submit" class="btn btn-primary" name="" value="Guardar">
                        </center>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent
<script src="/AdminLTE/plugins/select2/select2.full.min.js"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
@endsection
@stop