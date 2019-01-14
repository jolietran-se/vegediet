<?php

namespace App\Http\Controllers;

use App\Dish;
use App\User;
use App\Favorite;
use App\Category;
use App\Ingredient;
use App\ImageUploads;
use App\DishImages;
use App\DishIngredient;
use App\DishCategory;
use App\CookingStep;
use Session;

use Illuminate\Http\Request;
use App\Http\Requests\CreateDish;

use App\Repositories\DishRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\IngredientRepositoryInterface;

class DishController extends Controller
{
    protected $dishRepository;

    public function __construct(
        DishRepositoryInterface $dishRepository,
        CategoryRepositoryInterface $cateRepository,
        IngredientRepositoryInterface $ingredientRepository
    ){
        $this->dishRepository = $dishRepository;
        $this->cateRepository = $cateRepository;
        $this->ingredientRepository = $ingredientRepository;
    }

    public function index()
    {
        $categories = $this->cateRepository->getAll();

        $dishes = $this->dishRepository->allDish();

        $new_dishes = $this->dishRepository->newDishesList();

        return view('dishes.index', compact('dishes', 'new_dishes', 'categories'));
    }

    /* Upload Images */
    public function uploadImages(Request $request)
    {
        $path = $request->file->getClientOriginalName();

        request()->file->move(public_path('images/dishes/'), $path);

        $img = ImageUploads::create(['image' => $path]);

        return response()->json(['data' => $img]);
    }

    /* Thêm mới món ăn */
    public function create()
    {
        $categories = $this->cateRepository->all();

        $ingredients = $this->ingredientRepository->all();

        return view('dishes.create', compact('categories', 'ingredients'))
            ->withCategories($categories)
            ->withIngredients($ingredients);
    }

    // Store Dish detail to database 
    public function store(CreateDish $request)
    {
        // dd($request->all());
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->slug = str_slug($request->name);
        $dish->description = $request->description;
        $dish->owner_id = $request->auth;
        $dish->like_number = 0;
        $dish->save();
        // Store tags
        if  ($request->tags[0] != null) {
            $this->storeTags($dish, $request->tags );
        }
        // Store images
        $data = $request->all();
        $this->storeImage($dish, $data['images']);
        // Store ingredients
        if($request->ingredients[0] != null) {
            $this->storeIngredient($dish, $request->ingredients,$request->masses);
        }
        // Store cooking steps
        if($request->direction[0] != null) {
            $this->storeCookingStep($dish, $request->direction);
        }
        // Store nutrition_facts
        $this->storeFacts($dish);
        $dish->save();

        if(isset($dish)){
            Session::flash('create_dish', 'Món ăn đã được thêm mới thành công!');
        }
        
        return redirect()->route('dishes.show', ['dish' => $dish->slug]);
    }

    public function convert_slug($name){
        $slug = str_slug($name, $separator = '-');
        return $slug;
    }
    
    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->first();

        $favorites = Favorite::where('dish_id', $dish->id)->get();

