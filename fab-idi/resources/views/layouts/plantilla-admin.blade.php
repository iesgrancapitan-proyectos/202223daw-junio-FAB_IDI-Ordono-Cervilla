<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite(['resources/scss/app.scss'])
</head>

<body id='body-admin'>
    
    <section id='body-section-left'>
        @include('layouts.partials.nav-admin')
    </section>
    
    <section id='body-section-right'>
        @include('layouts.partials.header-admin')
        @yield('content')
    </section>

</body>

</html>
