<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function edit($id)
    {
        $item = Personal::findOrFail($id);
        return view('edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'name' => 'required|max:255',
            'photoUrl' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $item = Personal::findOrFail($id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->name = $request->name;

        if ($request->hasFile('photoUrl')) {
            $imagePath = $request->file('photoUrl')->path();
            $item->photoUrl = base64_encode(file_get_contents($imagePath));
        }

        $item->save();

        return redirect()->route('setting')->with('success', 'News updated successfully.');
    }
}
