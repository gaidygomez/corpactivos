@extends('layouts.app')

@section('content')
<div class="wrapper">

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <div id="main-content">

        @include('partials.marquee')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Perfil de Usuario</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Perfil de Usuario</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                </div>

                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="card">
                        <div class="header">
                            <h2>Información General</h2>
                        </div>
                        <div class="body">
                            <div>
                                <img src="{{ asset('img/default.jpg') }}" alt="profile image" class="img-thumbnail rounded-circle" style="
                                    width: 12rem;
                                    height: 12rem;
                                ">
                            </div>
                            <hr>
                            <small class="text-muted">Correo Eléctronico: </small>
                            <p> {{ Auth::user()->email }} </p>
                            <hr>
                            <small class="text-muted">Teléfono: </small>
                            <p> {{ Auth::user()->phone }} </p>
                            <hr>
                            <small class="text-muted">Nombre: </small>
                            <p class="m-b-0"> {{ Auth::user()->fname.' '. Auth::user()->lname }} </p>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h2>Información</h2>
                        </div>
                        <div class="body">
                            <div id="response"></div>
                            <form id="profile-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="fname" name="fname" class="form-control" value="{{Auth::user()->fname}}" placeholder="Primer Nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="sname" name="sname" class="form-control" value="{{Auth::user()->sname}}" placeholder="Segundo Nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                           <input type="text" id="lname" name="lname" class="form-control" value="{{Auth::user()->lname}}" placeholder="Primer Apellido">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="lsname" name="lsname" class="form-control" value="{{Auth::user()->lsname}}" placeholder="Segundo Apellido">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="ci" name="ci" class="form-control" value="{{Auth::user()->ci}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="phone" class="form-control" value="{{Auth::user()->phone}}" placeholder="Télefono">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Actualizar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-round btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div><div class="card">
                        <div class="header">
                            <h2>Datos de Login</h2>
                        </div>
                        <div class="body">
                            <div id="response-data-login"></div>
                            <form id="data-login">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Usuario" value="{{ Auth::user()->username }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Correo Eléctronico" value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Actualizar</button> &nbsp;
&nbsp;
                                <button type="button" class="btn btn-round btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Cambio de Contraseñas</h2>
                        </div>
                        <div class="body">
                            <div id="response-password"></div>
                            <form id="password-user">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <hr>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Nueva Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme la Constraseña">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Actualizar</button> &nbsp;
&nbsp;
                                <button type="button" class="btn btn-round btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src=" {{ asset('js/form-user.js') }} "></script>
@endsection
