@extends('layouts.auth')
@section('title', __('auth.edit-password-page-title'))

@section('content')
<div class="max-w-xl mx-auto py-10 card p-6 shadow space-y-6">
        <h2 class="text-2xl font-bold mb-4">{{ __('Change Password') }}</h2>

        @if(session('status') === 'password-updated')
            <div class="alert alert-success">{{ __('Password updated successfully.') }}</div>
        @endif

        <x-form.form method="PUT" action="{{ route('user-password.update') }}">

            <x-form.input type="password" name="current_password" label="{{ __('Current Password') }}"/>
            <x-form.input type="password" name="password" label="{{ __('New Password') }}"/>
            <x-form.input type="password" name="password_confirmation" label="{{ __('Confirm Password') }}"/>
            <x-form.submit>{{ __('Change Password')}}</x-form.submit>
        </x-form.form>
    </div>
@endsection
