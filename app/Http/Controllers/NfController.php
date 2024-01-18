<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NfController extends Controller
{
    public function notAllowed()
    {
        return view('nf');
    }
}