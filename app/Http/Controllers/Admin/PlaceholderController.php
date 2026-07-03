<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PlaceholderController extends Controller
{
    public function index(string $section)
    {
        return view('admin.placeholders.index', compact('section'));
    }
}
