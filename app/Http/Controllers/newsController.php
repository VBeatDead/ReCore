<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;
use Illuminate\Support\Facades\Auth;

class newsController extends Controller
{
    public function show()
    {
        $data = Personal::with(['comments', 'ratings'])->latest()->paginate(7);
        $page = Personal::all();
        return view('welcome', compact('data', 'page'));
    }

    public function detail($id)
    {
        $item = Personal::with(['comments', 'ratings'])->findOrFail($id);
        return view('detail', compact('item'));
    }

    public function addNews()
    {
        return view('add_news');
    }

    public function create()
    {
        return view('item');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:5000',
            'description' => 'required|min:5|max:5000',
            'photoUrl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'tags' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $tagsArray = explode(',', $value);
                    if (count($tagsArray) > 5) {
                        $fail('The ' . $attribute . ' may not have more than 5 tags.');
                    }
                },
            ],
            'reading_level' => 'required|in:beginner,intermediate,expert',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to add news.');
        }

        try {
            $imagePath = $request->file('photoUrl')->path();
            $encodedImage = base64_encode(file_get_contents($request->file('photoUrl')->getRealPath()));

            // Process tags
            $tags = array_map('trim', explode(',', $request->tags));
            $tags = array_filter($tags); // Remove empty tags

            $personal = new Personal;
            $personal->title = $request->title;
            $personal->description = $request->description;
            $personal->name = "By " . $user->name;
            $personal->photoUrl = $encodedImage;
            $personal->category = $request->category;
            $personal->tags = $tags;
            $personal->reading_level = $request->reading_level;
            $personal->save();

            return redirect()->route('item.home')->with('success', 'News added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error adding news: ' . $e->getMessage());
        }
    }

    // Add search/filter method
    public function search(Request $request)
    {
        $query = Personal::query();

        // Search by title/description
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter by reading level
        if ($request->has('reading_level') && $request->reading_level != '') {
            $query->where('reading_level', $request->reading_level);
        }

        // Filter by tags
        if ($request->has('tag') && $request->tag != '') {
            $query->where('tags', 'LIKE', "%{$request->tag}%");
        }

        $data = $query->latest()->paginate(7);
        return view('welcome', compact('data'));
    }

    public function destroy($id)
    {
        $item = personal::findOrFail($id);
        $item->delete();

        return redirect()->route('setting')->with('success', 'Berita berhasil dihapus.');
    }
}
