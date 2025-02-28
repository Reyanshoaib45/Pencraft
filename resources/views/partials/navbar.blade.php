
<header class="fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300 py-5 bg-transparent">
    <div class="container mx-auto px-4 md:px-6 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <div class="h-9 w-9 rounded-full bg-streamline-600 flex items-center justify-center animate-pulse-soft">
                <span class="text-white font-display font-bold text-lg">S</span>
            </div>
            <span class="font-display font-semibold text-xl text-gray-900">StreamLine</span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-8">
            <a href="#features" class="text-sm font-medium text-gray-700 hover:text-streamline-600 transition-colors link-underline">
                Features
            </a>
            <a href="#testimonials" class="text-sm font-medium text-gray-700 hover:text-streamline-600 transition-colors link-underline">
                Testimonials
            </a>
            <a href="#pricing" class="text-sm font-medium text-gray-700 hover:text-streamline-600 transition-colors link-underline">
                Pricing
            </a>
            <a href="#blog" class="text-sm font-medium text-gray-700 hover:text-streamline-600 transition-colors link-underline">
                Blog
            </a>
        </nav>

        <!-- CTA Buttons -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-streamline-600">
                Sign in
            </a>
            <a href="{{ route('register') }}" class="bg-streamline-600 hover:bg-streamline-700 text-white font-medium py-2 px-4 rounded-md transition-colors text-sm">
                Get Started
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button 
            id="mobile-menu-button"
            class="md:hidden p-2 rounded-full hover:bg-gray-100 transition-colors"
            aria-label="Open menu"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden absolute top-full left-0 right-0 bg-white border-t border-gray-100 shadow-md hidden">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex flex-col space-y-4">
                <a 
                    href="#features" 
                    class="px-4 py-2 text-base font-medium text-gray-700 hover:text-streamline-600 hover:bg-gray-50 rounded-md transition-colors"
                >
                    Features
                </a>
                <a 
                    href="#testimonials" 
                    class="px-4 py-2 text-base font-medium text-gray-700 hover:text-streamline-600 hover:bg-gray-50 rounded-md transition-colors"
                >
                    Testimonials
                </a>
                <a 
                    href="#pricing" 
                    class="px-4 py-2 text-base font-medium text-gray-700 hover:text-streamline-600 hover:bg-gray-50 rounded-md transition-colors"
                >
                    Pricing
                </a>
                <a 
                    href="#blog" 
                    class="px-4 py-2 text-base font-medium text-gray-700 hover:text-streamline-600 hover:bg-gray-50 rounded-md transition-colors"
                >
                    Blog
                </a>
                <div class="pt-2 border-t border-gray-100 flex flex-col space-y-3">
                    <a 
                        href="{{ route('login') }}" 
                        class="px-4 py-2 text-base font-medium text-gray-700 hover:text-streamline-600 hover:bg-gray-50 rounded-md transition-colors"
                    >
                        Sign in
                    </a>
                    <a 
                        href="{{ route('register') }}" 
                        class="bg-streamline-600 hover:bg-streamline-700 text-white font-medium py-2 px-4 rounded-md transition-colors mx-4"
                    >
                        Get Started
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>
