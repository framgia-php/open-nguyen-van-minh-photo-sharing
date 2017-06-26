<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Like;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Like $like)
    {
        $images = Image::orderBy('created_at', 'desc')
            ->get();

        $renderData = compact('images', 'like');

        return view('home1', $renderData);
    }
}
