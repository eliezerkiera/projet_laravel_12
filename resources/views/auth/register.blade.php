@extends('layouts.auth')
@section('title', __('auth.register-page-title'))

@section('content')

@if ($errors->any())
    <div class= 'mb-4 p-4 rounded-lg bg-red-100 border border-red-400 text-red-700'>
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<x-form.form method="POST" action="{{ route('register') }}">

    <x-form.input type="text" name="last_name" label="{{ __('Last name') }}"/>
    <x-form.input type="text" name="first_name" label="{{ __('First name') }}"/>
    <x-form.input type="email" name="email" label="{{ __('Email') }}"/>
    <x-form.input type="password" name="password" label="{{ __('Password') }}"/>
    <x-form.input type="password" name="password_confirmation" label="{{ __('Confirm Password') }}"/>
    <x-form.select name="country_id" default-value="" :options="$countrySelect"/>
    <x-form.input type="hidden" name="language_id" default-value="{{ $pageData['session_language_data']->id }}"/>
    <x-form.submit>{{__('Register')}}</x-form.submit>
</x-form.form>


@endsection
