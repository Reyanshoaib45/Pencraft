
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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        @include('partials.navbar')

        <main class="flex-grow">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <!-- Additional Scripts -->
    <script>
        // Initialize mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    const isOpen = mobileMenu.classList.contains('block');
                    if (isOpen) {
                        mobileMenu.classList.remove('block', 'animate-fade-in');
                        mobileMenu.classList.add('hidden');
                    } else {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.classList.add('block', 'animate-fade-in');
                    }
                });
            }

            // Handle scroll for navbar
            const handleScroll = () => {
                const header = document.querySelector('header');
                if (header) {
                    if (window.scrollY > 20) {
                        header.classList.add('py-3', 'bg-white/95', 'backdrop-blur-md', 'shadow-sm');
                        header.classList.remove('py-5', 'bg-transparent');
                    } else {
                        header.classList.add('py-5', 'bg-transparent');
                        header.classList.remove('py-3', 'bg-white/95', 'backdrop-blur-md', 'shadow-sm');
                    }
                }
            };

            window.addEventListener('scroll', handleScroll);
            // Initialize on page load
            handleScroll();
        });
    </script>
</body>
</html>
