<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\personal;

class detailController extends Controller
{
    public function show($id)
    {
        $pageViewsKey = 'page_views_' . $id;
        
        if (!Session::has($pageViewsKey)) {
            Session::put($pageViewsKey, 1);
        } else {
            Session::put($pageViewsKey, Session::get($pageViewsKey) + 1);
        }

        $item = personal::find($id);
        $recentNews = personal::latest()->limit(5)->get();
        $randomItem = personal::inRandomOrder()->first();

        return view('detail', compact('item', 'recentNews', 'randomItem'));
    }
}
