<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('image.index', compact('images'));
    }

    public function find()
    {
        $image = Image::where('name', $_GET['search'])->first();
        if($image)
        {
            return view('image.search', compact('image'));
        }
        dd('Не найдено');
    }

    public function show(Image $image)
    {
        return view('image.show', compact('image'));
    }
}
