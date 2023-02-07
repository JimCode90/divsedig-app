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
                        <p class="text-muted">Complete los siguientes campos.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="grado">{{ __('Grado') }}</label>

                            <select name="grado" id="grado" class="form-control @error('grado') is-invalid @enderror">
                                <option value="">Seleccione</option>
                                @foreach($grados as $grado)
                                    <option
                                        value="{{ $grado->id }}">
                                        {{ $grado->descripcion }}
                                    </option>
                                @endforeach
                            </select>

                            @error('grado')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="nombres">{{ __('Nombres') }}</label>


                            <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres"
                                   value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="apellidos">{{ __('Apellidos') }}</label>


                            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"
                                   value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                            @error('apellidos')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="email">{{ __('Correo Institucional') }}</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="password">{{ __('Password') }}</label>


                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                   autocomplete="new-password">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="mt-5 text-center text-dark">
            <p>Ya tienes una cuenta ?<a href="{{ route('login') }}" class="fw-bold text-danger"> Inicia Sesión</a> </p>
            <p>© <script>document.write(new Date().getFullYear())</script> DIRIN-DIVSEDIG. Creado por JimCode</p>
        </div>
    </div>


@endsection

