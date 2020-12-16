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

    <div class="pattern">
        <span class="red"></span>
        <span class="indigo"></span>
        <span class="blue"></span>
        <span class="green"></span>
        <span class="orange"></span>
    </div>
    
    @include('partials.marquee')

    <div class="auth-main particles_js">
        <div class="auth_div vivify popIn">
            <div class="card">
                <div class="body">
                    <p class="lead">Acceda a su cuenta</p>
                    <form class="form-auth-small m-t-20" action=" {{ route('login') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="login" class="form-control round" placeholder="Email/Usuario" value="{{ old('login') }}">
                            @error('login')
                                <span class="text-danger"> 
                                    <strong>{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">                            
                            <input type="password" name="password" class="form-control round" placeholder="Password">
                            @error('password')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if ($errors->has('code_error'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('code_error') }}</strong>
                            </span>
                        @endif
                        <div class="m-4">
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href=" {{ route('password.request') }} ">¿Olvidó su Contraseña?</a></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-block"><strong>Ingresar</strong></button>                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
