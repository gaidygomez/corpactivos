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
                <p>Escriba su Email para recuperar su Contraseña</p>

                @if (session('status'))
                    <div class="text-danger" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-auth-small" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group">                                    
                        <input type="email" name="email" class="form-control round" id="signup-email" placeholder="Email" value="{{ old('email') }} ">
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-round btn-primary btn-lg btn-block"><strong>RESET PASSWORD</strong></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
