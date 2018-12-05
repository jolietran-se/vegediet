@extends('layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">
@endsection

@section('content')
    <div class="content page">
        <div class="container_12">
            <div class="grid_12">

                <div class="breadcrumbs">
                    <div class="container">
                        <ol class="breadcrumb breadcrumb--ys pull-left">
                            <li class="home-link"><a href="{{ route('home') }}" class="fa fa-home"></a></li>
                            <li><a href="{{ route('home') }}">{{ trans('headertext.home') }}</a></li>
                            <li class="active">{{ trans('dish.add') }}</li>
                        </ol>
                    </div>
                </div>

                <div id="pageContent">
                    {!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'id' => 'add_form', 'role' => 'form']) !!}
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div id="picture" >
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            {!! Form::label(null, trans('dish.dish_picture')) !!}(<span class="red">*</span>)
                                            <div class="file-loading">
                                                {!! Form::file('file', ['class' => 'file', 'id' => 'file-1']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label(null, trans('dish.dish_name')) !!}(<span class="red">*</span>)
                                        {!! Form::text('name',null, ['class' => 'form-control', 'id' => 'dish_name']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label(null, trans('dish.dish_slug')) !!}(<span class="red">*</span>)
                                        {!! Form::text('slug',null, ['class' => 'form-control', 'id' => 'dish_slug']) !!}
                                    </div>
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-list font-green" aria-hidden="true"></i>
                                                <span class="caption-subject font-green bold">{{ trans('dish.tag') }}</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <datalist id="list_categories">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->name }}"></option> 
                                                @endforeach
                                            </datalist>
                                            {!! Form::text('category_id', null, ['class'=> 'form-control', 'list' => 'list_categories']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label(null, trans('dish.description')) !!}(<span class="red">*</span>)
                                        {!! Form::textarea('description', null, ['class' => 'form-control description', 'id' => 'description']) !!}
                                    </div>
                                    <div class="form-group">
                                        <datalist id="list_ingredients">
                                            @foreach ($ingredients as $ingredient)
                                                <option value="{{ $ingredient->name }}"></option> 
                                            @endforeach
                                        </datalist>

                                        <div class="col-lg-5">
                                            {!! Form::label(null, trans('dish.ingredient')) !!}(<span class="red">*</span>)
                                            {!! Form::text('ingredient', null, ['class'=> 'form-control', 'list' => 'list_ingredients']) !!}
                                        </div>
                                        
                                        <div class="col-lg-5">
                                            {!! Form::label(null, trans('dish.mass')) !!}(<span class="red">*</span>)
                                            {!! Form::number('number', null, ['id' => 'ingredient_mass', 'class' => 'form-control']) !!}
                                        </div>

                                        <div class="col-lg-1">
                                            <button class="dynamic"><span class="fa fa-minus-circle"></span></button>
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="dynamic"><span class="fa fa-plus-circle"></span></button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-10">
                                            {!! Form::label(null, trans('dish.direction')) !!}(<span class="red">*</span>)
                                            {!! Form::textarea('direction', null, ['class' => 'form-control steps', 'id' => 'direction']) !!}
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="dynamic"><span class="fa fa-minus-circle"></span></button>
                                        </div>
                                        <div class="col-lg-1">
                                            <button class="dynamic"><span class="fa fa-plus-circle"></span></button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="modal-footer">
                        {!! Form::button(trans('dish.create'), ['class' => 'btn btn-success']) !!}
                        {!! Form::button(trans('dish.cancel'), ['class' => 'btn btn-warning']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
@endsection
