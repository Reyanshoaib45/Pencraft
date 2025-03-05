<!-- Header Section -->
<header class="fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300 py-4 bg-white shadow-soft"
        id="header">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="h-9 w-9 rounded-full bg-primary flex items-center justify-center">
                    <span class="text-white font-bold text-lg">B</span>
                </div>
                <span class="font-bold text-xl text-dark">BlogHub</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#home"
                   class="text-sm font-medium text-gray-700 hover:text-primary transition-colors link-underline">
                    Home
                </a>
                <a href="#featured"
                   class="text-sm font-medium text-gray-700 hover:text-primary transition-colors link-underline">
                    Featured
                </a>
                <a href="#categories"
                   class="text-sm font-medium text-gray-700 hover:text-primary transition-colors link-underline">
                    Categories
                </a>
                <a href="#authors"
                   class="text-sm font-medium text-gray-700 hover:text-primary transition-colors link-underline">
                    Authors
                </a>
                <a href="#subscribe"
                   class="text-sm font-medium text-gray-700 hover:text-primary transition-colors link-underline">
                    Subscribe
                </a>
            </nav>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-streamline-600">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-streamline-600 hover:bg-streamline-700 text-white font-medium py-2 px-4 rounded-md transition-colors text-sm">
                        Get Started
                    </a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-streamline-600">
                        Dashboard
                    </a>
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-sm font-medium text-streamline-600 hover:text-streamline-700">
                            Admin
                        </a>
                    @endif
                @endguest
            </div>


            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden p-2 rounded-full hover:bg-gray-100 transition-colors"
                    aria-label="Open menu">
                <i class="fas fa-bars text-gray-700"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
         class="md:hidden hidden absolute top-full left-0 right-0 bg-white border-t border-gray-100 shadow-md animate-fade-in">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex flex-col space-y-4">
                <a href="#home"
                   class="px-4 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors">
                    Home
                </a>
                <a href="#featured"
                   class="px-4 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors">
                    Featured
                </a>
                <a href="#categories"
                   class="px-4 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors">
                    Categories
                </a>
                <a href="#authors"
                   class="px-4 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors">
                    Authors
                </a>
                <a href="#subscribe"
                   class="px-4 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors">
                    Subscribe
                </a>
                <div class="pt-2 border-t border-gray-100 flex flex-col space-y-3">
                    <a href="#"
                       class="px-4 py-2 text-base font-medium text-gray-700 hover:text-primary hover:bg-gray-50 rounded-md transition-colors">
                        Sign in
                    </a>
                    <a href="#"
                       class="px-5 py-2 bg-primary text-white rounded-full text-base font-medium hover:bg-secondary transition-colors mx-4 text-center">
                        Get Started
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>
