<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = Comment::create([
            'comment' => $request->comment
        ]);

        return response()->json(['success' => 'Comment saved!', 'comment' => $comment]);
    }
}
