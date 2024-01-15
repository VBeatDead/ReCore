<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class detailController extends Controller
{
    public function show($id)
    {
        $item=personal::find($id);
        return view('detail', ['item' => $item]);
    }
}
