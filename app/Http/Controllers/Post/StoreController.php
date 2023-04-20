<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->postService->store($data);

        return redirect()->route('post.index');
    }
}
