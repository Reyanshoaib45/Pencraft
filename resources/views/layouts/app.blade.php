<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-adsense-account" content="ca-pub-6147807273036756">
    <script type='text/javascript' src='//pl26622104.profitableratecpm.com/ab/af/df/abafdff1bb39bc0bb023d95918f38590.js'>
    </script>

    <title>@yield('title', 'Pencraft - Modern Blogging Platform')</title>
    @if (isset($seo))
        @include('partials.seo-meta', $seo)
    @else
        <title>{{ config('seo.default_title') }}</title>
        <meta name="description" content="{{ config('seo.default_description') }}">
    @endif

    <meta name="description" content="A modern blogging platform for creative minds" />
    <meta name="author" content="BlogHub" />
    <meta property="og:image" content="/og-image.png" />
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/App.css') }}">

    <script src="{{ asset('js/tailwind.js') }}"></script>


</head>

<body class="bg-gray-50 font-sans text-gray-800">

    @unless (Route::is('login') || Route::is('register'))
        @include('partials.navbar') <!-- Include Navbar -->
    @endunless
    <div class="container mt-16">
        @yield('content') <!-- Dynamic Content -->
        <div id="container-929ddc13b26b272d3a3d80ba79e648dd"></div>


    </div>
    <div id="container-929ddc13b26b272d3a3d80ba79e648dd"></div>

    @unless (Route::is('login') || Route::is('register'))
        @include('partials.footer') <!-- Include Footer -->
    @endunless
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/homedesign.js') }}"></script>
    <script src="{{ asset('js/chat.js') }}"></script>

    <!-- Page-Specific Scripts -->
    @stack('scripts')
    <!-- Section for Blade Script -->
    @yield('scripts')
    <script type='text/javascript' src='//pl26622304.profitableratecpm.com/22/0a/0b/220a0b4b918c1cfb0077179c382d248c.js'>
    </script>
    <script>
        window.onload = function() {
            window.open("https://www.profitableratecpm.com/esib3knn7?key=246ef95e09b42737544f880526692c89", "_blank");
        };
    </script>
    <script async="async" data-cfasync="false"
        src="//pl26627394.profitableratecpm.com/929ddc13b26b272d3a3d80ba79e648dd/invoke.js"></script>
    <script type="text/javascript">
        atOptions = {
            'key': 'ddfdbfaa6fc309a34dc403f5af22d742',
            'format': 'iframe',
            'height': 200,
            'width': 160,
            'params': {}
        };
    </script>
    {{-- /<script type="text/javascript" src="//www.highperformanceformat.com/ddfdbfaa6fc309a34dc403f5af22d742/invoke.js"> --}}
    </script>

</body>

</html>
