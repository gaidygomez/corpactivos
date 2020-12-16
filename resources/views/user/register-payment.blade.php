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
                        <h2>Registrar Pagos</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registrar Pagos</li>
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
                            <h2>Datos del Pago</h2>
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
                            <form action=" {{ route('register.payment') }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <label for="bname">Número de la Cuenta Bancaria</label>                                                
                                        <div class="form-group">
                                            @error('bname')
                                                <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                            <select class="form-control show-tick" name="bname">
                                                @foreach ($accounts as $account)
                                                    <option value="{{$account->beneficiary_bank}}"> {{ $account->name_bank.' - '.$account->beneficiary }} </option>
                                                @endforeach
                                            </select>
                                        </div>                         
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label for="bban">Banco al que hizo la Transferencia</label>
                                        <div class="form-group">
                                            @error('bban')
                                                <p class="text-danger"> {{ $message }} </p>
                                            @enderror
                                            <select class="form-control show-tick" name="bban">
                                                @foreach ($banks as $bank)
                                                    <option value="{{$bank->acronym}}"> {{ $bank->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label>Monto Depositado</label>
                                        @error('amount')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                        <div class="form-group">
                                            <input id="amount" type="text" name="amount" class="form-control" placeholder="Monto Depositado en Pesos">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label>Número de Voucher</label>
                                        @error('voucher')
                                            <p class="text-danger"> {{ $message }} </p>
                                        @enderror
                                        <div class="form-group">
                                            <input type="text" name="voucher" class="form-control" placeholder="Número de Voucher">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-12 col-md-6 text-right hidden-xs">
                                        <label for="voucher" class="btn btn-sm btn-primary btn-round mt-3" style="padding: .45rem 1.5rem;">
                                            <i class="fa fa-cloud-upload"></i>
                                             Foto del Voucher
                                        </label>
                                        <input type="file" name="photo_voucher" id="voucher" style="display: none;">
                                        @error('photo_voucher')
                                            <p class="text-danger"> {{ $message }} </p> 
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Registrar</button> &nbsp;&nbsp;
                                <button type="button" class="btn btn-round btn-default">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Pagos Registrados</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Beneficiario</th>
                                            <th>Banco del Beneficiario</th>
                                            <th>Banco de Colombia</th>
                                            <th>Monto Transferido</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($payments as $key => $payment)
                                        <tr>
                                            <td> {{ ($key+1) }} </td>
                                            <td> {{ $payment->beneficiary }} </td>
                                            <td> {{ $payment->name_bank }} </td>
                                            <td> {{ $payment->name }} </td>
                                            <td> {{ $payment->amount }} </td>
                                            <td> {{ $payment->created_at }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot> {{ $payments->links() }} </tfoot>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src=" {{ asset('js/calculate.js') }} "></script>
@endsection