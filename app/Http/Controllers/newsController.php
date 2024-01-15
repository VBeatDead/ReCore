<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class newsController extends Controller
{
    public function show()
    {
        $data = personal::latest()->get();
        return view('welcome', compact('data'));
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
            'title' => 'required|max:255',
            'description' => 'required',
            'name' => 'required|max:255',
            'photoUrl' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('photoUrl')->path();
        $encodedImage = base64_decode(file_get_contents($imagePath));

        $personal = new Personal;
        $personal->title = $request->title;
        $personal->description = $request->description;
        $personal->name = $request->name;
        $encodedImage = base64_encode(file_get_contents($request->file('photoUrl')->getRealPath()));
        $personal->photoUrl = $encodedImage;
        $personal->save();

        return redirect()->route('admin')->with('success', 'News added successfully.');
    }

    public function destroy($id)
    {
        $item = personal::findOrFail($id);
        $item->delete();

        return redirect()->route('admin')->with('success', 'Item deleted successfully.');
    }
}
