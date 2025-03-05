@extends('layouts.app')
@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="{{ route('admin.users') }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Manage Users
                </a>
                <a href="{{ route('admin.posts') }}"
                   class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                    Manage Posts
                </a>
                <a href="{{ route('admin.messages') }}"
                   class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 px-4 rounded">
                    Messages
                    @if ($unreadMessagesCount > 0)
                        <span
                            class="inline-flex items-center justify-center ml-2 w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full">{{ $unreadMessagesCount }}</span>
                    @endif
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Users Stats Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-gray-600 text-sm font-semibold">Total Users</h2>
                        <p class="text-gray-800 text-3xl font-bold">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Posts Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-gray-600 text-sm font-semibold">Total Posts</h2>
                        <p class="text-gray-800 text-3xl font-bold">{{ $postsCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Published Posts Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-gray-600 text-sm font-semibold">Published Posts</h2>
                        <p class="text-gray-800 text-3xl font-bold">{{ $publishedPostsCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Draft Posts Card -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-gray-600 text-sm font-semibold">Draft Posts</h2>
                        <p class="text-gray-800 text-3xl font-bold">{{ $draftPostsCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Messages Section -->
        <div class="mt-8">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Contact Messages</h2>
                    <a href="{{ route('admin.messages') }}" class="text-indigo-600 hover:text-indigo-900">View All</a>
                </div>

                <div class="flex items-center space-x-8">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm font-semibold">Total Messages</h2>
                            <p class="text-gray-800 text-3xl font-bold">{{ $messagesCount }}</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-gray-600 text-sm font-semibold">Unread Messages</h2>
                            <p class="text-gray-800 text-3xl font-bold">{{ $unreadMessagesCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
