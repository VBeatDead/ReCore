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
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to add news.');
        }

        $imagePath = $request->file('photoUrl')->path();
        $encodedImage = base64_decode(file_get_contents($imagePath));

        $personal = new Personal;
        $personal->title = $request->title;
        $personal->description = $request->description;
        $personal->name = "By " . $user->name;
        $encodedImage = base64_encode(file_get_contents($request->file('photoUrl')->getRealPath()));
        $personal->photoUrl = $encodedImage;
        $personal->save();

        return redirect()->route('item.home')->with('success', 'News added successfully.');
    }

    public function destroy($id)
    {
        $item = personal::findOrFail($id);
        $item->delete();

        return redirect()->route('setting')->with('success', 'Berita berhasil dihapus.');
    }
}
