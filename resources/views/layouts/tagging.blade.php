<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('lib/remixicon/fonts/remixicon.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


        @yield('header')
        <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">

    </head>

    <body>

        @yield('content')

        <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('footer')
    </body>
</html>
