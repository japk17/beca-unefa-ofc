
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
   @include('includes.nav-logout')
  <body class="hold-transition login-pageE">
      <style>
         body {

            /* Ubicación de la imagen */

            background-image: url(/images/pasantia_when.jpg);

            /* Para dejar la imagen de fondo centrada, vertical y

            horizontalmente */

            background-position: center top;

            /* Para que la imagen de fondo no se repita */

            background-repeat: no-repeat;

            /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

            background-attachment: fixed;

            /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

            background-size:;

            /* Se muestra un color de fondo mientras se está cargando la imagen

            de fondo o si hay problemas para cargarla */

            background-color: #fff;

         }
         
         .card {
                  opacity: 0.8;
               }
      </style>
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-6">
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>               
               <br/>
               <br/>
               <br/>
               <br/>               
               
               <div class="card">
                  <div class="card-header"><h4>INICIO DE SESIÓN</h4></div>

                  <div class="card-body">
                     <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                           <label for="email" class="col-sm-4 col-form-label text-md-right">Correo</label>

                           <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                           <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="form-group row">
                           <div class="col-md-6 offset-md-4">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                 <label class="form-check-label" for="remember">
                                    Recuérdame
                                 </label>
                              </div>
                           </div>
                        </div>

                        <div class="form-group row">
                           <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                 Iniciar Sesión
                              </button>

                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                 ¿Olvidaste tu contraseña?
                              </a>
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
