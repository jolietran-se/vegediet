<?php
namespace App\Repositories;

interface DishRepositoryInterface
{
    public function getAll();

    public function topDishesList();

    public function newDishesList();

}
