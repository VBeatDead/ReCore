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
        return view('admin',compact('data'));
    }

    function black()
    {
        $data=personal::all();
        return view('black',compact('data'));
    }

    function price()
    {
        $data=personal::all();
        return view('price',compact('data'));
    }

    function user()
    {
        $data=personal::all();
        return view('welcome',compact('data'));
    }
}
