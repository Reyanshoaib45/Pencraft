
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StreamLine') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CDN for Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        streamline: {
                            50: "#f0f9ff",
                            100: "#e0f2fe",
                            200: "#bae6fd",
                            300: "#7dd3fc",
                            400: "#38bdf8",
                            500: "#0ea5e9",
                            600: "#0284c7",
                            700: "#0369a1",
                            800: "#075985",
                            900: "#0c4a6e"
                        },
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Inter', 'sans-serif']
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
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        scaleIn: {
                            '0%': { transform: 'scale(0.95)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        },
                        slideInLeft: {
                            '0%': { transform: 'translateX(-20px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        pulse: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.7' }
                        }
                    }
                },
            }
        }
    </script>

    <!-- CDN for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CDN for jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- Custom Styles -->
    <style>
        .btn-primary {
            @apply bg-streamline-600 text-white px-4 py-2 rounded-md hover:bg-streamline-700 transition-colors inline-block;
        }
        .link-underline {
            @apply relative after:absolute after:bottom-0 after:left-0 after:right-0 after:h-[2px] after:w-0 after:bg-streamline-500 after:transition-all hover:after:w-full;
        }
        /* Add more custom styles as needed */
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        @include('partials.navbar')

        <main class="flex-grow">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Mobile Menu JavaScript -->
    <script>
        $(document).ready(function() {
            // Initialize mobile menu functionality
            const mobileMenuButton = $('#mobile-menu-button');
            const mobileMenu = $('#mobile-menu');
            
            mobileMenuButton.on('click', function() {
                const isOpen = mobileMenu.hasClass('block');
                if (isOpen) {
                    mobileMenu.removeClass('block animate-fade-in').addClass('hidden');
                } else {
                    mobileMenu.removeClass('hidden').addClass('block animate-fade-in');
                }
            });

            // Handle scroll for navbar
            const handleScroll = () => {
                const header = $('header');
                if (header.length) {
                    if ($(window).scrollTop() > 20) {
                        header.addClass('py-3 bg-white/95 backdrop-blur-md shadow-sm').removeClass('py-5 bg-transparent');
                    } else {
                        header.addClass('py-5 bg-transparent').removeClass('py-3 bg-white/95 backdrop-blur-md shadow-sm');
                    }
                }
            };

            $(window).on('scroll', handleScroll);
            // Initialize on page load
            handleScroll();
        });
    </script>
</body>
</html>
