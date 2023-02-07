@extends('layouts.app-auth')

@section('content')

    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body">
                <div class="px-2 py-3">


                    <div class="text-center">
                        <a href="/">
                            <img src="assets/images/logo-dark.png" height="22" alt="logo">
                        </a>

                        <h5 class="text-primary mb-2 mt-4">Bienvenido!</h5>
                        <p class="text-muted">Ingrese sus credenciales.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="form-horizontal mt-4 pt-2" action="index.html">
                        @csrf

                        <div class="mb-3">
                            <label for="email">{{ __('Correo Institucional') }}</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">{{ __('Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-100 waves-effect waves-light">
                                {{ __('Login') }}
                            </button>

                        </div>
                        <div class="mt-4 text-center">
                            @if (Route::has('password.request'))
                                <a class="text-muted" href="{{ route('password.request') }}">
                                    <i class="mdi mdi-lock me-1"></i>{{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>



                </div>
            </div>
        </div>

        <div class="mt-5 text-center text-dark">
            <p>No tienes una cuenta ?<a href="{{ route('register') }}" class="fw-bold text-danger"> Registrate</a> </p>
            <p>© <script>document.write(new Date().getFullYear())</script> DIRIN-DIVSEDIG. Creado por JimCode</p>
        </div>
    </div>

@endsection
