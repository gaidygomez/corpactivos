@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <div id="main-content">
        @include('partials.marquee')

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Bancos a los que puede Transferir</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Bancos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Cuentas Bancarias</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre del Banco</th>
                                        <th>Propietario</th>
                                        <th>Número de Cuenta</th>
                                        <th>Tipo de Cuenta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banks as $key => $bank)
                                        <tr>
                                            <td> {{ ($key+1) }} </td>
                                            <td> {{ $bank->name }} </td>
                                            <td> {{ $bank->description }} </td>
                                            <td> {{ $bank->ban }} </td>
                                            <td> {{ ($bank->type == 'a') ? 'Ahorro' : 'Corriente' }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection