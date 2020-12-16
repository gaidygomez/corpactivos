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
                        <h2>Balance para los Bancos en Colombia</h2>
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
                            <form action="{{ route('balance.values') }}" method="POST">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12" style="padding: 0 2rem;">
                                        <label for="bbank">Banco al que Ingresar Balance</label>
                                            <div class="form-group">
                                                @error('bank')
                                                    <p class="text-danger"> {{ $message }} </p>
                                                @enderror
                                                <select class="form-control show-tick" name="bank" id="bbank">
                                                    @foreach ($banks as $bank)
                                                        <option value="{{$bank->acronym}}"> {{ $bank->name_bank }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="balance">Balance del Banco</label>
                                            <input type="text" id="balance" class="form-control" name="balance" value="{{ old('balance') }}" placeholder="Balance del Banco">
                                            @error('balance')
                                                <p class="p-2 text-danger"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-round btn-primary">Actualizar</button> &nbsp;&nbsp;
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
                                            <th>Nombre del Banco</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($banks as $key => $bank)
                                        <tr>
                                            <td> {{ ($key+1) }} </td>
                                            <td> {{ $bank->name_bank }} </td>
                                            <td> {{ number_format($bank->balance, 2, ',', '.') }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- <tfoot> {{ $banks->links() }} </tfoot> --}}
                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
