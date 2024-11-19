<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link crossorigin="crossorigin" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <link crossorigin="anonymous" href="{{ asset('assets/styles/main.min.css') }}" media="screen" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ Request::url() }}" />

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <meta property="og:title" content="@yield('title')">
    <!-- Styles -->

    @yield('css')

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Almendra:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body x-data="global()" x-init="themeInit()" :class="isMobileMenuOpen ? 'max-h-screen overflow-hidden relative' : ''" class="bg-[#EEEBE6] dark:bg-primary">
    <div class="background-overlay"></div>
    @include('clients.partial.header')
    <main id="main">
        @yield('content')
    </main>
    @include('clients.partial.footer')
    

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://kit.fontawesome.com/8f417f2d01.js" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('javascript')
</body>

</html>