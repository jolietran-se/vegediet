<?php

namespace App\Http\Controllers;

use App\User;
use App\Favorite;
use App\Dish;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        //
    }
    public function show($slug){

        $user = User::where('slug', $slug)->first();

        $favorites = Favorite::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $your_dishes = Dish::where('owner_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $dishes = [];
        foreach($favorites as $favorite){
            $dish = Dish::where('id', $favorite->dish_id)
                ->get();
            $dishes[] = $dish;
        }
        $dish_count = $your_dishes->count();

        $favorites_count = $favorites->count();

        return view('users.profile', compact('user', 'favorites', 'your_dishes', 'dish_count', 'favorites_count', 'dishes'));
    }
}
