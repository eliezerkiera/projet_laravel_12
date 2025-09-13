@extends('layouts.auth')
@section('title', __('auth.login-page-title'))

@section('content')

<x-form method="POST" action="{{ route('login') }}">

    <x-form.input name="email" type="email" label="{{ __('Email') }}"/>
    <x-form.input name="password" type="password" label="{{ __('Password') }}"/>
    <x-form.checkbox name="remember" label="{{ __('Remember me') }}"/>
    <x-form.submit>{{ __('Login')}}</x-form.submit>

</x-form>
 {{-- Links --}}
        <div class="mt-4 flex justify-between text-sm">
            <a href="{{ route('password.request') }}" class="link link-primary">{{ __('Forgot your password?') }}</a>
            <a href="{{ route('register') }}" class="link link-secondary">{{ __('Create a new account') }}</a>
        </div>


@endsection
