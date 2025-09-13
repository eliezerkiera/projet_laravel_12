@extends('layouts.auth')
@section('title', __('auth.confirm-password-page-title'))

@section('content')
 <div class="max-w-xl mx-auto py-10 card p-6 shadow space-y-6">
        <h2 class="text-2xl font-bold mb-4 text-red-600">{{ __('Confirm password') }}</h2>

        <p class="mb-4 text-gray-600">{{ __('Please confirm your password') }}</p>


        <x-form.form method="POST" action="{{ route('password.confirm') }}">
            <x-form.input name="password" type="password" label="{{ __('Password') }}"/>
            <x-form.submit>{{ __('Confirm password')}}</x-form.submit>
        </x-form.form>

    </div>
@endsection
