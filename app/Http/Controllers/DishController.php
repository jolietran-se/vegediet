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

        return view('dishes.create', compact('categories', 'ingredients'))->withCategories($categories);
    }


    protected function syncTags($dish, $tags)
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

    // Store Dish detail to database 
    public function store(CreateDish $request)
    {
        // dd($request->all());

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

        DishController::syncTags($dish, $request->tags );

        // Store images
        $data = $request->all();
        
        if(!empty($data['images']))
        {
            $imageUpload = explode(',', $data['images']);
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

        $dish->save();
        
        return redirect()->route('dishes.show', ['dish' => $dish->id]);
    }

    public function convert_slug($name){
        $slug = str_slug($name, $separator = '-');
        return $slug;
    }
    
    public function show($id)
    {
        $dish = Dish::with('user')->findOrFail($id);
        
        return view('dishes.show', compact('dish'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
