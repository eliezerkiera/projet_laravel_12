@extends('layouts.auth')
@section('title', __('auth.delete-request-page-title'))

@section('content')
 <div class="max-w-xl mx-auto py-10 card p-6 shadow space-y-6">
        <h2 class="text-2xl font-bold mb-4 text-red-600">{{ __('Delete Account') }}</h2>

        <p class="mb-4 text-gray-600">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>


        <x-form.form method="POST" action="{{ route('user.delete') }}">
            @method('delete')
            <x-form.input name="password" type="password" label="{{ __('Password') }}"/>
            <x-form.submit>{{ __('Delete Account')}}</x-form.submit>
        </x-form.form>

    </div>
@endsection
