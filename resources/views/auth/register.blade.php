@extends('layouts.app')
@section('content')
    <div class="py-20 min-h-screen flex items-center justify-center bg-gray-50">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md animate-fade-in">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Create Account</h1>
                <p class="text-gray-600">Join Pencraft and boost your productivity</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                        placeholder="Enter your name">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                        placeholder="Enter your email">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-1">Profile
                        Picture</label>
                    <div class="flex items-center space-x-4 mt-1">
                        <div class="w-16 h-16 rounded-full bg-gray-200 overflow-hidden flex items-center justify-center"
                            id="image-preview">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <input id="profile_picture" name="profile_picture" type="file" accept="image/*"
                                class="w-full text-sm text-gray-500 border border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:bg-streamline-500 file:text-white file:border-none hover:file:bg-streamline-600"
                                onchange="previewImage(this)">
                            <p class="mt-1 text-xs text-gray-500">JPG, PNG or GIF (Max. 2MB)</p>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Bio</label>
                    <textarea id="bio" name="bio" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                        placeholder="Tell us about yourself">{{ old('bio') }}</textarea>
                    @error('bio')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="facebook" class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                        <input id="facebook" name="facebook" type="text" value="{{ old('facebook') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                            placeholder="Facebook username">
                        @error('facebook')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="instagram" class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                        <input id="instagram" name="instagram" type="text" value="{{ old('instagram') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                            placeholder="Instagram username">
                        @error('instagram')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                        placeholder="Create a password">
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                        Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-streamline-500"
                        placeholder="Confirm your password">
                    @error('password_confirmation')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-streamline-600 text-white py-2 px-4 rounded-md hover:bg-streamline-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-streamline-500 transition-colors">
                        Create Account
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-streamline-600 hover:text-streamline-500 font-medium">
                        Sign in
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img loading="lazy" src="${e.target.result}" class="w-full h-full object-cover" alt="Profile Preview">`;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            `;
            }
        }
    </script>
@endsection
