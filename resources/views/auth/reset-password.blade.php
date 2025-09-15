@extends('layouts.auth')
@section('title', __('auth.reset-password-page-title'))

@section('content')
 <div class="max-w-md mx-auto mt-10 card bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-6">{{ __('Reset Password') }}</h2>
@if ($errors->any())
    <div class= 'mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700'>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <x-form.form method="POST" action="{{ route('password.update') }}">

            <x-form.input type="hidden" name="token" default-value="{{ $request->route('token') }}"/>
            <x-form.input type="email" name="email" label="{{ __('Email') }}"/>
            <x-form.input type="password" name="password" label="{{ __('Password') }}"/>
            <x-form.input type="password" name="password_confirmation" label="{{ __('Confirm password') }}"/>
            <x-form.submit>{{__('Reset Password')}}</x-form.submit>
        </x-form.form>

    </div>
@endsection
