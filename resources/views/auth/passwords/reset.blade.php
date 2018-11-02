@extends('layouts.app')

@section('title')
    {{ trans('login.reset') }}
@endsection

@section('content')

    {!! Form::open([
        'method' => 'POST',
        'route' => 'password.update',
        'class' => 'login100-form validate-form flex-sb flex-w',
    ]) !!}
        {!! Form::hidden('token', ['value' => "{{ $token }}"]) !!}

        <span class="login100-form-title">{{ trans('login.reset') }}</span>

        <div class="p-t-31 p-b-9">
            {!! Form::label('email', trans('login.email'), ['class' => 'txt1']) !!}
        </div>

        <div class="wrap-input100 validate-input ">
            {!! Form::email('email', '', [
                'class' => 'input100',
                'id' => 'email',
                'value' => "{{ old('email') }}",
                'required' => 'required',
            ]) !!}
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="p-t-31 p-b-9">
            {!! Form::label('password', trans('login.password'), ['class' => 'txt1']) !!}
        </div>

        <div class="wrap-input100 validate-input ">
            {!! Form::password('password', [
                'class' => 'input100',
                'id' => 'password',
                'required' => 'required',
            ]) !!}
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="p-t-31 p-b-9">
            {!! Form::label('password-confirm', trans('login.confirm'), ['class' => 'txt1']) !!}
        </div>

        <div class="wrap-input100 validate-input ">
            {!! Form::password('password_confirmation', [
                'class' => 'input100',
                'id' => 'password-confirm',
                'required' => 'required',
            ]) !!}
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="container-login100-form-btn m-t-17 p-t-20">
            {!! Form::button(trans('login.reset'), ['class' => 'login100-form-btn', 'type' => 'submit']) !!}
        </div>

        <div class="w-full text-center p-t-30">
            <a href="{{ route('login') }}" class="txt2 fs-17 p-r-15">
                {{ trans('login.login') }}
            </a>
            <a href="{{ route('register') }}" class="txt2 fs-17 p-l-15">
                {{ trans('login.register') }}
            </a>
        </div>
    {!! Form::close() !!}
@endsection
