
@extends('layouts.app')

@section('content')
<div class="bg-streamline-50 py-12">
    <div class="container mx-auto px-4 md:px-6 max-w-4xl">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('blog.show', $post->slug) }}" class="text-streamline-600 hover:text-streamline-700 inline-flex items-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to post
            </a>
        </div>

        <!-- Form Header -->
        <div class="mb-8 animate-fade-in">
            <h1 class="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4">
                Edit Blog Post
            </h1>
            <p class="text-lg text-gray-600">
                Update your post details below.
            </p>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8" role="alert">
                <p class="font-bold">Validation Error</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Blog Post Form -->
        <div class="bg-white rounded-xl shadow-subtle p-6 md:p-8 animate-fade-in">
            <form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent"
                        placeholder="Enter post title" 
                        value="{{ old('title', $post->title) }}"
                        required
                    >
                </div>
                
                <!-- Category -->
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select 
                        id="category" 
                        name="category" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent"
                        required
                    >
                        <option value="">Select a category</option>
                        <option value="Technology" {{ old('category', $post->category) == 'Technology' ? 'selected' : '' }}>Technology</option>
                        <option value="Productivity" {{ old('category', $post->category) == 'Productivity' ? 'selected' : '' }}>Productivity</option>
                        <option value="Design" {{ old('category', $post->category) == 'Design' ? 'selected' : '' }}>Design</option>
                        <option value="Business" {{ old('category', $post->category) == 'Business' ? 'selected' : '' }}>Business</option>
                        <option value="Marketing" {{ old('category', $post->category) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Remote Work" {{ old('category', $post->category) == 'Remote Work' ? 'selected' : '' }}>Remote Work</option>
                    </select>
                </div>
                
                <!-- Featured Image -->
                <div class="mb-6">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                    
                    @if ($post->featured_image)
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 mb-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Current featured image" class="w-48 h-auto rounded-md">
                        </div>
                    @endif
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-md px-6 py-8 text-center">
                        <div class="space-y-1 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="featured_image" class="relative cursor-pointer bg-white rounded-md font-medium text-streamline-600 hover:text-streamline-700 focus-within:outline-none">
                                    <span>Upload a new image</span>
                                    <input id="featured_image" name="featured_image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 2MB
                            </p>
                        </div>
                        <div id="image-preview" class="mt-4 hidden">
                            <div class="max-w-xs mx-auto">
                                <img id="preview-image" src="#" alt="Preview" class="max-h-48 rounded-md mx-auto">
                                <button type="button" id="remove-image" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                    Remove new image
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="mb-6">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea 
                        id="content" 
                        name="content" 
                        rows="12" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent"
                        placeholder="Write your blog post content here..."
                        required
                    >{{ old('content', $post->content) }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Markdown formatting supported</p>
                </div>
                
                <!-- Tags -->
                <div class="mb-6">
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                    <input 
                        type="text" 
                        id="tags" 
                        name="tags" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent"
                        placeholder="Enter tags separated by commas (e.g. productivity, tools, automation)" 
                        value="{{ old('tags', is_array($post->tags) ? implode(', ', $post->tags) : $post->tags) }}"
                    >
                    <p class="text-sm text-gray-500 mt-1">Separate tags with commas</p>
                </div>
                
                <!-- Publish Status -->
                <div class="mb-8">
                    <div class="flex items-center">
                        <input 
                            type="checkbox" 
                            id="is_published" 
                            name="is_published" 
                            class="h-4 w-4 text-streamline-600 focus:ring-streamline-500 border-gray-300 rounded"
                            {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                        >
                        <label for="is_published" class="ml-2 block text-sm text-gray-700">
                            Published
                        </label>
                    </div>
                    <p class="text-sm text-gray-500 mt-1 ml-6">
                        @if($post->is_published)
                            Published on {{ $post->published_at->format('M d, Y') }}
                        @else
                            Currently saved as draft
                        @endif
                    </p>
                </div>
                
                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('blog.show', $post->slug) }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-streamline-500 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-streamline-600 hover:bg-streamline-700 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-streamline-500 transition-colors">
                        Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const featuredImageInput = document.getElementById('featured_image');
        const imagePreview = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview-image');
        const removeImageButton = document.getElementById('remove-image');
        
        featuredImageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
        
        removeImageButton.addEventListener('click', function() {
            featuredImageInput.value = '';
            imagePreview.classList.add('hidden');
            previewImage.src = '#';
        });
    });
</script>
@endsection

@endsection
