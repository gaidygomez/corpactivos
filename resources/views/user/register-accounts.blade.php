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
                        <h2>Añadir Cuentas</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Añadir Cuentas</li>
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
                            <h2>Datos del Beneficiario</h2>
                        </div>
                        <div class="body">
                            <div id="response">
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Muy bien</strong> {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                            </div>
                            <form action=" {{ route('register.account') }} " method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="bname">Nombre del Beneficiario</label>                                                
                                            <input type="text" name="bname" class="form-control" value="" placeholder="Nombre del Beneficiario">
                                            @error('bname')
                                                <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>                          
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label for="bban">Número de Cuenta del Beneficiario (Ingrese los 20 números, sin guiones o puntos) </label>
                                        <div class="form-group">
                                            <input type="text" name="bban" class="form-control" value="" placeholder="Número de Cuenta del Beneficiario">
                                            @error('bban')
                                                <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="form group">
                                            <label for="ci">Cédula del Beneficiario (Sin puntos, ni comas)</label>
                                            <div style="display: flex;">
                                                <select class="form-control show-tick" name="pre-ci" style="width: 12%; margin-right: .25rem;">
                                                    <option value="V">V</option>
                                                    <option value="E">E</option>
                                                    <option value="J">J</option>
                                                </select>
                                                <input type="text" name="ci" class="form-control" placeholder="Cédula del Beneficiario">
                                                </div>
                                            @error('ci')
                                                <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <label for="phone">Teléfono del Beneficiario (Ingrese con su código de País (+58)) </label>
                                        <input type="text" name="phone" class="form-control" placeholder="Teléfono del Beneficiario">
                                        @error('phone')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label>Tipo de Cuenta</label>
                                        <br>
                                        <label class="fancy-radio">
                                            <input type="radio" name="taccount" value="A">
                                            <span><i></i>Ahorro</span>
                                        </label>
                                        <label class="fancy-radio">
                                            <input type="radio" name="taccount" value="C">
                                            <span><i></i>Corriente</span>
                                        </label>
                                        @error('taccount')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                        <label for="bbank">Banco del Beneficiario</label>
                                            <div class="form-group">
                                                @error('bbank')
                                                    <p class="text-danger"> {{ $message }} </p>
                                                @enderror
                                                <select class="form-control show-tick" name="bbank" id="bbank">
                                                    @foreach ($banks as $bank)
                                                        <option value="{{$bank->acronym}}"> {{ $bank->name_bank }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Registrar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-round btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="text-left">
                            <button type="button" class="btn btn-sm mb-1 btn-filter bg-light" data-target="all">Todos</button>
                            @foreach ($banks as $bank)
                            <button type="button" class="btn btn-sm mb-1 btn-filter bg-light" data-target="{{$bank->acronym}}">{{$bank->name_bank}}</button>
                            @endforeach
                        </div>
                        <table class="table table-hover table-custom spacing8 mb-0">
                            <tbody>
                                @foreach ($accounts as $account)
                                    <tr data-status="{{ $account->acronym }}">
                                        <td></td>
                                        <td>
                                            <p> {{ $account->beneficiary }} </p>
                                        </td>
                                        <td>
                                            <span> {{ $account->beneficiary_bank }} </span>
                                            <p> {{ $account->name_bank }} </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot> {{ $accounts->links() }} </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection