<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>

    <x-header />

    @yield('content')

    <x-footer />

    <script src="{{ mix('js/app.js') }}"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-hover-dropdown.min.js') }}"></script>


    <script src="{{ asset('js/echo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>

</body>

</html>
