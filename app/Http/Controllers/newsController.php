<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class newsController extends Controller
{
    public function show()
    {
        $data=personal::all();
        return view('welcome',compact('data'));
    }
}
