<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class AboutController extends Controller
{
    public function show()
    {
        $data = personal::all();
        return view('about', compact('data'));
    }
}