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
                    <p class="lead">Ingrese su código de Verificación</p>
                    @if (session('resend.code'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('resend.code') }} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form class="form-auth-small m-t-20" action=" {{ route('code') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="code" name="code" class="form-control round" placeholder="Código de Verificación" value="{{ old('code') }}">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="text-danger">
                                        <strong>{{ $error }}</strong>
                                    </span>
                                    <br>
                                @endforeach
                            @endif
                        </div>
                        <a href=" {{ route('resend.code') }} "> Pedir otro código</a>
                        <div class="m-4">
                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-block"><strong>Verificar</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection