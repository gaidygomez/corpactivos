@extends('layouts.app')

@section('content')
<div class="wrapper">

    @include('layouts.navbar')

    @include('layouts.sidebar')

    <div id="main-content">

        @include('partials.marquee')

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
        
                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
