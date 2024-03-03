<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gallery Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @vite(['resources/plugins/justifiedGallery/dist/css/justifiedGallery.min.css', 'resources/plugins/justifiedGallery/dist/js/jquery.justifiedGallery.min.js'])


    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-gallery', 'resources/assets/sass/app.scss') }} --}}
</head>

<body>
    @persist('navbar-aside')
    @livewire('dashboard.navbar')
    @livewire('dashboard.aside')
    @endpersist()
    @yield('content')

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-gallery', 'resources/assets/js/app.js') }} --}}
</body>
