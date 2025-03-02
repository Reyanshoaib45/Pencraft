
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $publishedPostsCount = Post::where('is_published', true)->count();
        $draftPostsCount = Post::where('is_published', false)->count();
        
        return view('admin.dashboard', compact(
            'usersCount', 
            'postsCount', 
            'publishedPostsCount', 
            'draftPostsCount'
        ));
    }
    
    /**
     * Display all users.
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        $users = User::withCount(['posts', 'publishedPosts', 'draftPosts'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.users', compact('users'));
    }
    
    /**
     * Display all posts.
     *
     * @return \Illuminate\View\View
     */
    public function posts()
    {
        $posts = Post::with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.posts', compact('posts'));
    }
}
