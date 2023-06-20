<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/scss/app.scss'])
    <title>@yield('title')</title>
</head>

<body>

    @include('layouts.partials.header')

    @include('layouts.partials.nav')

    @yield('content')

    @include('layouts.partials.footer')
</body>

</html>
