@extends('layouts.master')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/dish_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-fileinput/css/fileinput.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/sweetalert2/dist/sweetalert2.min.css') }}">
    
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
    @if($errors->count() > 0)
        <div id="ERROR_COPPY" style="display:none" class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif
    <div class="content page">
        <div class="container_12">
            <div class="grid_12">

                <div class="breadcrumbs">
                    <div class="container">
                        <ol class="breadcrumb breadcrumb--ys pull-left">
                            <li class="home-link"><a href="{{ route('home') }}" class="fa fa-home"></a></li>
                            <li><a href="{{ route('home') }}">{{ trans('headertext.home') }}</a></li>
                            <li class="active">{{ trans('dish.add') }} </li>
                        </ol>
                    </div>
                </div>

                <div id="pageContent" class="model">
                    {!! Form::open([
                        'method' => 'POST', 
                        'route' => 'dishes.store', 
                        'class' => 'form-horizontal validate-form flex-sb flex-w'
                        ]) 
                    !!}
                        <div class="portlet-body form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::label(null, trans('dish.dish_picture')) !!}(<span class="red">*</span>)
                                    <div class="main-section">
                                        <div class="form-group">
                                            <div class="file-loading">
                                                {!! Form::file('file', 
                                                    ['class' => 'file', 
                                                    'multiple' => true, 
                                                    'id' => 'file-1', 
                                                    'name' => 'file',
                                                    'data-overwrite-initial' => 'false', 
                                                    'data-min-file-count' => '2'
                                                    ]) 
                                                !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label(null, trans('dish.dish_name')) !!}(<span class="red">*</span>)
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('name',null, [
                                                'class' => 'form-control', 
                                                'id' => 'name', 
                                                'name' => 'name',
                                                'placeholder' => trans('dish.note_name')
                                                ]) 
                                            !!}
                                        </div>
                                        <div class="form-group">
                                            <i class="fa fa-list font-green" aria-hidden="true"></i>{!! Form::label(null, trans('dish.category')) !!}
                                        </div>
                                        <div class="portlet light bordered form-group">
                                            <div class="portlet-body">
                                                <select class="select2_tag form-control" id="tags" name="tags[]" multiple="multiple">
                                                    @foreach($categories as $tag)
                                                        <option value="{{$tag->id}}">{!! $tag->name !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            {!! Form::label(null, trans('dish.description')) !!}(<span class="red">*</span>)
                                        </div>
                                        <div class="form-group">
                                            {!! Form::textarea('description', null, [
                                                'class' => 'form-control description', 
                                                'id' => 'description', 
                                                'name' => 'description',
                                                'placeholder' => trans('dish.note_des')
                                                ]) 
                                            !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <datalist id="list_ingredients">
                                                @foreach ($ingredients as $ingredient)
                                                    <option data-value="{{ $ingredient->id }}" value="{{ $ingredient->name }}"></option> 
                                                @endforeach
                                            </datalist>
                                            <div class="col-lg-6">
                                                {!! Form::label(null, trans('dish.ingredient')) !!}(<span class="red">*</span>)
                                            </div>
                                            <div class="col-lg-5">
                                                {!! Form::label(null, trans('dish.mass')) !!}(<span class="red">*</span>)
                                            </div>
                                        </div>
                                        <div class="form-group more-ingredien-1">
                                            <div class="col-lg-6">
                                                {!! Form::text('ingredients[]', null, [
                                                    'class'=> 'form-control', 
                                                    'list' => 'list_ingredients',  
                                                    'placeholder' => trans('dish.note_ingre')
                                                    ]) 
                                                !!}
                                            </div>
                                            <div class="col-lg-4">
                                                {!! Form::number('masses[]', null, [
                                                    'id' => 'ingredient_mass', 
                                                    'class' => 'form-control', 
                                                    'placeholder' => trans('dish.note_gram')
                                                    ]) 
                                                !!}
                                            </div>
                                            <div class="col-lg-1">
                                                <button class="dynamic item-remove-ingredient"><span class="fa fa-minus-circle"></span></button>
                                            </div>
                                        </div >
                                        <button class="dynamic item-add-ingredient pull-left"><span class="fa fa-plus-circle"></span></button>
                                    </div>  

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="col-lg-10">
                                                {!! Form::label(null, trans('dish.direction')) !!}(<span class="red">*</span>)
                                            </div>                                            
                                        </div>
                                        <div class="form-group more-cookingstep-1">
                                            <div class="col-lg-10">
                                                {!! Form::textarea('direction[]', null, [
                                                    'class' => 'form-control steps', 
                                                    'placeholder' => trans('dish.note_direction')
                                                    ]) 
                                                !!}
                                            </div>
                                            <div class="col-lg-1">
                                                <button class="dynamic item-remove-step"><span class="fa fa-minus-circle"></span></button>
                                            </div>
                                        </div>
                                        <button class="dynamic item-add-step"><span class="fa fa-plus-circle"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="auth">
                            @if (Route::has('login'))
                                <input type="hidden" name="auth" value="{{ Auth::user()->id }}">
                            @endif
                        </div>
                        <div class="modal-footer form-group">
                            <input type="hidden" name="images" id="img">
                            {!! Form::submit(trans('dish.create'), ['class' => 'btn btn-success', 'data-dismiss' => 'modal', 'id' => 'submit']) !!}
                            <button type="button" class="btn btn-warning" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    <!-- Upload Image with fileinput -->
    <script src="{{ asset('bower_components/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
	<script src="{{ asset('bower_components/bootstrap-fileinput/themes/fa/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bower_components/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
    
    <!-- Create Tags with Select2 -->
	<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
    
    <!-- SweetAlert -->
	<script src="{{ asset('bower_components/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
    
    <!-- Upload images -->
    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "http://127.0.0.1:8000/mon-chay/image-uploads",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
            overwriteInitial: false,
            minFileSize:50,
            maxFileSize:1000,
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

    <!-- Tags -->
    <script type="text/javascript">
        $('.select2_tag').select2({
        tags: true,placeholder: "Thêm tags...",
        minimumInputLength: 2,
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
                    //
                });
            }
        });
    </script>
    
     <!-- Thêm nguyên liệu hoặc các bước làm -->
    <script>
        var add_ingredient = '<div class="form-group more-ingredient">'+
                                    '<div class="col-lg-6">'+
                                        '{!! Form::text('ingredients[]', null, ['class'=> 'form-control', 'list' => 'list_ingredients', 'placeholder' => trans('dish.note_ingre')]) !!}'+
                                    '</div>'+
                                    '<div class="col-lg-4">'+
                                        '{!! Form::number('masses[]', null, ['id' => 'ingredient_mass', 'class' => 'form-control', 'placeholder' => trans('dish.note_gram')]) !!}'+
                                    '</div>'+
                                    '<div class="col-lg-1">'+
                                        '<button class="dynamic item-remove-ingredient"><span class="fa fa-minus-circle"></span></button>'+
                                    '</div>'+
                                '</div>'

        var add_cooking_step = '<div class="form-group more-cookingstep">'+
                                    '<div class="col-lg-10">'+
                                        '{!! Form::textarea('direction[]', null, ['class' => 'form-control steps', 'placeholder' => trans('dish.note_direction')]) !!}'+
                                    '</div>'+
                                    '<div class="col-lg-1">'+
                                        '<button class="dynamic item-remove-step"><span class="fa fa-minus-circle"></span></button>'+
                                    '</div>'+
                                '</div>'
        $('.item-add-ingredient').on('click', function(e){
            e.preventDefault();
            $(this).after(add_ingredient);
        });
        $('.item-add-step').on('click', function(e){
            e.preventDefault();
            $(this).before(add_cooking_step);
        });

        $(document).on('click', '.item-remove-ingredient', function(e){
            e.preventDefault();
            $(this).parents('.more-ingredient').remove();
        });

        $(document).on('click', '.item-remove-step', function(e){
            e.preventDefault();
            $(this).parents('.more-cookingstep').remove();
        });

    </script>
    <!-- SweetAlert2 -->
    <script>
        var has_errors = {{ $errors->count() > 0? 'true' : 'false'}};
        if(has_errors){
            swal({
                title: 'Lỗi',
                type: 'error',
                html:jQuery('#ERROR_COPPY').html(),
                showCloseButton: true,
            })
        }
    </script>
@endsection

