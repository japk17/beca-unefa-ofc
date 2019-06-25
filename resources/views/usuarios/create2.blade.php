@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Nuevo usuario
          </div>
          <div class="card-body">
            <form action="{{ url('usuarios') }}" method="post">
              @csrf
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
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
