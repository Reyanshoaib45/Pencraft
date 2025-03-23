<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Facades\Seo;

class BlogController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return Factory|View|Application|object
     */
    public function index()
    {
        $posts = Post::with('author')
            ->published()
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        $seo = Seo::setTitle('Blog')
            ->setDescription('Read the latest insights, tips, and strategies about productivity and team collaboration.')
            ->setKeywords('blog, productivity tips, team collaboration, project management, streamline')
            ->render();

        return view('blog.index', compact('posts', 'seo'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Application|Factory|object|View
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:50',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('featured_images', 'public');
            $validated['featured_image'] = $imagePath;
        }

        // Convert tags string to array
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        } else {
            $validated['tags'] = [];
        }

        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        $validated['author_id'] = Auth::id();

        if (isset($validated['is_published']) && $validated['is_published']) {
            $validated['published_at'] = now();
        }

        Post::create($validated);

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified post.
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $post = Post::with(['author', 'comments.user', 'comments.replies.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment view count
        $post->increment('views');

        // Get related posts
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        // Generate meta description from content
        $metaDescription = Str::limit(strip_tags($post->content), 160);

        // Set SEO meta data
        $seo = Seo::setTitle($post->title)
            ->setDescription($metaDescription)
            ->setKeywords($post->tags ? implode(', ', $post->tags) : $post->category)
            ->setType('article')
            ->setImage($post->featured_image ? asset('storage/' . $post->featured_image) : asset('og-image.png'))
            ->render();

        return view('blog.show', compact('post', 'relatedPosts', 'seo'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Authorization check
        if ($post->author_id !== Auth::id() && !Auth::user()->is_admin) {
            return redirect()->route('blog.index')
                ->with('error', 'You are not authorized to edit this post.');
        }

        return view('blog.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Authorization check
        if ($post->author_id !== Auth::id() && !Auth::user()->is_admin) {
            return redirect()->route('blog.index')
                ->with('error', 'You are not authorized to update this post.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:50',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if it exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $imagePath = $request->file('featured_image')->store('featured_images', 'public');
            $validated['featured_image'] = $imagePath;
        }

        // Convert tags string to array
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        // Check if publish status changed
        if (isset($validated['is_published']) && $validated['is_published'] && !$post->is_published) {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return redirect()->route('blog.show', $post->slug)
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Authorization check
        if ($post->author_id !== Auth::id() && !Auth::user()->is_admin) {
            return redirect()->route('blog.index')
                ->with('error', 'You are not authorized to delete this post.');
        }

        // Delete featured image if it exists
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Post deleted successfully!');
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param Request $request
     * @param  int  $postId
     * @return Response
     */
    public function storeComment(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $validated = $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment([
            'content' => $validated['content'],
            'user_id' => Auth::id(),
            'parent_id' => $validated['parent_id'] ?? null,
        ]);

        $post->comments()->save($comment);

        // Load the user relationship for the new comment
        $comment->load('user');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'comment' => $comment,
                'username' => $comment->user->name,
                'created_at' => $comment->created_at->diffForHumans(),
                'user_profile_picture' => $comment->user->profile_picture,
                'user_initial' => substr($comment->user->name, 0, 1),
                'comment_html' => view('partials.comment', ['comment' => $comment])->render()
            ]);
        }

        return back()->with('success', 'Comment added successfully!');
    }

    /**
     * Update the like count for a post.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function like(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->increment('likes');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'likes' => $post->likes,
                'dislikes' => $post->dislikes
            ]);
        }

        return back();
    }

    /**
     * Update the dislike count for a post.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function dislike(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->increment('dislikes');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'likes' => $post->likes,
                'dislikes' => $post->dislikes
            ]);
        }

        return back();
    }
}
