<?php

namespace App\Http\Controllers\API\Post;

use App\Http\Controllers\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\API\Post\FilterRequest;
use App\Http\Requests\API\Post\StoreRequest;
use App\Http\Requests\API\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class PostController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = $this->postService->store($data);

        return ($post instanceof Post) ? new PostResource($post) : $post;

    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->postService->update($data, $post);

        return ($post instanceof Post) ? new PostResource($post) : $post;
    }
}
