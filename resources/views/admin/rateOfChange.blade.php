@extends('layouts.app')

@section('content')
<div class="wrapper">

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

    <div id="main-content">

        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Tasa de Cambio</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tasa de Cambio</li>
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

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tasas de Cambio</h2>
                        </div>
                        <div class="body">
                            <div id="response">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session('success') }} </strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                @endif
                            </div>
                            <form action="{{ route('admin.rates.change') }}" method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="dolar_peso">Tasa: Dólar - Pesos Colombianos</label>
                                            <input type="text" id="dolar_peso" name="dolar_peso" class="form-control" value="{{ old('dolar_peso') }}" placeholder="Valor del Dólar con respecto al Peso Colombiano">
                                            @error('dolar_peso')
                                                <p class="p-2 text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="dolar_bs">Tasa: Dólar - Bolívares (Bs.S) </label>
                                            <input type="text" id="dolar_bs" class="form-control" name="dolar_bs" value="{{ old('dolar_bs') }}" placeholder="Valor del Dólar con respecto al Bolívar">
                                            @error('dolar_bs')
                                                <p class="p-2 text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="pesos_bs">Tasa: Pesos Colombianos - Bolívares (Bs.S)</label>
                                            <input type="text" name="pesos_bs" class="form-control" id="pesos_bs" value="{{ old('pesos_bs') }}" placeholder="Valor del Peso Colombiano con respecto al Bolívar">
                                            @error('pesos_bs')
                                                <p class="p-2 text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Actualizar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-round btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>

@endsection
