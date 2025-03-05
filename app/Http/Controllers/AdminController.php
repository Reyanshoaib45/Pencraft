<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return View
     */
    public function dashboard()
    {
        $usersCount = User::count();
        $postsCount = Post::count();
        $publishedPostsCount = Post::where('is_published', true)->count();
        $draftPostsCount = Post::where('is_published', false)->count();
        $messagesCount = Message::count();
        $unreadMessagesCount = Message::where('is_read', false)->count();

        return view('admin.dashboard', compact(
            'usersCount',
            'postsCount',
            'publishedPostsCount',
            'draftPostsCount',
            'messagesCount',
            'unreadMessagesCount'
        ));
    }

    /**
     * Display all users.
     *
     * @return View
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
     * @return View
     */
    public function posts()
    {
        $posts = Post::with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.posts', compact('posts'));
    }

    /**
     * Show a specific user's details.
     *
     * @param  int  $id
     * @return View
     */
    public function showUser($id)
    {
        $user = User::withCount(['posts', 'publishedPosts', 'draftPosts'])
            ->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing a user.
     *
     * @param  int  $id
     * @return View
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'bio' => 'nullable|string',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'is_admin' => 'nullable|boolean',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle password
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->input('password'));
        }

        // Handle profile picture
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        // Set is_admin status
        $validated['is_admin'] = $request->has('is_admin');

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
}
