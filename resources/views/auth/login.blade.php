@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="./css/inicio.css" rel="stylesheet">
@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
      <img src="/images/logo.png" alt="Logo" width="500" height="500" class="d-inline-block align-text-top me-2">    

      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="divider d-flex align-items-center my-4">
            <h1 class="text-center fw-bold mx-3 mb-0">Iniciar Sesion</h1>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
              placeholder="Ingrese su correo electronico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            <input type="password" id="password"
              class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password" />

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
              <label class="form-check-label" for="remember">
                Recordar sesion
              </label>
            </div>
            @if (Route::has('password.request'))
            <!--<a href="{{ route('password.request') }}" class="text-body">¿Olvido su contraseña?</a>-->
            @endif
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #fe9b32;">Ingresar</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? 
                <a href="{{ route('register') }}" class="link-danger">Registrate ahora</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 " style="background-color: #fe9b32; text-shadow: 2px 2px 4px black;">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
        Copyright © 2024. Todos los derechos reservados a Mini-Super Hilda's
        </div>
    </div>

</section>
@endsection
