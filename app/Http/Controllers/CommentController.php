<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'content' => 'required|string',
        ]);

        $post->comments()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

}

