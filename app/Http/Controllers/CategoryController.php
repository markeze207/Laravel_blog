<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->store($data);
        return redirect()->route('category.index');
    }
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();
        $this->categoryService->update($data, $category);
        return redirect()->route('category.show', $category->id);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}
