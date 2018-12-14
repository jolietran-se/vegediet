<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return response()->json([
            'success' => 'Created Category Successful'
        ]);
    }
    public function show($id)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.index', compact('category'));
    }

    public function edit($id)
    {
        return Category::find($id);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

         return response()->json([
            'success' => 'Created Category Successful'
        ]);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return response()->json([
            'success' => 'Xóa danh mục thành công'
        ]);
    }
}
