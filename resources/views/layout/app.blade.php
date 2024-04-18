<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('public\css\bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public\css\bootstrap.css.map')}}">
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.5/vue.global.js"></script>
    <script src="{{asset('public\js\bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public\js\bootstrap.bundle.js.map')}}"></script>
    @include('layout.navbar')
    @yield('content')

</body>
</html>
