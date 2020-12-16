@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle maintenance">
        <div class="text-center">
            <article>
                <h1>{{ __('auth.Verify Your Email Address') }}</h1>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('auth.A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div>
                    <p>{{ __('auth.Before proceeding, please check your email for a verification link.') }} <br>
                    {{ __('auth.If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-button btn-outline-primary p-2 m-1 align-baseline">{{ __('auth.click here to request another') }}</button>.
                    </form>
                    </p>
                </div>
            </article>
            <div class="margin-top-30">
                <a href=" {{ url('/') }} " class="btn btn-default"><i class="fa fa-arrow-left"></i><span>Regresar</span></a>
            </div>
        </div>
        </div>
    </div> 
</div>
@endsection
