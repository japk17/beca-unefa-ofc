<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
   @include('includes.nav-logout')
   <body class="hold-transition login-pageE">
      <style>
         body {

            /* Ubicación de la imagen */

            background-image: url(/images/unefa_when.jpg);

            /* Para dejar la imagen de fondo centrada, vertical y

            horizontalmente */

            background-position: center center;

            /* Para que la imagen de fondo no se repita */

            background-repeat: no-repeat;

            /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

            background-attachment: fixed;

            /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

            background-size: cover;

            /* Se muestra un color de fondo mientras se está cargando la imagen

            de fondo o si hay problemas para cargarla */

            background-color: #66999;

         }

         .card {
            opacity: 0.9;
         }
      </style>
      <div class="container">
<br>
<br>
<br>
<br> 
<br> 
<br> 
<br>
<br>
<br>
<br> 
<br> 
<br>
<br>
<br>
<br> 
         <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">REINICIO DE CONTRASEÑA</div>

                  <div class="card-body">
                     @if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                     </div>
                     @endif

                     <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">Ingresar Correo</label>

                           <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                 Enviar enlace Reinico de Contraseña
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
