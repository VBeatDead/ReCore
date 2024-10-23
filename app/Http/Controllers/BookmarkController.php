<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Personal;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Request $request, Personal $item)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
            ->where('item_id', $item->id)
            ->first();

        if ($bookmark) {
            $bookmark->delete();

            // Flash a success message for removal
            return redirect()->back()->with('success', 'Bookmark removed successfully');
        }

        Bookmark::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'notes' => $request->notes
        ]);

        // Flash a success message for adding
        return redirect()->back()->with('success', 'Bookmark added successfully');
    }

    public function updateNotes(Request $request, Personal $item)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
            ->where('item_id', $item->id)
            ->firstOrFail();

        $bookmark->update(['notes' => $request->notes]);

        return redirect()->back()->with('success', 'Notes updated successfully');
    }

    public function index()
    {
        $bookmarks = Bookmark::with('item')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('bookmarks.index', compact('bookmarks'));
    }
}
