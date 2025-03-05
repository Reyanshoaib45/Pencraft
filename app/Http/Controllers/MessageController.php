<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a new message from the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully. We will get back to you soon!');
    }

    /**
     * Display all messages in the admin panel.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.messages', compact('messages'));
    }

    /**
     * Mark a message as read.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead($id)
    {
        $message = Message::findOrFail($id);
        $message->update(['is_read' => true]);

        return redirect()->route('admin.messages')->with('success', 'Message marked as read.');
    }
}