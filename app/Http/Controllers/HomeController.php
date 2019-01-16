<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Category;
use App\Ingredient;
use Session;

use Illuminate\Http\Request;
use App\Repositories\DishRepositoryInterface;

class HomeController extends Controller
{
    protected $dishRepository;

    public function __construct(DishRepositoryInterface $dishRepository)
    {
        $this->dishRepository = $dishRepository;
    }

    public function index()
    {
        $categories = Category::whereNotNull('id')->inRandomOrder()->take(config('const.cate_lists'))->get();

        $dishes = $this->dishRepository->getAll();

        $top_dishes = $this->dishRepository->topDishesList();

        $new_dishes = $this->dishRepository->newDishesList();

        return view('home', compact('dishes', 'top_dishes', 'new_dishes', 'categories'));
    }

    public function search(Request $request){
        $q = $request->q;
        if($q != ""){
            $search_dishes = Dish::where('name', 'LIKE', '%'.$q.'%')
                ->orWhere('description', 'LIKE', '%'.$q.'%')
                ->orderBy('created_at', 'desc')
                ->get();

            $search_tag = Category::where('name', 'LIKE', '%'.$q.'%')
                ->orderBy('created_at', 'desc')
                ->get();

            $search_count = count($search_dishes);
            $tag_count = count($search_tag);
            if( $search_count > 0 || $tag_count >0){
                return view('home', compact('search_dishes', 'q', 'search_count', 'tag_count', 'search_tag'));
            }
        }


        $categories = Category::whereNotNull('id')
            ->inRandomOrder()
            ->take(config('const.cate_lists'))->get();

        $dishes = $this->dishRepository->getAll();

        $top_dishes = $this->dishRepository->topDishesList();

        $new_dishes = $this->dishRepository->newDishesList();

        return view('home', compact('dishes', 'top_dishes', 'new_dishes', 'categories'))
            ->withMessage('Rất tiếc, không tìm thấy món ăn bạn quan tâm!');
    }
}
