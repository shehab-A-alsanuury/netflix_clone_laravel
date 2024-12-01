<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'movies' => Movie::count(),
            'genres' => Genre::count(),
            'actors' => Actor::count(),
            'categories' => Category::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}