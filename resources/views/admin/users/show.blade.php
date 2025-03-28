
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">User Details</h1>
        <div>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded mr-2">
                Edit User
            </a>
            <a href="{{ route('admin.users') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                Back to Users
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 mb-6 md:mb-0">
                <div class="flex justify-center">
                    @if ($user->profile_picture)
                        <img loading="lazy" class="h-48 w-48 rounded-full object-cover" src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}">
                    @else
                        <div class="h-48 w-48 rounded-full bg-gray-300 flex items-center justify-center">
                            <span class="text-gray-600 text-6xl font-medium">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                    @endif
                </div>
                <div class="mt-6 text-center">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    <div class="mt-2">
                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $user->is_admin ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                            {{ $user->is_admin ? 'Admin' : 'User' }}
                        </span>
                    </div>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-2">Social Links</h3>
                    <ul class="space-y-2">
                        @if($user->twitter)
                        <li>
                            <span class="text-gray-600">Twitter:</span>
                            <a href="https://twitter.com/{{ $user->twitter }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $user->twitter }}
                            </a>
                        </li>
                        @endif

                        @if($user->facebook)
                        <li>
                            <span class="text-gray-600">Facebook:</span>
                            <a href="https://facebook.com/{{ $user->facebook }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $user->facebook }}
                            </a>
                        </li>
                        @endif

                        @if($user->linkedin)
                        <li>
                            <span class="text-gray-600">LinkedIn:</span>
                            <a href="https://linkedin.com/in/{{ $user->linkedin }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $user->linkedin }}
                            </a>
                        </li>
                        @endif

                        @if($user->instagram)
                        <li>
                            <span class="text-gray-600">Instagram:</span>
                            <a href="https://instagram.com/{{ $user->instagram }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ $user->instagram }}
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="md:w-2/3 md:pl-8">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Bio</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        @if($user->bio)
                            <p class="text-gray-700">{{ $user->bio }}</p>
                        @else
                            <p class="text-gray-500 italic">No bio provided</p>
                        @endif
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Activity</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-white p-4 rounded shadow">
                                <h4 class="text-md font-medium text-gray-700">Posts</h4>
                                <div class="mt-2 flex justify-between">
                                    <span class="text-xl font-bold">{{ $user->posts_count }}</span>
                                    <div>
                                        <span class="text-sm text-green-600">{{ $user->published_posts_count }} published</span>
                                        <span class="block text-sm text-amber-600">{{ $user->draft_posts_count }} drafts</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white p-4 rounded shadow">
                                <h4 class="text-md font-medium text-gray-700">Account Age</h4>
                                <div class="mt-2">
                                    <span class="text-xl font-bold">{{ $user->created_at->diffForHumans() }}</span>
                                    <span class="block text-sm text-gray-600 mt-1">Joined: {{ $user->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
