<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Pencraft - Modern Blogging Platform')</title>
    @if (isset($seo))
        @include('partials.seo-meta', $seo)
    @else
        <title>{{ config('seo.default_title') }}</title>
        <meta name="description" content="{{ config('seo.default_description') }}">
    @endif

    <meta name="description" content="A modern blogging platform for creative minds" />
    <meta name="author" content="M Reyan Shoaib" />
    <meta property="og:image" content="/og-image.png" />
    <!-- Bootstrap CSS CDN -->
    <script src="{{ asset('css/boatstrap.css') }}"></script>
    <!-- Tailwind CSS CDN -->
    <script src="{{ asset('css/tailwind.css') }}"></script>
    <!-- Jquery-->
    <script src="{{ asset('js/Jquery.js') }}"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="{{ asset('fonts/googleapis.css') }}"></script>
    <!-- Font Awesome Icons -->
    <script src="{{ asset('css/fontawesome.css') }}"></script>
    <!-- Custom Styles -->
    {{-- <link rel="stylesheet" href="/src/App.css"> --}}
    <script src="{{ asset('css/App.css') }}"></script>
    <script src="{{ asset('js/tailwind.js') }}"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">
    @unless (Route::is('login') || Route::is('register'))
        @include('partials.navbar') <!-- Include Navbar -->
    @endunless
    <div class="container mt-16">
        @yield('content') <!-- Dynamic Content -->
    </div>
    @unless (Route::is('login') || Route::is('register'))
        @include('partials.footer') <!-- Include Footer -->
    @endunless
    <script src="{{ asset('js/homedesign.js') }}"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
    <script src="{{ asset('js/boatstrap.js') }}"></script>
    <script src="{{ asset('js/pencraft.js') }}"></script>
    <!-- Page-Specific Scripts -->
    @stack('scripts')
    <!-- Section for Blade Script -->
    @yield('scripts')
</body>

</html>
