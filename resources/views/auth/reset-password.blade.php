@extends('layouts.auth')
@section('title', __('auth.reset-password-page-title'))

@section('content')
 <div class="max-w-md mx-auto mt-10 card bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-6">{{ __('Reset Password') }}</h2>


        <x-form.form method="POST" action="{{ route('password-update') }}">
            <x-form.input type="hidden" name="token" value="{{ $request->route('token') }}"/>
            <x-form.input type="email" name="email" label="{{ __('Email') }}"/>
            <x-form.input type="password" name="password" label="{{ __('Password') }}"/>
            <x-form.input type="password" name="password_confirmation" label="{{ __('Confirm password') }}"/>
            <x-form.submit>{{__('Reset Password')}}</x-form.submit>
        </x-form.form>

    </div>
@endsection
