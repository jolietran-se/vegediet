<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Category::class;
    }
    public function all()
    {
        $result = $this->_model::whereNotNull('id')->distinct()->get();

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

    public function newCategoryList()
    {
        $result = $this->_model::whereNotNull('id')
            ->orderBy('created_at', 'desc')
            ->take(config('const.cate_lists'))
            ->get();

        return $result;
    }

}
