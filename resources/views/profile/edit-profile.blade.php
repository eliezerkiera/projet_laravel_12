@extends('layouts.auth')
@section('title', __('auth.edit-profile-page-title'))

@section('content')
 <div class="max-w-xl mx-auto py-10 card p-6 shadow space-y-6">

        <h2 class="text-2xl font-bold mb-4">{{ __('Profile Information') }}</h2>
       @if(session('status') === 'profile-information-updated')
            <div class="alert alert-success">{{ __('Profile updated successfully.') }}</div>
        @endif

        @if(session('status') === 'password-updated')
            <div class="alert alert-success">{{ __('Password updated successfully.') }}</div>
        @endif

        @if(session('status') === 'profile-information-updated-email-verification')
    <div class="alert alert-info">
        {{ __('Your profile has been updated. Please verify your new email address before continuing.') }}
    </div>
@endif

        @if(session('status') === 'profile-updated')
            <div class="alert alert-success">{{ __('Profile updated successfully.') }}</div>
        @elseif(session('status') === 'verification-link-sent')
            <div class="alert alert-success">{{ __('A new verification link has been sent to your email address.') }}</div>
        @endif

        <x-form.form method="PUT" action="{{ route('user-profile-information.update') }}">


            <x-form.input name="first_name" type="text" :default-value="$user->first_name" label="{{ __('First name') }}"/>
            <x-form.input name="last_name" type="text" :default-value="$user->last_name" label="{{ __('Last name') }}"/>
            <x-form.input name="email" type="email" :default-value="$user->email" label="{{ __('Email') }}"/>
             <x-form.select name="country_id" :default-value="$user->country_id" :options="$countrySelect"/>
            <x-form.input type="hidden" name="language_id" :default-value="$user->language_id"/>
            <x-form.submit>{{ __('Save')}}</x-form.submit>

        </x-form.form>


         {{-- Change Password --}}
    <div class="mt-8">
        <a href="{{ route('user-password.edit') }}" class="btn btn-outline btn-warning">
            {{ __('Change Password') }}
        </a>
    </div>

    {{-- Delete Account --}}
    <div class="mt-8">
        <x-form.form method="DELETE" action="{{ route('user.delete') }}">
            <x-form.submit>{{ __('Delete Account')}}</x-form.submit>
        </x-form.form>
    </div>

    </div>
@endsection
