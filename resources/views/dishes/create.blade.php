@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">
    
    <style type="text/css">
        .main-section{
            margin:0 auto;
            padding-bottom: 20px;
        }
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }
    </style>
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

                <div id="pageContent" class="model">
                    {!! Form::open(['method' => 'POST', 'route' => 'dishes.store', 'class' => 'form-horizontal']) !!}
                        <div class="portlet-body form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::label(null, trans('dish.dish_picture')) !!}(<span class="red">*</span>)
                                    <div class="main-section">
                                        <div class="form-group">
                                            <div class="file-loading">
                                                {!! Form::file('file', ['class' => 'file', 'multiple' => true, 'id' => 'file-1', 'name' => 'file', 'data-overwrite-initial' => 'false', 'data-min-file-count' => '2']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label(null, trans('dish.dish_name')) !!}(<span class="red">*</span>)
                                            {!! Form::text('name',null, ['class' => 'form-control', 'id' => 'name', 'name' => 'name', 'placeholder' => trans('dish.note_name')]) !!}
                                        </div>
                                        <div class="portlet light bordered form-group">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-list font-green" aria-hidden="true"></i>
                                                    <span class="caption-subject font-green bold">{{ trans('dish.category') }}</span>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <datalist id="list_categories">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->name }}"></option> 
                                                    @endforeach
                                                </datalist>
                                                {!! Form::text('categories', null, ['class'=> 'form-control', 'list' => 'list_categories']) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label(null, trans('dish.description')) !!}(<span class="red">*</span>)
                                            {!! Form::textarea('description', null, ['class' => 'form-control description', 'id' => 'description', 'name' => 'description', 'placeholder' => trans('dish.note_des')]) !!}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <datalist id="list_ingredients">
                                                @foreach ($ingredients as $ingredient)
                                                    <option value="{{ $ingredient->name }}"></option> 
                                                @endforeach
                                            </datalist>

                                            <div class="col-lg-5">
                                                {!! Form::label(null, trans('dish.ingredient')) !!}(<span class="red">*</span>)
                                                {!! Form::text('ingredient', null, ['class'=> 'form-control', 'list' => 'list_ingredients', 'name' => 'ingredients', 'placeholder' => trans('dish.note_ingre')]) !!}
                                            </div>
                                            
                                            <div class="col-lg-5">
                                                {!! Form::label(null, trans('dish.mass')) !!}(<span class="red">*</span>)
                                                {!! Form::number('number', null, ['id' => 'ingredient_mass', 'name' => 'masses', 'class' => 'form-control', 'placeholder' => trans('dish.note_gram')]) !!}
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
                                                {!! Form::textarea('direction', null, ['class' => 'form-control steps', 'id' => 'direction', 'name' => 'directions', 'placeholder' => trans('dish.note_direction')]) !!}
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
                        </div>

                        <div class="modal-footer form-group">
                            <input type="hidden" name="images" id="img">
                            {!! Form::submit(trans('dish.create'), ['class' => 'btn btn-success', 'data-dismiss' => 'modal', 'id' => 'submit']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')

    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "http://127.0.0.1:8000/dishes/image-uploads",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:200,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                console.log(filename);                                                                                               
                return filename.replace('(', '_').replace(']', '_');
            }
        });
        $('#file-1').on('fileuploaded', function(event, data, previewId, index) {
            var response = data.response;
            console.log(response);
            var img = $('#img').val();
            $('#img').val(img + ',' + response.data.image);
        });
    </script>

@endsection
