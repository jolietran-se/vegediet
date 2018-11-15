<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class DishEloquentRepository extends EloquentRepository implements DishRepositoryInterface
{
    public function getModel()
    {
        return \App\Dish::class;
    }
    public function getAll(){
        $result = $this->_model::whereNotNull('id')
            ->orderBy('created_at', 'desc')
            ->paginate(config('const.dish_paginate'));

        return $result;
    }

    public function topDishesList()
    {
        $result = $this->_model::whereNotNull('id')
            ->orderBy('like_number', 'desc')
            ->take(config('const.home_lists'))
            ->get();

        return $result;
    }

    public function newDishesList()
    {
        $result = $this->_model::whereNotNull('id')
            ->orderBy('created_at', 'desc')
            ->take(config('const.home_lists'))
            ->get();

        return $result;
    }

}
