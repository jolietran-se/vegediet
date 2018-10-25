@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('login.login') }}</div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'login']) !!}
                        <div class="form-group row">
                            {!! Form::label('email', trans('login.email'), ['class' => 'col-sm-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'value' => "{{ old('email') }}", 'required' => 'required', 'autofocus' => 'autofocus']) !!}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('password', trans('login.password'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'required']) !!}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    {!! Form::checkbox('remember', '', ['class' => 'form-check-input', 'id' => 'remember']) !!}

                                    {!! Form::label('remember', trans('login.rememberme'), ['class' => 'form-check-label']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                {!! Form::button(trans('login.login'), ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('login.forgot') }}
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
