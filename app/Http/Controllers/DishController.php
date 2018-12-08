<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Category;
use App\Ingredient;
use App\ImageUploads;
use App\DishImages;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->cateRepository->all();

        $ingredients = $this->ingredientRepository->all();

        return view('dishes.create', compact('categories', 'ingredients'));
    }

    // Store Dish detail to database 
    public function store(CreateDish $request)
    {
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->slug = str_slug($request->name);
        $dish->description = $request->description;
        $dish->like_number = 0;

        // Example
        $dish->farina_amount = 1;
        $dish->protein_amount = 1;
        $dish->lipid_amount = 1;
        $dish->calories_amount = 1;
        $dish->owner_id = 1;
        $dish->save();

        
        // Store images
        if(!empty($request->images))
        {
            $imageUpload = explode(',', $request->images);
            unset($imageUpload['0']);
            // dd($imageUpload);
            if(isset($imageUpload))
            {
                foreach($imageUpload as $img){
                    $temp = [];
                    $temp['link'] = $img;
                    $temp['dish_id'] = $dish->id;
                    // dd($dish->id);
                    DishImages::create($temp);
                    $dish->picture = $temp['link'];
                } 
            }
        }else {
            $temp = [];
            $temp['link'] = $img;
            $temp['dish_id'] = $dish->id;
            DishImages::create($temp);
            $dish->picture = $temp['link'];
        }

        $dish->save();
        
        return redirect()->route('dishes.show', ['dish' => $dish->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::with('user')->findOrFail($id);
        
        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
