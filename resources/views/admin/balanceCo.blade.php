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
                        <h2>Balance Colombia</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Balance Colombia</li>
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
                        <div class="text-left">
                            <button type="button" class="btn btn-sm mb-1 btn-filter bg-light" data-target="all">Todos</button>
                            @foreach ($deposits as $deposit)
                            <button type="button" class="btn btn-sm mb-1 btn-filter bg-light" data-target="{{$deposit->acronym}}">{{$deposit->name_bank}}</button>
                            @endforeach
                        </div>
                        <table class="table table-hover table-custom spacing8 mb-0">
                            <tbody>
                                @foreach ($deposits as $deposit)
                                    <tr data-status="{{ $deposit->acronym }}">
                                        <td></td>
                                        <td>
                                            {{ $deposit->name }}
                                        </td>
                                        <td>
                                            {{ $deposit->amount }}
                                        </td>
                                        <td>
                                            {{ $deposit->voucher }}
                                        </td>
                                        <td>
                                             {{ $deposit->name_bank }}
                                        </td>
                                        <td>
                                            <span class="badge {{ $deposit->status == 0 ? 'badge-warning' : 'badge-primary' }} "> {{ $deposit->status == 0 ? 'Pendiente' : 'Aprobado' }} </span>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach ($banks as $bank)
                                    <tr data-status="{{ $deposit->acronym }}">
                                        <td></td>
                                        <td></td>
                                        <td>
                                            {{ $bank->name }}
                                        </td>
                                        <td>
                                            {{ $bank->balance }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot> {{ $deposits->links() }} </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection