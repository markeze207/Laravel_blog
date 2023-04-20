<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);

        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'string'
        ]);

        Brand::create($data);

        return redirect()->route('brand.index');
    }

    public function show(Brand $brand)
    {
        return view('brand.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    public function update(Brand $brand)
    {
        $data = request()->validate([
            'name' => 'string'
        ]);

        $brand->update($data);

        return redirect()->route('brand.show', $brand->id);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brand.index');
    }
}
