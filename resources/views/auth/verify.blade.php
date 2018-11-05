@extends('layouts.app')

@section('title')
    {{ trans('login.verify_email') }}
@endsection

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ trans('login.verification_link') }}
        </div>
    @endif

    {{ trans('login.check_mail') }}
    {{ trans('login.not_receive_mail') }}, <a href="{{ route('verification.resend') }}">{{ trans('login.another_request') }}</a>.
@endsection
