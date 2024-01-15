<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class ContactController extends Controller
{
    public function show()
    {
        $data = personal::all();
        return view('contact', compact('data'));
    }
}