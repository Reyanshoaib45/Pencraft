
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Edit User</h1>
        <div>
            <a href="{{ route('admin.users.show', $user->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded mr-2">
                View User
            </a>
            <a href="{{ route('admin.users') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                Back to Users
            </a>
        </div>
    </div>

    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p class="font-bold">Please fix the following errors:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Basic Information</h2>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password (leave empty to keep current)</label>
                        <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="block text-gray-700 text-sm font-bold mb-2">Bio</label>
                        <textarea name="bio" id="bio" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('bio', $user->bio) }}</textarea>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold mb-4">Additional Information</h2>

                    <div class="mb-4">
                        <label for="profile_picture" class="block text-gray-700 text-sm font-bold mb-2">Profile Picture</label>
                        <div class="flex items-center space-x-4">
                            @if ($user->profile_picture)
                                <img loading="lazy" src="{{ asset('storage/' . $user->profile_picture) }}" alt="{{ $user->name }}" class="w-16 h-16 object-cover rounded-full">
                            @else
                                <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
                                    <span class="text-gray-600 text-2xl font-bold">{{ substr($user->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <input type="file" name="profile_picture" id="profile_picture" class="py-2 px-3">
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Leave empty to keep current picture</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Social Media Links</label>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="twitter" class="block text-gray-600 text-xs mb-1">Twitter</label>
                                <input type="text" name="twitter" id="twitter" value="{{ old('twitter', $user->twitter) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div>
                                <label for="facebook" class="block text-gray-600 text-xs mb-1">Facebook</label>
                                <input type="text" name="facebook" id="facebook" value="{{ old('facebook', $user->facebook) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div>
                                <label for="linkedin" class="block text-gray-600 text-xs mb-1">LinkedIn</label>
                                <input type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', $user->linkedin) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div>
                                <label for="instagram" class="block text-gray-600 text-xs mb-1">Instagram</label>
                                <input type="text" name="instagram" id="instagram" value="{{ old('instagram', $user->instagram) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_admin" class="mr-2" {{ $user->is_admin ? 'checked' : '' }}>
                            <span class="text-gray-700 font-bold">Admin Privileges</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
