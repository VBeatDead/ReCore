<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Personal;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            Comment::create([
                'user_id' => Auth::user()->id,
                'item_id' => $request->item_id,
                'content' => $request->content,
            ]);

            return redirect()->back()->with('success', 'Comment added successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Please login to leave a comment.');
        }
    }

    public function showComments($itemId)
    {
        $comments = Comment::latest()->get();
        return view('comments.show', compact('comments'));
    }
}
