@extends('layouts.master')

@section('head')
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
                    {!! Form::open(['method' => 'POST', 'route' => 'dishes.store', 'class' => 'form-horizontal', 'id' => 'add_form', 'role' => 'form']) !!}
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div id="picture" >
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            {!! Form::label(null, trans('dish.dish_picture')) !!}(<span class="red">*</span>)
                                            <div class="file-loading">
                                                {!! Form::file('file', ['class' => 'file', 'id' => 'file-1', 'name' => 'img']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label(null, trans('dish.dish_name')) !!}(<span class="red">*</span>)
                                        {!! Form::text('name',null, ['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'placeholder' => trans('dish.note_name')]) !!}
                                    </div>
                                    
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-list font-green" aria-hidden="true"></i>
                                                <span class="caption-subject font-green bold">{{ trans('dish.tag') }}</span>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <!-- <datalist id="list_categories">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->name }}"></option> 
                                                @endforeach
                                            </datalist> -->
                                            <select class="select_tag form-control" name="tag" multiple="multiple">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{!!$category->name!!}</option>
                                                @endforeach
                                            </select>
                                            <!-- {!! Form::text('category_id', null, ['class'=> 'form-control', 'list' => 'list_categories']) !!} -->
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        {!! Form::label(null, trans('dish.description')) !!}(<span class="red">*</span>)
                                        {!! Form::textarea('description', null, ['class' => 'form-control description', 'id' => 'description', 'name' => 'description', 'placeholder' => trans('dish.note_des')]) !!}
                                    </div>
                                    <div class="form-group">
                                        <datalist id="list_ingredients">
                                            @foreach ($ingredients as $ingredient)
                                                <option value="{{ $ingredient->name }}"></option> 
                                            @endforeach
                                        </datalist>

                                        <div class="col-lg-5">
                                            {!! Form::label(null, trans('dish.ingredient')) !!}(<span class="red">*</span>)
                                            {!! Form::text('ingredient', null, ['class'=> 'form-control', 'list' => 'list_ingredients', 'placeholder' => trans('dish.note_ingre')]) !!}
                                        </div>
                                        
                                        <div class="col-lg-5">
                                            {!! Form::label(null, trans('dish.mass')) !!}(<span class="red">*</span>)
                                            {!! Form::number('number', null, ['id' => 'ingredient_mass', 'class' => 'form-control', 'placeholder' => trans('dish.note_gram')]) !!}
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
                                            {!! Form::textarea('direction', null, ['class' => 'form-control steps', 'id' => 'direction', 'placeholder' => trans('dish.note_direction')]) !!}
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
                        <div class="modal-footer">
                            {!! Form::submit(trans('dish.create'), ['class' => 'btn btn-success']) !!}
                            {!! Form::submit(trans('dish.cancel'), ['class' => 'btn btn-warning']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <script>
        $('.select_tag').select2({
            tags: true,
            tokenSeparators: [","],
            createTag: function (tag) {
                return {
                    id: tag.term,
                    text: tag.term,
                    isNew : true
                };
            },
             multiple: true,
        }).on("select2:select", function(e) {
            if(e.params.data.isNew){
               
                    $(this).find('[value="'+e.params.data.id+'"]').replaceWith('<option selected value="'+e.params.data.id+'">'+e.params.data.text+'</option>');
                    $.ajax({
                        type: 'get',
                        url: app_url+ 'admin/products/slug/'+e.params.data.text,
                        success: function(response){
                            $.ajax({
                            type: 'post',
                            url: app_url+ 'admin/tags',
                            data: {name:e.params.data.text, slug:response},
                            success: function(response){
                                
                            }
                        });
                        }
                    });
                    
                
            }

          });
    </script>
@endsection
