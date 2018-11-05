@extends('layouts.app')

@section('title')
    {{ trans('login.login') }}
@endsection

@section('content')
{!! Form::open([
    'method' => 'POST', 
    'route' => 'login', 
    'class' => 'login100-form validate-form flex-sb flex-w'
]) !!}
    <span class="login100-form-title p-b-53">{{ trans('login.login') }}</span>
    
    <a href="#" class="btn-face m-b-20">
        <i class="fa fa-facebook-official"></i>
        {{ trans('login.facebook') }}
    </a>

	<a href="#" class="btn-google m-b-20">
		<img src="{{ asset('images/icon-google.png') }}" alt="GOOGLE">
	    {{ trans('login.google') }}
	</a>
    
    <div class="p-t-31 p-b-9">
        {!! Form::label('email', trans('login.email'), [
            'class' => 'txt1',
        ]) !!}
    </div>

    <div class="wrap-input100 validate-input">
        {!! Form::email('email', '', [
            'class' => 'input100', 
            'id' => 'email', 
            'value' => old('email'), 
            'required' => 'required', 
            'autofocus' => 'autofocus',
        ]) !!}
    </div>

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    
    <div class="p-t-31 p-b-9">
        {!! Form::label('password', trans('login.password'), [
            'class' => 'txt1',
        ]) !!}
    </div>

    <div class="wrap-input100 validate-input">
        {!! Form::password('password', [
            'class' => 'input100', 
            'id' => 'password', 
            'required' => 'required',
        ]) !!}        
    </div>

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    <div class="container-login100-form-btn m-t-17">
        {!! Form::checkbox('remember', '', [
            'class' => 'form-check-input', 
            'id' => 'remember',
        ]) !!}

        {!! Form::label('remember', trans('login.rememberme'), [
            'class' => 'fs-17',
        ]) !!}

    </div>

    <div class="container-login100-form-btn m-t-17">
        {!! Form::button(trans('login.login'), [
            'class' => 'login100-form-btn', 
            'type' => 'submit',
        ]) !!}
    </div>

    <div class="w-full text-center p-t-20">
        <div class="txt2  p-t-10 ">
            <a class="fs-17" href="{{ route('password.request') }}">
                {{ trans('login.forgot') }}
            </a>
        </div>
        <div class="p-t-5">
            <span class="txt2 fs-17">
                {{ trans('login.acc_not_exits') }}
            </span>

            <a href="{{ route('register') }}" class="txt2 fs-17">
                {{ trans('login.register') }}
            </a>
        </div>
	</div>

{!! Form::close() !!}
@endsection
