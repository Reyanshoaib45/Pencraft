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
    <link rel="stylesheet" href="/src/App.css">
    <script src="{{ asset('js/tailwind.js') }}"></script>

    <!-- Load Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000000', // Black
                        secondary: '#333333', // Dark Gray
                        tertiary: '#666666', // Medium Gray
                        dark: '#000000', // Black
                        light: '#FFFFFF', // White
                        accent: '#DDDDDD', // Light Gray
                        muted: '#AAAAAA', // Muted Gray
                        streamline: {
                            50: "#F9F9F9",
                            100: "#EDEDED",
                            200: "#D6D6D6",
                            300: "#BFBFBF",
                            400: "#999999",
                            500: "#7F7F7F",
                            600: "#666666",
                            700: "#4D4D4D",
                            800: "#333333",
                            900: "#1A1A1A"
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Inter', 'sans-serif']
                    },
                    boxShadow: {
                        'soft': '0 5px 15px rgba(0, 0, 0, 0.1)',
                        'hover': '0 10px 25px rgba(0, 0, 0, 0.3)'
                    },
                    animation: {
                        "fade-in": "fadeIn 0.5s ease-out",
                        "scale-in": "scaleIn 0.3s ease-out",
                        "slide-in": "slideInLeft 0.6s ease-out",
                        "float": "float 6s ease-in-out infinite",
                        "pulse-soft": "pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite"
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        scaleIn: {
                            '0%': {
                                transform: 'scale(0.95)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
                            }
                        },
                        slideInLeft: {
                            '0%': {
                                transform: 'translateX(-20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        },
                        pulse: {
                            '0%, 100%': {
                                opacity: '1'
                            },
                            '50%': {
                                opacity: '0.7'
                            }
                        }
                    }
                }
            }
        }
    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/homedesign.js') }}"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
    {{-- <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script> --}}


    <!-- Page-Specific Scripts -->
    @stack('scripts')
    <!-- Section for Blade Script -->
    @yield('scripts')
</body>

</html>
