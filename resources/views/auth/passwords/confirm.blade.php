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
                <p>Complete los campos para reestablecer su contraseña</p>

                <form class="form-auth-small" action="{{ route('password.confirm') }}" method="POST">
                    @csrf
                    <div class="form-group">                                    
                        <input type="password" name="password" class="form-control round" id="signup-password" placeholder="Password" value="{{ old('password') }} ">
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-round btn-primary btn-lg btn-block"><strong>Confirmar Password</strong></button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