        return view('dishes.show', compact('dish', 'favorites'));
    }

    
    public function edit($slug)
    {
        $dish = Dish::where('slug', $slug)->first();

        $categories = $this->cateRepository->all();

        $ingredients = $this->ingredientRepository->all();

        return view('dishes.edit', compact('dish', 'categories', 'ingredients'))
            ->withCategories($categories)
            ->withIngredients($ingredients);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        // Xóa ảnh khỏi Folder 
        $dishImage = DishImages::where('dish_id', $id)->get();
        foreach($dishImage as $img){
            $image_path = public_path()."/images/dishes/".$img->link;  // Value is not URL but directory file path
            @unlink($image_path);
        }
        // Xóa ảnh trong bảng trung gian
        $imageUpload = ImageUploads::all();
        foreach($imageUpload as $img){
            $img->delete();
        }
        // Xóa các dữ liệu Relationship 
        $dish->boot();
        $dish->delete();

        Session::flash('destroy_dish', 'Bạn đã hoàn thành xóa món ăn!');

        return redirect()->route('dishes.index');
    }

    protected function storeFacts($dish){
        foreach($dish->ingredients as $ingredient)
        {
            $dish->farina_amount += $ingredient->farina*$ingredient->pivot->weight/100;
            $dish->protein_amount += $ingredient->protein*$ingredient->pivot->weight/100;
            $dish->lipid_amount += $ingredient->lipid*$ingredient->pivot->weight/100;
            $dish->calories_amount += $ingredient->calories*$ingredient->pivot->weight/100;
        }
    }

    protected function storeTags($dish, $tags)
    {
        $fresh = [];
        foreach( $tags as $tag )
        {
            if( Category::find($tag) )
            {
                $fresh[] = $tag;
            }else
            {
                $t = new Category();
                $t->name = $tag;
                $t->slug = str_slug($t->name);
                $t->save();
    
                $fresh[] = $t->id;
            }
        }
        $dish->categories()->sync( $fresh );
    }

    protected function storeImage($dish, $images)
    {
        if(!empty($images))
        {
            $imageUpload = explode(',', $images);
            unset($imageUpload['0']);
            $dish->picture = $imageUpload['1'];

            if(isset($imageUpload))
            {
                foreach($imageUpload as $img){
                    $dish_image = new DishImages();
                    $dish_image->dish_id = $dish->id;
                    $dish_image->link = $img;
                    $dish_image->save();
                } 
            }
        }else {
            $dish_image = new DishImages();
            $dish_image->dish_id = $dish->id;
            $dish_image->save();
        }
    }

    protected function storeIngredient($dish, $ingredients, $masses)
    {
        for($i = 0 ; $i < count($ingredients); $i++)
            {
                $dish_ingredient = new DishIngredient();
                // nguyên liệu có sẵn
                $data_ingredient = Ingredient::where('name',$ingredients[$i])->first();

                if ($data_ingredient== false) {
                    // Nếu nguyên liệu không có sẵn => thêm mới nguyên liệu
                    $ingredient = new Ingredient();
                    $ingredient->name = $ingredients[$i];
                    $ingredient->farina = 0;
                    $ingredient->protein = 0;
                    $ingredient->lipid = 0;
                    $ingredient->calories = 0;
                    $ingredient->save();
                    $dish_ingredient->ingredient_id = $ingredient->id;
                }else {
                    // Nếu nguyên liệu có sẵn, thêm id nguyên liệu đó vào data
                    // dd($data_ingredient->id);
                    $dish_ingredient->ingredient_id = $data_ingredient->id;
                }
                $dish_ingredient->dish_id = $dish->id;
                $dish_ingredient->weight = $masses[$i];
                $dish_ingredient->save();
            }
    }

    protected function storeCookingStep($dish, $steps)
    {
        for ($i=0; $i < count($steps) ; $i++) { 
            $cooking_step = new CookingStep();
            $cooking_step->dish_id = $dish->id;
            $cooking_step->step = "Bước ".($i+1).": ".$steps[$i];
            $cooking_step->save();
        }
    }
    protected function like(Request $request)
    {
        $dish = Dish::findOrFail($request->dish_id);
        $user = User::findOrFail($request->user_id);
        
        // Nếu user muốn like
        $dish->like_number += 1; 

        $favorite = new Favorite();
        $favorite->dish_id = $dish->id;
        $favorite->user_id = $user->id;
        $favorite->save();

        $dish->save();

        return redirect()->route('dishes.show', $dish->slug)->with(compact('dish'));
    }
    protected function disLike(Request $request){
        $dish = Dish::findOrFail($request->dish_id);
        $user = User::findOrFail($request->user_id);

        // Nếu user muốn unlike
        $favorite = Favorite::whereNotNull('id')
            ->where('dish_id', $dish->id)
            ->where('user_id', $user->id)
            ->delete();
        if($dish->like_number > 0){
            $dish->like_number -= 1;
        }
        $dish->save();
        return redirect()->route('dishes.show', $dish->slug)->with(compact('dish'));

    }

}
