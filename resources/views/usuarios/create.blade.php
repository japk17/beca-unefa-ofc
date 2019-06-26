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
    <h1 class="m-0 text-dark">Seguridad</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/usuarios">Lista de Usuarios</a></li>
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
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3>Nuevo usuario</h3>
          </div>
          <div class="card-body">
            <form action="{{ url('usuarios') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="doc_id">Tipo ID</label>
              <select name="doc_type" required class="form-control">
                <option value="V">V</option>
                <option value="E">E</option>
                <option value="P">P</option>
              </select>
            </div>
              <div class="form-group">
                <label for="doc_id">Doc ID</label>
                <input type="text" name="doc_id" required class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="last_name">Apellido</label>
                  <input type="text" name="last_name" required class="form-control">
                </div>
              <div class="form-group">
                <label for="email">Correo</label>
                <input type="text" name="email" required class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" required class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Rol</label>
                <select class="form-control" name="rol">
                  @foreach ($roles as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
              <div class="justify-content-end">
                <input type="submit" value="Crear" class="btn btn-success">
                <a href="{{ url('/usuarios/') }}" class="btn btn-danger" style="float:right;">Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@section('js-inferior')
@parent

@endsection
@stop