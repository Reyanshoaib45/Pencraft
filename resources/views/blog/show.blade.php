
@extends('layouts.app')

@section('content')
<div class="bg-white py-12">
    <div class="container mx-auto px-4 md:px-6">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('blog.index') }}" class="text-streamline-600 hover:text-streamline-700 inline-flex items-center transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to all posts
            </a>
        </div>

        <!-- Flash Messages -->
        <div id="flash-message-container">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
        </div>

        <!-- Article Header -->
        <header class="mb-10 animate-fade-in">
            <!-- Category Badge -->
            <div class="mb-4">
                <span class="bg-streamline-100 text-streamline-600 text-sm font-medium px-3 py-1 rounded-full">
                    {{ $post->category }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-display font-bold text-gray-900 mb-6 max-w-4xl">
                {{ $post->title }}
            </h1>

            <!-- Post Metadata -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 text-sm text-gray-500">
                <!-- Author Info -->
                <div class="flex items-center">
                    @if ($post->author->profile_picture)
                        <img loading="lazy" src="{{ asset('storage/' . $post->author->profile_picture) }}" alt="{{ $post->author->name }}" class="w-10 h-10 rounded-full mr-3 object-cover">
                    @else
                        <div class="w-10 h-10 rounded-full bg-streamline-100 text-streamline-600 flex items-center justify-center mr-3">
                            {{ substr($post->author->name, 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <div class="font-medium text-gray-900">{{ $post->author->name }}</div>
                        <div class="flex items-center text-gray-500">
                            <span>{{ $post->published_at?->format('M d, Y') ?? 'Not Published' }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                        </div>
                    </div>
                </div>

                <!-- Post Stats -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ $post->views }} views
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <span id="comment-count">{{ $post->comments->count() }}</span> comments
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-col md:flex-row gap-10">
            <!-- Main Content -->
            <main class="flex-1 animate-fade-in">
                <!-- Featured Image -->
                @if ($post->featured_image)
                    <div class="mb-8 rounded-xl overflow-hidden shadow-sm">
                        <img loading="lazy"
                            src="{{ asset('storage/' . $post->featured_image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-auto"
                        />
                    </div>
                @else
                    <div class="mb-8 rounded-xl overflow-hidden shadow-sm">
                        <img loading="lazy"
                            src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b"
                            alt="{{ $post->title }}"
                            class="w-full h-auto"
                        />
                    </div>
                @endif

                <!-- Content -->
                <div class="prose prose-lg max-w-none mb-10">
                    {!! $post->content !!}
                </div>

                <!-- Tags -->
                @if(count($post->tags) > 0)
                    <div class="mb-10">
                        <h3 class="text-lg font-semibold mb-3">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <span class="bg-gray-100 text-gray-800 text-sm font-medium px-3 py-1 rounded-full">
                                    #{{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Like/Dislike -->
                <div class="flex items-center space-x-4 mb-10 border-t border-b border-gray-100 py-6">
                    <span class="text-gray-700 font-medium">Was this article helpful?</span>
                    <button
                        type="button"
                        class="like-button flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-md transition-colors"
                        data-post-id="{{ $post->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                        Yes (<span id="likes-count">{{ $post->likes }}</span>)
                    </button>
                    <button
                        type="button"
                        class="dislike-button flex items-center bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-md transition-colors"
                        data-post-id="{{ $post->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.095c.5 0 .905-.405.905-.905 0-.714.211-1.412.608-2.006L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                        </svg>
                        No (<span id="dislikes-count">{{ $post->dislikes }}</span>)
                    </button>

                    <!-- Share Buttons -->
                    <div class="ml-auto">
                        <div class="flex items-center space-x-3">
                            <span class="text-gray-700">Share:</span>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="text-gray-500 hover:text-blue-400 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="text-gray-500 hover:text-blue-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="text-gray-500 hover:text-blue-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Author Bio -->
                <div class="bg-gray-50 rounded-xl p-6 mb-10">
                    <div class="flex flex-col md:flex-row gap-6">
                        @if ($post->author->profile_picture)
                            <img loading="lazy" src="{{ asset('storage/' . $post->author->profile_picture) }}" alt="{{ $post->author->name }}" class="w-20 h-20 rounded-full object-cover">
                        @else
                            <div class="w-20 h-20 rounded-full bg-streamline-100 text-streamline-600 flex items-center justify-center text-2xl font-semibold">
                                {{ substr($post->author->name, 0, 1) }}
                            </div>
                        @endif
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">About {{ $post->author->name }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ $post->author->bio ?? 'This author has not added a bio yet.' }}
                            </p>
                            <div class="flex space-x-4">
                                @if($post->author->twitter)
                                <a href="{{ $post->author->twitter }}" target="_blank" class="text-gray-500 hover:text-blue-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                                    </svg>
                                </a>
                                @endif
                                @if($post->author->facebook)
                                <a href="{{ $post->author->facebook }}" target="_blank" class="text-gray-500 hover:text-blue-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                                @endif
                                @if($post->author->linkedin)
                                <a href="{{ $post->author->linkedin }}" target="_blank" class="text-gray-500 hover:text-blue-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                        <rect x="2" y="9" width="4" height="12"></rect>
                                        <circle cx="4" cy="4" r="2"></circle>
                                    </svg>
                                </a>
                                @endif
                                @if($post->author->instagram)
                                <a href="{{ $post->author->instagram }}" target="_blank" class="text-gray-500 hover:text-pink-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <section class="mb-10">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-6">
                        Comments (<span id="comments-count">{{ $post->comments->count() }}</span>)
                    </h3>

                    @auth
                    <!-- Comment Form -->
                    <div class="mb-8">
                        <form id="comment-form" data-post-id="{{ $post->id }}">
                            @csrf
                            <div class="mb-4">
                                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Leave a comment</label>
                                <textarea
                                    id="content"
                                    name="content"
                                    rows="4"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent"
                                    required
                                ></textarea>
                            </div>
                            <button type="submit" class="bg-streamline-600 hover:bg-streamline-700 text-white font-medium py-2 px-4 rounded-md transition-colors text-sm">
                                Post Comment
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="bg-gray-50 p-4 rounded-md mb-8">
                        <p class="text-gray-700">Please <a href="{{ route('login') }}" class="text-streamline-600 hover:underline">log in</a> to leave a comment.</p>
                    </div>
                    @endauth

                    <!-- Comments List -->
                    <div id="comments-container" class="space-y-6">
                        @forelse($post->comments->where('parent_id', null) as $comment)
                            <div class="bg-white border border-gray-100 rounded-lg p-6" id="comment-{{ $comment->id }}">
                                <div class="flex items-start gap-4">
                                    @if ($comment->user->profile_picture)
                                        <img loading="lazy" src="{{ asset('storage/' . $comment->user->profile_picture) }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-streamline-100 text-streamline-600 flex items-center justify-center">
                                            {{ substr($comment->user->name, 0, 1) }}
                                        </div>
                                    @endif
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="font-medium text-gray-900">{{ $comment->user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
                                        </div>
                                        <div class="text-gray-700 mb-4">
                                            {{ $comment->content }}
                                        </div>

                                        @auth
                                        <!-- Reply Toggle -->
                                        <button
                                            class="text-sm text-streamline-600 hover:text-streamline-700 mb-4 reply-toggle"
                                            data-comment-id="{{ $comment->id }}"
                                        >
                                            Reply
                                        </button>

                                        <!-- Reply Form (Hidden by default) -->
                                        <div class="hidden reply-form" id="reply-form-{{ $comment->id }}">
                                            <form class="reply-comment-form" data-post-id="{{ $post->id }}" data-parent-id="{{ $comment->id }}">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <div class="mb-2">
                                                    <textarea
                                                        name="content"
                                                        rows="3"
                                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent text-sm"
                                                        required
                                                        placeholder="Write your reply..."
                                                    ></textarea>
                                                </div>
                                                <div class="flex justify-end">
                                                    <button type="button" class="text-gray-500 hover:text-gray-700 py-1 px-3 text-sm mr-2 cancel-reply" data-comment-id="{{ $comment->id }}">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="bg-streamline-600 hover:bg-streamline-700 text-white font-medium py-1 px-3 rounded-md transition-colors text-sm">
                                                        Post Reply
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        @endauth

                                        <!-- Replies -->
                                        <div class="ml-6 pl-6 border-l border-gray-100 mt-4 space-y-4 replies-container" id="replies-container-{{ $comment->id }}">
                                            @if($comment->replies->count() > 0)
                                                @foreach($comment->replies as $reply)
                                                    <div class="pt-4" id="comment-{{ $reply->id }}">
                                                        <div class="flex items-start gap-3">
                                                            @if ($reply->user->profile_picture)
                                                                <img loading="lazy" src="{{ asset('storage/' . $reply->user->profile_picture) }}" alt="{{ $reply->user->name }}" class="w-8 h-8 rounded-full object-cover">
                                                            @else
                                                                <div class="w-8 h-8 rounded-full bg-streamline-100 text-streamline-600 flex items-center justify-center text-xs">
                                                                    {{ substr($reply->user->name, 0, 1) }}
                                                                </div>
                                                            @endif
                                                            <div class="flex-1">
                                                                <div class="flex items-center justify-between mb-1">
                                                                    <div class="font-medium text-gray-900 text-sm">{{ $reply->user->name }}</div>
                                                                    <div class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</div>
                                                                </div>
                                                                <div class="text-gray-700 text-sm">
                                                                    {{ $reply->content }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-8" id="no-comments-message">
                                <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                            </div>
                        @endforelse
                    </div>
                </section>
            </main>

            <!-- Sidebar -->
            <aside class="w-full md:w-80 lg:w-96 animate-fade-in">
                <!-- Author Card -->
                <div class="bg-white border border-gray-100 rounded-xl p-6 mb-8 sticky top-24">
                    <!-- Post Actions -->
                    @auth
                        @if($post->author_id === Auth::id())
                            <div class="flex gap-2 mb-6">
                                <a href="{{ route('blog.edit', $post->id) }}" class="bg-streamline-600 hover:bg-streamline-700 text-white px-3 py-1 rounded text-sm flex-1 text-center">
                                    Edit
                                </a>
                                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm w-full">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth

                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Related Posts</h3>

                    @if($relatedPosts->count() > 0)
                        <div class="space-y-6">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0 w-20 h-20 rounded-md overflow-hidden">
                                        @if ($relatedPost->featured_image)
                                            <img loading="lazy"
                                                src="{{ asset('storage/' . $relatedPost->featured_image) }}"
                                                alt="{{ $relatedPost->title }}"
                                                class="w-full h-full object-cover"
                                            />
                                        @else
                                            <div class="w-full h-full bg-streamline-100 flex items-center justify-center text-streamline-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900 hover:text-streamline-600 transition-colors line-clamp-2">
                                            <a href="{{ route('blog.show', $relatedPost->slug) }}">
                                                {{ $relatedPost->title }}
                                            </a>
                                        </h4>
                                        <p class="text-sm text-gray-500 mt-1">{{ $relatedPost->published_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">No related posts found.</p>
                    @endif
                </div>
            </aside>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // CSRF Token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Reply toggle functionality
        const replyToggles = document.querySelectorAll('.reply-toggle');
        const cancelButtons = document.querySelectorAll('.cancel-reply');

        replyToggles.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const replyForm = document.getElementById('reply-form-' + commentId);
                replyForm.classList.toggle('hidden');
            });
        });

        cancelButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                const replyForm = document.getElementById('reply-form-' + commentId);
                replyForm.classList.add('hidden');
            });
        });

        // Handle main comment form submission
        const commentForm = document.getElementById('comment-form');
        if (commentForm) {
            commentForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const postId = this.getAttribute('data-post-id');
                const content = this.querySelector('textarea[name="content"]').value;

                if (!content.trim()) return;

                // Send AJAX request
                fetch(`/blog/${postId}/comment`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        content: content
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Clear form
                        commentForm.reset();

                        // Update comments count
                        const commentsCount = document.getElementById('comments-count');
                        const commentCount = document.getElementById('comment-count');
                        const currentCount = parseInt(commentsCount.textContent);
                        commentsCount.textContent = currentCount + 1;
                        commentCount.textContent = currentCount + 1;

                        // Create new comment HTML
                        const commentsContainer = document.getElementById('comments-container');
                        const noCommentsMessage = document.getElementById('no-comments-message');

                        // Remove "no comments" message if it exists
                        if (noCommentsMessage) {
                            noCommentsMessage.remove();
                        }

                        // Create comment element
                        const commentElement = document.createElement('div');
                        commentElement.className = 'bg-white border border-gray-100 rounded-lg p-6';
                        commentElement.id = `comment-${data.comment.id}`;

                        // Profile picture HTML
                        let profilePicHtml = '';
                        if (data.user_profile_picture) {
                            profilePicHtml = `<img loading="lazy" src="${data.user_profile_picture}" alt="${data.username}" class="w-10 h-10 rounded-full object-cover">`;
                        } else {
                            profilePicHtml = `<div class="w-10 h-10 rounded-full bg-streamline-100 text-streamline-600 flex items-center justify-center">${data.user_initial}</div>`;
                        }

                        // Set inner HTML
                        commentElement.innerHTML = `
                            <div class="flex items-start gap-4">
                                ${profilePicHtml}
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="font-medium text-gray-900">${data.username}</div>
                                        <div class="text-sm text-gray-500">${data.created_at}</div>
                                    </div>
                                    <div class="text-gray-700 mb-4">
                                        ${data.comment.content}
                                    </div>

                                    <button
                                        class="text-sm text-streamline-600 hover:text-streamline-700 mb-4 reply-toggle"
                                        data-comment-id="${data.comment.id}"
                                    >
                                        Reply
                                    </button>

                                    <div class="hidden reply-form" id="reply-form-${data.comment.id}">
                                        <form class="reply-comment-form" data-post-id="${postId}" data-parent-id="${data.comment.id}">
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            <input type="hidden" name="parent_id" value="${data.comment.id}">
                                            <div class="mb-2">
                                                <textarea
                                                    name="content"
                                                    rows="3"
                                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-streamline-500 focus:border-transparent text-sm"
                                                    required
                                                    placeholder="Write your reply..."
                                                ></textarea>
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="button" class="text-gray-500 hover:text-gray-700 py-1 px-3 text-sm mr-2 cancel-reply" data-comment-id="${data.comment.id}">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="bg-streamline-600 hover:bg-streamline-700 text-white font-medium py-1 px-3 rounded-md transition-colors text-sm">
                                                    Post Reply
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="ml-6 pl-6 border-l border-gray-100 mt-4 space-y-4 replies-container" id="replies-container-${data.comment.id}">
                                    </div>
                                </div>
                            </div>
                        `;

                        // Add new comment to top of comments
                        commentsContainer.prepend(commentElement);

                        // Re-bind event listeners for the new elements
                        bindReplyEvents();

                        // Show success message
                        showFlashMessage('Comment added successfully!', 'success');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showFlashMessage('There was an error posting your comment. Please try again.', 'error');
                });
            });
        }

        // Function to bind reply form events for dynamically added elements
        function bindReplyEvents() {
            // Bind new reply toggle buttons
            document.querySelectorAll('.reply-toggle').forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.getAttribute('data-comment-id');
                    const replyForm = document.getElementById('reply-form-' + commentId);
                    replyForm.classList.toggle('hidden');
                });
            });

            // Bind new cancel buttons
            document.querySelectorAll('.cancel-reply').forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.getAttribute('data-comment-id');
                    const replyForm = document.getElementById('reply-form-' + commentId);
                    replyForm.classList.add('hidden');
                });
            });

            // Bind reply form submissions
            document.querySelectorAll('.reply-comment-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const postId = this.getAttribute('data-post-id');
                    const parentId = this.getAttribute('data-parent-id');
                    const content = this.querySelector('textarea[name="content"]').value;

                    if (!content.trim()) return;

                    // Send AJAX request
                    fetch(`/blog/${postId}/comment`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            content: content,
                            parent_id: parentId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Clear form and hide it
                            form.reset();
                            const replyForm = document.getElementById('reply-form-' + parentId);
                            replyForm.classList.add('hidden');

                            // Update comments count
                            const commentsCount = document.getElementById('comments-count');
                            const commentCount = document.getElementById('comment-count');
                            const currentCount = parseInt(commentsCount.textContent);
                            commentsCount.textContent = currentCount + 1;
                            commentCount.textContent = currentCount + 1;

                            // Get replies container
                            const repliesContainer = document.getElementById('replies-container-' + parentId);

                            // Create reply element
                            const replyElement = document.createElement('div');
                            replyElement.className = 'pt-4';
                            replyElement.id = `comment-${data.comment.id}`;

                            // Profile picture HTML
                            let profilePicHtml = '';
                            if (data.user_profile_picture) {
                                profilePicHtml = `<img loading="lazy" src="${data.user_profile_picture}" alt="${data.username}" class="w-8 h-8 rounded-full object-cover">`;
                            } else {
                                profilePicHtml = `<div class="w-8 h-8 rounded-full bg-streamline-100 text-streamline-600 flex items-center justify-center text-xs">${data.user_initial}</div>`;
                            }

                            // Set inner HTML
                            replyElement.innerHTML = `
                                <div class="flex items-start gap-3">
                                    ${profilePicHtml}
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-1">
                                            <div class="font-medium text-gray-900 text-sm">${data.username}</div>
                                            <div class="text-xs text-gray-500">${data.created_at}</div>
                                        </div>
                                        <div class="text-gray-700 text-sm">
                                            ${data.comment.content}
                                        </div>
                                    </div>
                                </div>
                            `;

                            // Add new reply to the replies container
                            repliesContainer.appendChild(replyElement);

                            // Show success message
                            showFlashMessage('Reply added successfully!', 'success');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showFlashMessage('There was an error posting your reply. Please try again.', 'error');
                    });
                });
            });
        }

        // Bind initial reply events
        bindReplyEvents();

        // Like/Dislike functionality
        const likeButton = document.querySelector('.like-button');
        const dislikeButton = document.querySelector('.dislike-button');

        if (likeButton) {
            likeButton.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');

                fetch(`/blog/${postId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('likes-count').textContent = data.likes;
                        document.getElementById('dislikes-count').textContent = data.dislikes;
                        showFlashMessage('Thanks for your feedback!', 'success');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        }

        if (dislikeButton) {
            dislikeButton.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');

                fetch(`/blog/${postId}/dislike`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('likes-count').textContent = data.likes;
                        document.getElementById('dislikes-count').textContent = data.dislikes;
                        showFlashMessage('Thanks for your feedback!', 'success');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        }

        // Flash message function
        function showFlashMessage(message, type = 'success') {
            const container = document.getElementById('flash-message-container');
            const messageElement = document.createElement('div');

            let bgColor = 'bg-green-100';
            let borderColor = 'border-green-500';
            let textColor = 'text-green-700';

            if (type === 'error') {
                bgColor = 'bg-red-100';
                borderColor = 'border-red-500';
                textColor = 'text-red-700';
            }

            messageElement.className = `${bgColor} border-l-4 ${borderColor} ${textColor} p-4 mb-8 animate-fade-in`;
            messageElement.innerHTML = `<p>${message}</p>`;

            container.appendChild(messageElement);

            // Remove after 5 seconds
            setTimeout(() => {
                messageElement.classList.add('animate-fade-out');
                setTimeout(() => {
                    container.removeChild(messageElement);
                }, 500);
            }, 5000);
        }
    });
</script>
@endsection

@endsection
