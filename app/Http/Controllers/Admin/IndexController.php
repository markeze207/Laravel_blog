<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;

class IndexController
{
    public function __invoke()
    {

        $posts = Post::all();
        $totalPosts = $posts->count();
        $totalLikes = $posts->sum('likes');
        $totalUsers = User::all()->count();

        return view('admin.index', compact('posts', 'totalPosts', 'totalLikes', 'totalUsers'));
    }
}
