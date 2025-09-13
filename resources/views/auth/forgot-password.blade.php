@extends('layouts.auth')
@section('title', __('auth.forgot-password-page-title'))

@section('content')
  <div class="max-w-md mx-auto mt-10 card bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center mb-6">{{ __('Forgot Password') }}</h2>

        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ __(session('status')) }}
            </div>
        @endif

        <x-form.form method="POST" route="{{ route('password.email') }}">
            <x-form.input type="email" name="email" label="{{ __('Email') }}"/>
            <x-form.submit>{{__('Send Password Reset Link')}}</x-form.submit>
        </x-form.form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">
                {{ __('Back to Login') }}
            </a>
        </div>
    </div>
@endsection
