<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('css/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/JQuery.js')}}"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
   
</body>
</html> 