<?php

namespace App\Http\Controllers;

use App\Models\personal;

class PageController extends Controller
{
    public function pag()
    {
        $page = personal::latest()->paginate(7);
        return view('welcome', compact('page'));
    }
}

