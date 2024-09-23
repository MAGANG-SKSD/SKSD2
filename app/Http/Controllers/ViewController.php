<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        return view('home.landing'); // Pastikan view ini ada di resources/views/home/landing.blade.php
    }
}
