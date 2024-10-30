<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class RatingController extends Controller
{
    private $badWords = [
        'anjing',
        'bangsat',
        'brengsek',
        'kampret',
        'bajingan',
        'tolol',
        'goblok',
        'bodoh',
        'idiot',
        'sialan',
    ];

    private $spamPatterns = [
        '/\b(viagra|cialis|poker|casino|sex|xxx)\b/i',
        '/\b(https?:\/\/|www\.)\S+/i',
        '/(.)\1{4,}/',
        '/\b[A-Z]{5,}\b/',
        '/\$\d+/',
        '/\b\d{4,}\b/',
    ];

    public function store(Request $request)
    {
        $profanityRule = function ($attribute, $value, $fail) {
            $lowercaseValue = Str::lower($value);
            foreach ($this->badWords as $word) {
                if (str_contains($lowercaseValue, $word)) {
                    $fail('Review tidak boleh mengandung kata-kata kasar.');
                    return;
                }
            }
        };

        $spamRule = function ($attribute, $value, $fail) {
            foreach ($this->spamPatterns as $pattern) {
                if (preg_match($pattern, $value)) {
                    $fail('Review terdeteksi mengandung konten spam.');
                    return;
                }
            }

            $words = str_word_count(strtolower($value), 1);
            $wordCount = array_count_values($words);
            $totalWords = count($words);

            foreach ($wordCount as $word => $count) {
                if ($count > 3 && ($count / $totalWords) > 0.3) {
                    $fail('Review terdeteksi mengandung pengulangan kata yang berlebihan.');
                    return;
                }
            }
        };

        $validated = $request->validate([
            'item_id' => 'required|exists:newsgame,id',
            'rating' => 'required|integer|between:1,5',
            'review' => [
                'required',
                'string',
                'min:10',
                'max:500',
                $profanityRule,
                $spamRule
            ],
            'category' => 'required|string|in:UI/UX,Konten,Teknis,Lainnya',
            'tags' => 'nullable|string|max:100'
        ], [
            'rating.required' => 'Rating tidak boleh kosong',
            'rating.integer' => 'Rating harus berupa angka',
            'rating.between' => 'Rating harus antara 1 sampai 5',
            'review.required' => 'Review tidak boleh kosong',
            'review.min' => 'Review minimal 10 karakter',
            'review.max' => 'Review maksimal 500 karakter',
            'category.required' => 'Kategori harus dipilih',
            'category.in' => 'Kategori tidak valid',
            'tags.max' => 'Tags terlalu panjang'
        ]);

        if (Auth::check()) {
            $existingRating = Rating::where('user_id', Auth::id())
                ->where('item_id', $request->item_id)
                ->first();

            if ($existingRating) {
                return redirect()->back()
                    ->with('error', 'Anda sudah memberikan rating untuk berita ini.');
            }

            $tags = $request->tags ? collect(explode(',', $request->tags))
                ->map(function ($tag) {
                    $tag = trim($tag);
                    return !str_starts_with($tag, '#') ? "#{$tag}" : $tag;
                })
                ->implode(', ') : null;

            $rating = Rating::create([
                'user_id' => Auth::id(),
                'item_id' => $request->item_id,
                'rating' => $request->rating,
                'review' => $request->review,
                'category' => $request->category,
                'tags' => $tags
            ]);

            $user = Auth::user();
            if ($user instanceof User) {
                $user->save();
            } else {
                return redirect()->back()->with('error', 'User not found or not authenticated.');
            }

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
