<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Club;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
/*        $postIsPublished = Post::where('is_published', 1)->first();
        dump('postIsPublished '. $postIsPublished->title);

        $posts = Post::all();
        foreach($posts as $post)
        {
            dump('post '.$post->title);
        }

        $postFindById = Post::find(1);
        dump('postFindById '.$postFindById->title);*/

        $posts = Post::all();

        return view('post.index', compact('posts'));


        // $brand = Brand::find(1);

        // dd($brand->posts);


        // $post = Post::find(1);

        //dd($post->tags);


        // $tag = Tag::find(1);

        // dd($tag->posts);


        // $post = Post::find(1);

        // dd($post->clubs);


        // $club = Club::find(1);

        // dd($club->posts);

        //$post = Post::find(1);
        //dd($post->category);
    }

    public function findPostById($id)
    {
        $postFindById = Post::find($id);

        return view('post', compact('postFindById'));
    }

    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post) // Post $Post делается для того, что если пост допустим не найдет, то ларавел выдаст ошибку 404
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) // Post $Post делается для того, что если пост допустим не найдет, то ларавел выдаст ошибку 404
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->restore();

        dd('restore');
    }

    public function firstOrCreate() // Если запись была найдена, то получат запись, если нет - создает
    {
        $post = Post::withTrashed()->firstOrCreate([
            'title' => 'lox1'
        ],[
            'title' => 'some post',
            'content' => 'some content',
            'image' => '1',
            'likes' => 1,
            'is_published' => 1,
        ]);

        dd($post->content);
    }
    public function updateOrCreate() // Если запись была найдена, то обновляет запись, если нет - создает
    {
        $post = Post::withTrashed()->updateOrCreate([
            'title' => 'lox'
        ],[
            'title' => 'lox',
            'content' => 'content',
            'image' => '1',
            'likes' => 1,
            'is_published' => 1,
        ]);

        dd($post->content);
    }
}
