<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class IngredientEloquentRepository extends EloquentRepository implements IngredientRepositoryInterface
{
    public function getModel()
    {
        return \App\Ingredient::class;
    }
    public function all()
    {
        $result = $this->_model::all();

        return $result;
    }
    public function getAll()
    {
        $result = $this->_model::whereNotNull('id')
            ->inRandomOrder()
            ->take(config('const.cate_lists'))
            ->get();

        return $result;
    }

}
