@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('content')
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">{{ __('Registrate') }}</p>

                <form method="POST" action="{{ route('register') }}" class="mx-1 mx-md-4">
                    @csrf

                    <div class="mb-3 row">
                      <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
                      <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo') }}</label>
                      <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="dui" class="col-md-4 col-form-label text-md-end">{{ __('Dui') }} - SIN GUION</label>
                      <div class="col-md-8">
                        <input id="dui" type="text" class="form-control @error('dui') is-invalid @enderror" name="dui" value="{{ old('dui') }}" required autocomplete="dui" autofocus>
                        @error('dui')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                      <div class="col-md-8">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
                      <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña') }}</label>
                      <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                    </div>

                    <div class="mb-0 row">
                      <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" style="background-color: #fe9b32;">
                          {{ __('Registrarse') }}
                        </button>
                        <a class="nav-link" href="{{ route('login') }}"><u>Volver al Login</u></i></a>
                      </div>
                    </div>
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="/images/logo.png" alt="Logo" width="500" height="500" class="d-inline-block align-text-top me-2">    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
