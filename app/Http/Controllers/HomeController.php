<?php

namespace App\Http\Controllers;

use App\Dish;
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
        $dishes = $this->dishRepository->getAll();

        $top_dishes = $this->dishRepository->topDishesList();

        $new_dishes = $this->dishRepository->newDishesList();

        return view('home', compact('dishes', 'top_dishes', 'new_dishes'));
    }
}
