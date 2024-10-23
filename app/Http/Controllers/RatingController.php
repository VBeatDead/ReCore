<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:newsgame,id',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|min:10|max:200',
            'category' => 'required|string|in:UI/UX,Konten,Teknis,Lainnya',
            'tags' => 'nullable|string|max:100'
        ], [
            'rating.required' => 'Rating tidak boleh kosong',
            'rating.integer' => 'Rating harus berupa angka',
            'rating.between' => 'Rating harus antara 1 sampai 5',
            'review.required' => 'Review tidak boleh kosong',
            'review.min' => 'Review minimal 10 karakter',
            'review.max' => 'Review maksimal 200 karakter',
            'category.required' => 'Kategori harus dipilih',
            'category.in' => 'Kategori tidak valid',
            'tags.max' => 'Tags terlalu panjang'
        ]);

        if (Auth::check()) {
            // Check if user has already rated
            $existingRating = Rating::where('user_id', Auth::id())
                ->where('item_id', $request->item_id)
                ->first();

            if ($existingRating) {
                return redirect()->back()
                    ->with('error', 'Anda sudah memberikan rating untuk berita ini.');
            }

            // Format tags
            $tags = $request->tags ? collect(explode(',', $request->tags))
                ->map(function ($tag) {
                    $tag = trim($tag);
                    return !str_starts_with($tag, '#') ? "#{$tag}" : $tag;
                })
                ->implode(', ') : null;

            // Create rating
            $rating = Rating::create([
                'user_id' => Auth::id(),
                'item_id' => $request->item_id,
                'rating' => $request->rating,
                'review' => $request->review,
                'category' => $request->category,
                'tags' => $tags
            ]);

            // Update user points
            $user = Auth::user();
            if ($user instanceof User) {
                $user->save();
            } else {
                return redirect()->back()->with('error', 'User not found or not authenticated.');
            }
            $user->save();

            return redirect()->back()
                ->with('success', 'Terima kasih atas rating dan review Anda! Anda mendapatkan ' . $rating->point_reward . ' poin.');
        } else {
            return redirect()->route('login')
                ->with('error', 'Silakan login untuk memberikan rating.');
        }
    }

    public function index($itemId)
    {
        $item = Personal::findOrFail($itemId);
        $ratings = Rating::where('item_id', $itemId)
            ->with('user')
            ->latest()
            ->get();

        return view('ratings.index', compact('item', 'ratings'));
    }
}
