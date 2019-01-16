<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\DishCategory;

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
    public function show($slug)
    {
        $categories = Category::all();

        $dish_categories = DishCategory::all();
        
        $category = Category::where('slug', $slug)->first();
        
        $this->destroy($categories, $dish_categories);

        $dishes = DishCategory::where('category_id', $category->id)
            ->join('dishes', 'dishes.id', 'dish_category.dish_id')
            ->orderBy('dishes.created_at', 'desc')
            ->get();


        return view('categories.show', compact('categories', 'category', 'dishes'));
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

    protected function destroy($categories, $dish_categories)
    {
        $category_list = [];
        $dish_category = [];
        foreach($categories as $category){
            $category_list[] = $category->id;
        }
        foreach($dish_categories as $dish_cate){
            $dish_category[] = $dish_cate->category_id;
        }
        sort($category_list);
        sort($dish_category);
        $dish_category2 = array_unique($dish_category);

        $cate_diff = array_diff_assoc($category_list, $dish_category2);
        if(count($category_list) > count($dish_category2)){
            foreach($cate_diff as $key=> $cate){
                Category::where('id', $cate)->delete();
            }
        }
        
    }

}
