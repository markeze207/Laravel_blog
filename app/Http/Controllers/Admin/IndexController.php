<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;

class IndexController
{
    public function __invoke()
    {

        $totalPosts = Post::all();

        return view('admin.index', compact('totalPosts'));
    }
}
