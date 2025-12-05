<?php

namespace App\Http\Controllers;

use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::featured()->take(6)->get();
        $categories = Service::active()
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('home', compact('featuredServices', 'categories'));
    }
}

