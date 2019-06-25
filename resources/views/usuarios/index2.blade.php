@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header"><h2>Lista de Usuarios</h2></div>

                  <div class="card-body">
                      @can('create user')
                          <div class="row justify-content-end pb-2">
                            <a href="{{ url('/usuarios/create') }}" class="btn btn-success">Nuevo usuario</a>
                        </div>
                     @endcan

                      <table class="table">
                        <thead>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Correo</th>
                          <th>Rol</th>
                          <th>Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $usuario)
                            <tr>
                              <td nowrap>{{ $usuario->name }}</td>
                              <td nowrap>{{ $usuario->last_name }}</td>
                              <td nowrap>{{ $usuario->email }}</td>
                              <td nowrap>{{ $usuario->roles->implode('name', ', ') }}</td>
                              <td nowrap>
                                @can('update user')
                                    <a href="{{ url('usuarios/'.$usuario->id.'/edit') }}" class="btn btn-primary">Editar</a>
                                @endcan
                                @can('delete user')
                                    @include('usuarios.delete', ['usuario' => $usuario])
                                @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
