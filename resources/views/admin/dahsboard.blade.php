@extends('layouts.app')

@section('content')
<div class="wrapper">

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')

    <div id="main-content">

        <div class="container-fluid">
            <div class="block-header">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            Admin
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
