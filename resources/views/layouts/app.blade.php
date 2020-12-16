<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }} ">
<link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }} ">
<link rel="stylesheet" href=" {{ asset('css/vivify.min.css') }} ">
<link rel="stylesheet" href=" {{ asset('css/c3.min.css') }} ">

<!-- MAIN CSS -->
<link rel="stylesheet" href=" {{ asset('css/site.min.css')}} ">

</head>

<body class="theme-cyan font-montserrat light_version">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

@yield('content')
<!-- END WRAPPER -->

<script src=" {{ asset('js/libscripts.bundle.js') }} "></script>    
<script src=" {{ asset('js/vendorscripts.bundle.js') }} "></script>
<script src=" {{ asset('js/c3.bundle.js') }} "></script>
<script src=" {{ asset('js/index.js') }} "></script>
<script src=" {{ asset('js/table-filter.js') }} "></script>
<script src=" {{ asset('js/mainscripts.bundle.js') }} "></script>
</body>
</html>
