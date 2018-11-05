@extends('layouts.app')

@section('title')
    {{ trans('login.register') }}
@endsection

@section('content')
    {!! Form::open([
        'method' => 'POST', 
        'route' => 'register', 
        'class' => 'login100-form validate-form flex-sb flex-w',
    ]) !!}
    <span class="login100-form-title">{{ trans('login.register') }}</span>

    <div class="p-t-31 p-b-9">
        {!! Form::label('name', trans('login.name'), [
            'class' => 'txt1',
        ]) !!}
    </div>

    <div class="wrap-input100 validate-input">
        {!! Form::text('name', '', [
            'class' => 'input100', 
            'id' => 'name',  
            'required' => 'required', 
            'autofocus' => 'autofocus',
        ]) !!}
    </div>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif

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

    <div class="p-t-31 p-b-9">
        {!! Form::label('password-confirm', trans('login.confirm'), [
            'class' => 'txt1',
        ]) !!}
    </div>
   
    <div class="wrap-input100 validate-input"> 
        {!! Form::password('password_confirmation', [
            'class' => 'input100', 
            'id' => 'password-confirm', 
            'required' => 'required',
        ]) !!}
    </div>             

    <div class="container-login100-form-btn m-t-17 p-t-31">
        {!! Form::button(trans('login.register'), [
            'class' => 'login100-form-btn', 
            'type' => 'submit',
        ]) !!}
    </div>
    <div class="w-full text-center p-t-30">
		<span class="txt2 fs-17">
			{{ trans('login.acc_exits') }}
		</span>

		<a href="{{ route('login') }}" class="txt2 fs-17">
			{{ trans('login.login') }}
		</a>
	</div>               
    {!! Form::close() !!}
@endsection
