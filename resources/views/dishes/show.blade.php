@extends('layouts.app')

@section('content')
@include('layouts.header')
<h1>{{ $dish->name }}</h1>
<ul>
    <li>{{ $dish->farina_amount }} {{ trans('dish.amount') }} {{ trans('dish.farina') }}</li>
    <li>{{ $dish->protein_amount }} {{ trans('dish.amount') }} {{ trans('dish.protein') }}</li>
    <li>{{ $dish->lipid_amount }} {{ trans('dish.amount') }} {{ trans('dish.lipid') }}</li>
    <li>{{ $dish->calories_amount }} {{ trans('dish.calories') }}</li>
</ul>
<p>{{ trans('dish.like_number') }}: {{ $dish->like_number }}</p>
@include('layouts.footer')
@endsection
