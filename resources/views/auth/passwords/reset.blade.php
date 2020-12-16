@extends('layouts.app')

@section('content')

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="card forgot-pass">
            <div class="body">
                <p class="lead mb-3"><strong>Oops</strong>,<br> ¿olvidaste algo?</p>
                <p>Llene los campos del formulario para reestablecer su Contraseña.</p>
                <form class="form-auth-small" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">                                    
                        <input type="email" name="email" class="form-control round" id="signup-email" placeholder="Email" value="{{ $email ?? old('email') }}">
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">                                    
                        <input type="password" name="password" class="form-control round" id="signup-password" placeholder="Password">
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">                                    
                        <input type="password" name="password_confirmation" class="form-control round" id="signup-password" placeholder="Confirme su Password">
                    </div>
                    <button type="submit" class="btn btn-round btn-primary btn-lg btn-block"><strong>RESET PASSWORD</strong></button>
                    <div class="bottom">
                        <span class="helper-text">¿Sabes tu Contraseña? <a href=" {{ route('login') }} ">Acceder</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
