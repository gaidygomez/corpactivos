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
                        <h2>Historial</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Historial</li>
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
                            <h2>Historial</h2>
                        </div>
                        <div class="body">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong> {{ session('success') }} </strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Voucher</th>
                                            <th>Cuenta Destino</th>
                                            <th>Monto Depositado</th>
                                            <th>Monto a Recibir</th>
                                            <th>Fecha de la Operación</th>
                                            <th>Aprobar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposits as $key => $deposit)
                                            <tr>
                                                <td> {{ $deposit->user->fname }} {{ $deposit->user->lname }} </td>
                                                <td> {{ $deposit->voucher }} </td>
                                                <td> {{ $deposit->ban }} </td>
                                                <td> {{ $deposit->amount }} </td>
                                                <td> {{ $deposit->amount/$change->peso_bs }} </td>
                                                <td> {{ $deposit->created_at }} </td>
                                                <td> <a href="{{ route('admin.email.confirmation', [ 'id'=> $deposit->id ]) }}" class="btn btn-success">Aprobar</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $deposits->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection