@extends('layouts.auth')
@section('title', __('auth.verify-email-page-title'))

@section('content')
  <div class="max-w-md mx-auto mt-10 bg-base-100 shadow-xl rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-4 text-center">{{ __('Email Verification Required') }}</h2>

        <p class="mb-4 text-sm text-gray-600">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>

        <p class="mb-6 text-sm text-gray-600">
            {{ __('If you did not receive the email, you can request another one below.') }}
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success mb-4">
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
        @endif


        <x-form.form method="POST" action="{{ route('verification.send') }}">
            <x-form.submit>{{ __('Resend Verification Email')}}</x-form.submit>
        </x-form.form>

        <x-form.form mathod="POST" action="{{ route('logout') }}">
            <x-form.submit>{{ __('Logout')}}</x-form.submit>
        </x-form.form>


    </div>
@endsection
