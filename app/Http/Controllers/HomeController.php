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
        $dishes = Dish::paginate(config('const.home_paginate'));

        $dish_top = $this->dishRepository->topListDish();

        $dish_new = $this->dishRepository->newListDish();

        return view('home', compact('dishes', 'dish_top', 'dish_new'));
    }
}
