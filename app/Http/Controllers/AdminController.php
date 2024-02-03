<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\personal;

class AdminController extends Controller
{
    function index()
    {
        $data=personal::all();
        return view('welcome',compact('data'));
    }

    function admin()
    {
        $data=personal::all();
        return view('adminv2',compact('data'));
    }

    function user()
    {
        $data=personal::all();
        return view('welcome',compact('data'));
    }
}
