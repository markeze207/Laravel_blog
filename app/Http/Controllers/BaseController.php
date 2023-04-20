<?php

namespace App\Http\Controllers;

use App\Services\Post\Service;
use App\Services\Category\Service as CategoryService;

class BaseController extends Controller
{

    public Service $postService;

    public CategoryService $categoryService;

    public function __construct(Service $postService, CategoryService $categoryService)
    {

        $this->postService = $postService;

        $this->categoryService = $categoryService;

    }

}
