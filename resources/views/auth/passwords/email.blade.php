@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('login.reset') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['method' => 'POST', 'route' => 'password.email']) !!}

                        <div class="form-group row">
                            {!! Form::label('email', trans('login.email'), ['class' => 'col-sm-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'value' => "{{ old('email') }}", 'required' => 'required']) !!}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {!! Form::button(trans('login.reset_link'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
