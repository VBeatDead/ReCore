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
            return response()->json([
                'status' => 'removed',
                'message' => 'Bookmark removed successfully'
            ]);
        }

        $bookmark = Bookmark::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'notes' => $request->input('notes')
        ]);

        return response()->json([
            'status' => 'added',
            'message' => 'Bookmark added successfully',
            'bookmark' => $bookmark
        ]);
    }

    public function getNotes(Personal $item)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
            ->where('item_id', $item->id)
            ->firstOrFail();

        return response()->json([
            'notes' => $bookmark->notes
        ]);
    }

    public function updateNotes(Request $request, Personal $item)
    {
        $bookmark = Bookmark::where('user_id', auth()->id())
            ->where('item_id', $item->id)
            ->firstOrFail();

        $bookmark->update(['notes' => $request->input('notes')]);

        return response()->json(['message' => 'Notes updated successfully']);
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
