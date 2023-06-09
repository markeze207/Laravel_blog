<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $this->postService->update($data, $post);

        return redirect()->route('post.show', $post->id);
    }
}
