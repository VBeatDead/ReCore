<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class detailController extends Controller
{
    public function show($id)
    {
        $item=personal::find($id);
        $recentNews = personal::latest()->limit(5)->get();
        $randomItem = personal::inRandomOrder()->first();

        return view('detail', compact('item', 'recentNews', 'randomItem'));
    }
}
