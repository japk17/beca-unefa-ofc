@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Inicidencia de Eliminacion')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark">Inicidencia de Eliminacion</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active">Eliminacion</li>
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

                </h3>
            </div>

            <div class="card-body">
                {!! Form::open(['route' => ['cuposbecas.destroy',$cupo->id], 'method' => 'delete'])!!}
                <h5 class="">Estuediante</h5>
                <div class="form-group row">
                    <br>
                    <div class="col-5">
                        <label class="form-control-label">Nombre</label>
                        {!! Form::text('nombre',$cupo->estudiante->nombre.' '.$cupo->estudiante->apellido,['class' => 'form-control','disabled'])!!}
                    </div>
                    <div class="col-3">
                        <label class="form-control-label">Cedula</label>
                        {!! Form::text('apellido',$cupo->estudiante->cedula,['class' => 'form-control','disabled'])!!}
                    </div>
                    <div class="col-4">
                        <label class="form-control-label">Tipo de Beca</label>
                        {!! Form::text('tupybeca',$cupo->typeBeca->name,['class' => 'form-control','disabled'])!!}
                    </div>
                </div>
                <h5 class="">Observacion</h5>
                <div class="form-group row">
                    <div class="col-12">
                        <label class="form-control-label">Tipo de Beca</label>
                        {!! Form::textArea('observacion',null,['class' => 'form-control','rows' => '3'])!!}
                    </div>
                </div>
                <input type="hidden" name="estudiante_id" value="{{$cupo->estudiante_id}}">
                <input type="hidden" name="type_beca_id" value="{{$cupo->type_beca_id}}">
                <div class="form-group row">
                    <div class="col-12 text-center">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </div>
                {!! form::close()!!}
            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent

@endsection
@stop