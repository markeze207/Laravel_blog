<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {

        $posts = Post::paginate(10);
        $totalPosts = $posts->total();


        return view('admin.post.index', compact('posts', 'totalPosts'));

    }
}
