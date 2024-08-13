@extends('layouts.single')

@section('content')

    <body style="background-color: #388da8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0" style="display: flex; justify-content: center">
                                <div class="col-lg-6">
                                    <div style="padding: 20px 0 20px 0">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Iniciar sesión</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input id="email" type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                                    autofocus placeholder="Correo electrónico">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password" placeholder="Contraseña">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-user btn-block">
                                                Ingresar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
    </body>
@endsection
