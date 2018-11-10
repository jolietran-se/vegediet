@extends('layouts.master')

@section('head')
@endsection

@section('content')
    <div class="content">
        <div class="container_12">
            <div class="grid_12">
                <h2>{{ $dish->name }}</h2>
                <p>
                    {{ trans('dish.dish_by') }}
                    <a href="#">
                        <img src="{{ asset(config('asset.image_path.avatar') . $dish->user->avatar) }}" alt="avatar" height=20 width=20 >
                        {{ $dish->user->name }}
                    </a>
                </p>
                <img src="{{ asset(config('asset.image_path.dish') . $dish->picture) }}" alt="dish">
                <p>{{ $dish->description }}</p>
                <ul>
                    <li>{{ trans('dish.farina') }} : {{ $dish->farina_amount }} {{ trans('dish.amount') }}</li>
                    <li>{{ trans('dish.protein') }} : {{ $dish->protein_amount }} {{ trans('dish.amount') }}</li>
                    <li>{{ trans('dish.lipid') }} : {{ $dish->lipid_amount }} {{ trans('dish.amount') }}</li>
                    <li>{{ $dish->calories_amount }} {{ trans('dish.calories') }}</li>
                </ul>
            </div>
            <div class="grid_12">
                <div class="hor_separator hor1"></div>
                <h2 class="head1">{{ trans('dish.ingredients') }}</h2>
                <ul>
                    @foreach ($dish->ingredients as $ingredient)
                        <li>{{ $ingredient->name }} : {{ $ingredient->pivot->weight }} {{ trans('dish.amount') }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="grid_12">
                <div class="hor_separator hor1"></div>
                <h2 class="head1">{{ trans('dish.steps') }}</h2>
                <ul>
                    @foreach ($dish->cookingsteps as $step)
                        <li>{{ $step->step}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="grid_12">
                <div class="hor_separator hor1"></div>
                <p>{{ trans('dish.like_number') }}: {{ $dish->like_number }}</p>
            </div>
        </div>
    </div>
@endsection
