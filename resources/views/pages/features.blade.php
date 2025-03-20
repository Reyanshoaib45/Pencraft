@extends('layouts.app')
@section('content')
<main class="container mx-auto px-4 py-16 max-w-7xl">
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Pencraft Features</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Powerful tools designed to streamline your workflow and boost productivity
        </p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="h-12 w-12 bg-streamline-100 text-streamline-600 rounded-md flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Task Management</h3>
            <p class="text-gray-600">
                Organize your work with advanced task management. Create, assign, and track tasks with ease.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="h-12 w-12 bg-streamline-100 text-streamline-600 rounded-md flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 14v1"/><path d="M9 8v1"/><path d="M14 15V8"/></svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Real-time Analytics</h3>
            <p class="text-gray-600">
                Get insights into your team's performance with detailed analytics and customizable reports.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="h-12 w-12 bg-streamline-100 text-streamline-600 rounded-md flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10v12"/><path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z"/></svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Team Collaboration</h3>
            <p class="text-gray-600">
                Collaborate seamlessly with your team using shared workspaces, comments, and file sharing.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="h-12 w-12 bg-streamline-100 text-streamline-600 rounded-md flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="6" height="16" x="4" y="4" rx="2"/><rect width="6" height="9" x="14" y="11" rx="2"/><path d="M22 11v2"/></svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Custom Dashboards</h3>
            <p class="text-gray-600">
                Build personalized dashboards to track the metrics that matter most to your business.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="h-12 w-12 bg-streamline-100 text-streamline-600 rounded-md flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Global Accessibility</h3>
            <p class="text-gray-600">
                Access your work from anywhere with our cloud-based platform, available on all devices.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="h-12 w-12 bg-streamline-100 text-streamline-600 rounded-md flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v8"/><path d="m16 6-4-4-4 4"/><rect width="20" height="8" x="2" y="14" rx="2"/><path d="M6 18h.01"/><path d="M10 18h.01"/></svg>
            </div>
            <h3 class="text-xl font-semibold mb-2">Advanced Automation</h3>
            <p class="text-gray-600">
                Automate repetitive tasks and workflows to save time and reduce human error.
            </p>
        </div>
    </div>

    <div class="bg-streamline-50 rounded-xl p-8 mb-16">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold mb-4">Compare Plans</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Choose the right plan for your team's needs
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Starter</h3>
                <p class="text-streamline-600 text-2xl font-bold mb-4">$9<span class="text-sm text-gray-500 font-normal">/month</span></p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Up to 10 users
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Basic task management
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        5GB storage
                    </li>
                </ul>
                <a href="#" class="btn-primary w-full text-center">Get Started</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-2 border-streamline-500 relative">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-streamline-500 text-white px-4 py-1 rounded-full text-sm font-semibold">Most Popular</div>
                <h3 class="text-xl font-bold mb-2">Professional</h3>
                <p class="text-streamline-600 text-2xl font-bold mb-4">$29<span class="text-sm text-gray-500 font-normal">/month</span></p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Up to 50 users
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Advanced task management
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        50GB storage
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Custom dashboards
                    </li>
                </ul>
                <a href="#" class="btn-primary w-full text-center">Get Started</a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-2">Enterprise</h3>
                <p class="text-streamline-600 text-2xl font-bold mb-4">$99<span class="text-sm text-gray-500 font-normal">/month</span></p>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Unlimited users
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        All features included
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        1TB storage
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Dedicated support
                    </li>
                </ul>
                <a href="#" class="btn-primary w-full text-center">Contact Sales</a>
            </div>
        </div>
    </div>
</main>
@endsection
