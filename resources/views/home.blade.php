@extends('layouts.app')
@section('title', 'Pencraft - Modern Blogging Platform')
@section('content')
    <main>
        <!-- Hero Section -->
        <section class="pt-32 pb-20 md:pt-44 md:pb-28 relative overflow-hidden">
            <!-- Background Element -->
            <div class="absolute top-0 right-0 w-1/2 h-1/2 opacity-50 -z-10">
                <div
                    class="absolute right-0 top-0 w-96 h-96 rounded-full bg-gradient-to-br from-gray-100 to-black opacity-20 blur-3xl">
                </div>
            </div>

            <div class="blog-container">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="inline-block px-4 py-1.5 mb-6 text-sm font-medium rounded-full bg-gray-100 animate-fade-in">
                        Professional Blogging Platform
                    </h2>

                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight animate-fade-in"
                        style="animation-delay: 0.2s;">
                        Where <span class="title-gradient">ideas</span> find their perfect expression
                    </h1>

                    <p class="text-lg md:text-xl text-gray-600 mb-8 animate-fade-in-up" style="animation-delay: 0.4s;">
                        Craft compelling stories, share expertise, and connect with readers through an elegant and
                        powerful blogging experience.
                    </p>

                    <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up"
                        style="animation-delay: 0.6s;">
                        <a href="{{ route('blog.create') }}"
                            class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-md text-lg flex items-center justify-center">
                            Start Writing
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="{{ route('blog.index') }}"
                            class="bg-white hover:bg-gray-100 text-black border border-gray-200 px-6 py-3 rounded-md text-lg">
                            Explore Blogs
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom floating element -->
            <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent opacity-80"></div>
        </section>

        <!-- Featured Posts Section -->
        <section class="py-20 bg-gray-50">
            <div class="blog-container">
                <div class="text-center mb-16">
                    <span class="px-3 py-1 text-xs font-medium rounded-full border border-gray-200 mb-4 inline-block">
                        Featured Articles
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Trending on Pencraft</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Explore our most popular articles read by thousands of curious minds.
                    </p>
                </div>

                <!-- Slider Section -->
                <div class="relative overflow-hidden" id="featured-slider">
                    <div class="flex transition-transform duration-500 ease-in-out" id="slider-container">

                        <!-- Slide 1 -->
                        <div class="w-full flex-shrink-0 px-4">
                            <div
                                class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow overflow-hidden flex flex-col md:flex-row">
                                <div class="md:w-1/2 relative h-64 md:h-auto">
                                    <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?auto=format&fit=crop&w=800&q=80"
                                        alt="Technology Blog" class="w-full h-full object-cover" loading="lazy" />
                                </div>
                                <div class="md:w-1/2 p-8 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <span class="bg-gray-100 text-xs font-medium px-2.5 py-0.5 rounded mr-2">
                                                Writing
                                            </span>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                6 min read
                                            </div>
                                        </div>
                                        <h3 class="text-2xl font-bold mb-4">The Art of Crafting Compelling Blog Content</h3>
                                        <p class="text-gray-600 mb-4">Discover the secrets to writing blog posts that
                                            captivate your audience.</p>
                                    </div>
                                    <div class="mt-auto flex items-center justify-between">
                                        <div>
                                            <p class="font-medium">Emma Johnson</p>
                                            <p class="text-sm text-gray-500">May 15, 2023</p>
                                        </div>
                                        <button class="text-black hover:text-gray-600">
                                            Read Article
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="w-full flex-shrink-0 px-4">
                            <div
                                class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow overflow-hidden flex flex-col md:flex-row">
                                <div class="md:w-1/2 relative h-64 md:h-auto">
                                    <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=80"
                                        alt="Business Blog" class="w-full h-full object-cover" loading="lazy" />
                                </div>
                                <div class="md:w-1/2 p-8 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <span class="bg-gray-100 text-xs font-medium px-2.5 py-0.5 rounded mr-2">
                                                Business
                                            </span>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                8 min read
                                            </div>
                                        </div>
                                        <h3 class="text-2xl font-bold mb-4">Mastering the Art of Business Blogging</h3>
                                        <p class="text-gray-600 mb-4">Learn how to create blog content that boosts your
                                            brand and revenue.</p>
                                    </div>
                                    <div class="mt-auto flex items-center justify-between">
                                        <div>
                                            <p class="font-medium">John Doe</p>
                                            <p class="text-sm text-gray-500">June 20, 2023</p>
                                        </div>
                                        <button class="text-black hover:text-gray-600">
                                            Read Article
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 3 (Newly Added) -->
                        <div class="w-full flex-shrink-0 px-4">
                            <div
                                class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow overflow-hidden flex flex-col md:flex-row">
                                <div class="md:w-1/2 relative h-64 md:h-auto">
                                    <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=80"
                                        alt="Business Blog" class="w-full h-full object-cover" loading="lazy" />
                                </div>
                                <div class="md:w-1/2 p-8 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center mb-4">
                                            <span class="bg-gray-100 text-xs font-medium px-2.5 py-0.5 rounded mr-2">
                                                Marketing
                                            </span>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <polyline points="12 6 12 12 16 14" />
                                                </svg>
                                                10 min read
                                            </div>
                                        </div>
                                        <h3 class="text-2xl font-bold mb-4">Content Marketing Strategies for 2024</h3>
                                        <p class="text-gray-600 mb-4">Discover the latest trends in content marketing that
                                            drive engagement.</p>
                                    </div>
                                    <div class="mt-auto flex items-center justify-between">
                                        <div>
                                            <p class="font-medium">Sarah Lee</p>
                                            <p class="text-sm text-gray-500">July 5, 2023</p>
                                        </div>
                                        <button class="text-black hover:text-gray-600">
                                            Read Article
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>



        <!-- About Section -->
        <section class="py-20">
            <div class="blog-container">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="order-2 md:order-1">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Feature 1 -->
                            <div
                                class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all hover:translate-y-[-5px]">
                                <div class="mb-4 bg-gray-100 inline-flex p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6 text-black">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z" />
                                        <path d="m15 5 4 4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold mb-2">Elegant Writing Experience</h3>
                                <p class="text-gray-600">Our distraction-free editor lets you focus on what matters
                                    most—your words.</p>
                            </div>
                            <!-- Feature 2 -->
                            <div
                                class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all hover:translate-y-[-5px]">
                                <div class="mb-4 bg-gray-100 inline-flex p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6 text-black">
                                        <path d="M3 3v18h18" />
                                        <path d="m19 9-5 5-4-4-3 3" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold mb-2">Powerful Analytics</h3>
                                <p class="text-gray-600">Gain insights into your audience with comprehensive analytics
                                    and reader metrics.</p>
                            </div>
                            <!-- Feature 3 -->
                            <div
                                class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all hover:translate-y-[-5px]">
                                <div class="mb-4 bg-gray-100 inline-flex p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6 text-black">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold mb-2">SEO Optimization</h3>
                                <p class="text-gray-600">Every article you publish is automatically optimized for search
                                    engines.</p>
                            </div>
                            <!-- Feature 4 -->
                            <div
                                class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all hover:translate-y-[-5px]">
                                <div class="mb-4 bg-gray-100 inline-flex p-3 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="h-6 w-6 text-black">
                                        <polyline points="4 7 4 4 20 4 20 7" />
                                        <line x1="9" x2="15" y1="20" y2="20" />
                                        <line x1="12" x2="12" y1="4" y2="20" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold mb-2">Beautiful Typography</h3>
                                <p class="text-gray-600">Your content deserves beautiful presentation with carefully
                                    selected typography.</p>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 md:order-2">
                        <div class="mb-4 flex items-center">
                            <div
                                class="bg-gray-100 rounded-full px-4 py-1 text-black font-medium flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z" />
                                    <path d="M5 3v4" />
                                    <path d="M19 17v4" />
                                    <path d="M3 5h4" />
                                    <path d="M17 19h4" />
                                </svg>
                                Why Choose Pencraft
                            </div>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">
                            Designed for those who demand the finest writing experience
                        </h2>
                        <p class="text-gray-600 mb-6 text-lg">
                            Pencraft combines sophisticated design with powerful features to create the ideal
                            environment for professional bloggers and content creators.
                        </p>
                        <p class="text-gray-600 mb-6">
                            Whether you're sharing industry insights, creative narratives, or expert tutorials, our
                            platform adapts to your unique voice and style.
                        </p>
                        <div class="flex items-center space-x-4">
                            <div class="flex -space-x-2">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User"
                                    class="w-10 h-10 rounded-full border-2 border-white" />
                                <img src="https://randomuser.me/api/portraits/men/86.jpg" alt="User"
                                    class="w-10 h-10 rounded-full border-2 border-white" />
                                <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="User"
                                    class="w-10 h-10 rounded-full border-2 border-white" />
                            </div>
                            <p class="text-gray-600 text-sm">
                                <span class="font-medium text-gray-900">10,000+</span> content creators trust Pencraft
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Subscribe Section -->
        <section class="py-24 bg-gradient-to-br from-white to-gray-100 relative overflow-hidden d-flex justify-center">
            <!-- Background elements -->
            <div class="absolute top-0 left-0 w-full h-full opacity-50 -z-10">
                <div class="absolute left-10 top-10 w-72 h-72 rounded-full bg-gray-100 opacity-40 blur-3xl"></div>
                <div class="absolute right-10 bottom-10 w-80 h-80 rounded-full bg-black opacity-10 blur-3xl"></div>
            </div>

            <div class="blog-container max-w-4xl">
                <div class="glass-effect rounded-3xl shadow-lg py-12 px-6 md:px-12 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        Stay Inspired & Informed
                    </h2>
                    <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                        Subscribe to our newsletter for curated content, writing tips, and exclusive insights delivered
                        directly to your inbox.
                    </p>

                    <form id="subscribe-form" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                        <input type="email" placeholder="Your email address"
                            class="flex-grow py-3 px-4 text-base rounded-lg border border-gray-200" required />
                        <button type="submit" class="bg-black hover:bg-gray-800 text-white py-3 px-6 rounded-lg">
                            Subscribe
                        </button>
                    </form>

                    <p class="text-xs text-gray-500 mt-4">
                        By subscribing, you agree to our Privacy Policy and consent to receive updates from our company.
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
