<header id="navbar"  style="background: dimgrey" class="fixed top-0 left-0 right-0 z-50 py-4 transition-all duration-300 ease-in-out  p-4">
    <div class="blog-container">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a  href="{{ route('home') }}" class="flex items-center">
                <h1 class="text-2xl font-bold tracking-tight text-black">Pencraft</h1>
                <span class="ml-1 text-black text-2xl">.</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">Home</a>
                <a href="{{ route('blog-page') }}" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">Blog</a>
                <a href="{{ route('contact') }}" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">Contact</a>
                <a href="{{ route('about') }}" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">About</a>

                <div class="hidden md:flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="ml-2 bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-md transition-colors">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                           class="ml-2 bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-md transition-colors">
                            Get Started
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-streamline-600">
                            Dashboard
                        </a>
                        @if (Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}"
                               class="ml-2 bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-md transition-colors">
                                Admin
                            </a>
                        @endif
                    @endguest
                </div>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="md:hidden pt-4 pb-2 hidden animate-fade-in">
            <div class="flex flex-col space-y-4">
                <a href="/" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">Home</a>
                <a href="/blog" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">Blog</a>
                <a href="/categories" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">Categories</a>
                <a href="/about" class="text-lg font-medium text-black hover:text-gray-600 transition-colors">About</a>
                <div class="flex items-center justify-between pt-2 mt-2 border-t">
                    <button class="p-2 rounded-full hover:bg-gray-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                    </button>
                    <button class="bg-black hover:bg-gray-800 text-white px-4 py-2 rounded-md transition-colors">Subscribe</button>
                </div>
            </div>
        </nav>
    </div>
</header>
