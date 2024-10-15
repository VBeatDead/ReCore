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
        $validated = $request->validate([
            'content' => 'required|min:3|max:200',
        ], [
            'content.required' => 'Komentar tidak boleh kosong.',
            'content.min' => 'Komentar harus memiliki minimal 3 karakter.',
            'content.max' => 'Komentar tidak boleh lebih dari 200 karakter.',
        ]);

        if (Auth::check()) {
            if ($validated) {
                Comment::create([
                    'user_id' => Auth::user()->id,
                    'item_id' => $request->item_id,
                    'content' => $request->input('content'),
                ]);

                return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'Validasi komentar gagal. Periksa kembali input Anda.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Silakan login untuk menambahkan komentar.');
        }
    }

    public function showComments($itemId)
    {
        $comments = Comment::latest()->get();
        return view('comments.show', compact('comments'));
    }
}
