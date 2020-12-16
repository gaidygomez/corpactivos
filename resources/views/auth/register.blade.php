@extends('layouts.app')

@section('content')
<div class="wrapper">
    <nav class="nav navbar" style="background-color: #FFFFFF;">
        <div class="container-fluid">
            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href=" {{ url('/')}} "><img src=" {{ asset('img/logo.jpg') }} " alt="CorpActivos Logo" class="img-fluid" width="75" height="100"></a>
                </div>
            </div>

            <div class="navbar-right">
                <div class="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href=" {{ url('/') }} " class="icon-menu" ><i class="icon-home">  Inicio</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    @include('partials.marquee')

<div class="auth-main2 particles_js">
    <div class="auth_div vivify fadeInTop">
        <div class="card">
            <div class="body">
                <div class="login-img">
                    <img class="img-fluid" src=" {{ asset('img/login-img.png') }} " />
                </div>
                <form class="form-auth-small" action=" {{ route('register') }} " method="POST">
                    @csrf
                    <div class="mb-5 text-center">
                        <p class="lead">Registra tu Cuenta</p>
                    </div>
                    <div class="form-group">
                        <label for="signin-fname" class="control-label sr-only">Primer Nombre</label>
                        <input type="text" class="form-control round" name="fname" id="signin-fname" value="{{ old('fname') }}" placeholder="Primer Nombre">
                        @error('fname')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-sname" class="control-label sr-only">Segundo Nombre</label>
                        <input type="text" class="form-control round" name="sname" id="signin-sname" value="{{ old('sname') }}" placeholder="Segundo Nombre">
                        @error('sname')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-lname" class="control-label sr-only">Primer Apellido</label>
                        <input type="text" class="form-control round" name="lname" id="signin-lname" value="{{ old('lname') }}" placeholder="Primer Apellido">
                        @error('lname')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-lsname" class="control-label sr-only">Segundo Apellido</label>
                        <input type="text" class="form-control round" name="lsname" id="signin-lsname" value="{{ old('lsname') }}" placeholder="Segundo Apellido">
                        @error('lsname')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-ci" class="control-label sr-only">Cédula</label>
                        <input type="text" class="form-control round" name="ci" id="signin-ci" value="{{ old('ci') }}" placeholder="Cédula">
                        @error('ci')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-phone" class="control-label sr-only">Teléfono</label>
                        <input type="text" class="form-control round" name="phone" id="signin-phone" value="{{ old('phone') }}" placeholder="Teléfono">
                        @error('phone')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-username" class="control-label sr-only">Usuario</label>
                        <input type="text" class="form-control round" name="username" id="signin-username" value="{{ old('username') }}" placeholder="Usuario">
                        @error('username')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control round" id="signin-email" value="{{ old('email') }}" placeholder="Email" name="email">
                        @error('email')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Contraseña</label>
                        <input type="password" name="password" class="form-control round" id="signin-password" placeholder="Contraseña">
                        @error('password')
                            <p class="p-2 text-danger"> {{ $message }} </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-password-confirmation" class="control-label sr-only">Confirme Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control round" id="signin-password-confirmation" placeholder="Confirme Contraseña">
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox" id="check">
                            <span><a href="#"> Aceptar Términos y Condiciones </a></span>
                        </label>
                        <div class="alert"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block" disabled=""><strong>Registrar</strong></button>
                    <div class="mt-4">
                        <span>¿Ya tienes cuenta? <a href=" {{ route('login') }} ">Login</a></span>
                    </div>
                </form>
                <div class="pattern">
                    <span class="red"></span>
                    <span class="indigo"></span>
                    <span class="blue"></span>
                    <span class="green"></span>
                    <span class="orange"></span>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script src=" {{ asset('js/register.js') }} "></script>
@endsection

