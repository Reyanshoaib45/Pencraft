@extends('layouts.app')

@section('content')
    <main class="container mx-auto px-4 py-16 max-w-7xl">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Customers</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Thousands of teams trust StreamLine to boost their productivity
            </p>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center">Trusted by Industry Leaders</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/368px-Google_2015_logo.svg.png" alt="Google" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Microsoft_logo.svg/512px-Microsoft_logo.svg.png" alt="Microsoft" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/488px-Apple_logo_black.svg.png" alt="Apple" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Amazon_logo.svg/603px-Amazon_logo.svg.png" alt="Amazon" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/799px-Netflix_2015_logo.svg.png" alt="Netflix" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Salesforce_logo.svg/512px-Salesforce_logo.svg.png" alt="Salesforce" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Atlassian_logo.svg/512px-Atlassian_logo.svg.png" alt="Atlassian" class="h-12 max-w-full">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Slack_Technologies_Logo.svg/512px-Slack_Technologies_Logo.svg.png" alt="Slack" class="h-12 max-w-full">
                </div>
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-10 text-center">Success Stories</h2>

            <div class="space-y-12">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/3">
                            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692" alt="Team collaboration" class="h-48 w-full object-cover rounded-lg mb-4">
                            <h3 class="text-xl font-bold">Acme Corporation</h3>
                            <p class="text-gray-600">Software Development</p>
                        </div>
                        <div class="md:w-2/3">
                            <blockquote class="text-lg text-gray-700 italic mb-6">
                                "StreamLine has transformed how our team collaborates. We've seen a 40% increase in productivity since implementing the platform across our organization."
                            </blockquote>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5" alt="Profile" class="h-12 w-12 rounded-full mr-4">
                                <div>
                                    <p class="font-semibold">John Smith</p>
                                    <p class="text-gray-600">CTO, Acme Corporation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/3">
                            <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72" alt="Office environment" class="h-48 w-full object-cover rounded-lg mb-4">
                            <h3 class="text-xl font-bold">TechCorp</h3>
                            <p class="text-gray-600">SaaS Platform</p>
                        </div>
                        <div class="md:w-2/3">
                            <blockquote class="text-lg text-gray-700 italic mb-6">
                                "The automation capabilities in StreamLine have saved us countless hours of manual work. Our team can now focus on what really matters — building great products."
                            </blockquote>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Profile" class="h-12 w-12 rounded-full mr-4">
                                <div>
                                    <p class="font-semibold">Sarah Johnson</p>
                                    <p class="text-gray-600">Product Manager, TechCorp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="md:w-1/3">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0" alt="Business meeting" class="h-48 w-full object-cover rounded-lg mb-4">
                            <h3 class="text-xl font-bold">Global Enterprises</h3>
                            <p class="text-gray-600">Enterprise Solutions</p>
                        </div>
                        <div class="md:w-2/3">
                            <blockquote class="text-lg text-gray-700 italic mb-6">
                                "Implementing StreamLine across our 500+ employee organization was seamless. The customer support team was exceptional throughout the onboarding process."
                            </blockquote>
                            <div class="flex items-center">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Profile" class="h-12 w-12 rounded-full mr-4">
                                <div>
                                    <p class="font-semibold">Robert Chen</p>
                                    <p class="text-gray-600">Director of Operations, Global Enterprises</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
