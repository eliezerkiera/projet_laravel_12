@extends('layouts.app')


@section('content')
<div class="text-center mt-10">
    <h2 class="text-3xl font-bold mb-4">Bienvenue sur mon site 🚀</h2>

        <div x-data="{ open: false }" class="p-4">
    <button @click="open = !open" class="bg-blue-500 text-white px-4 py-2 rounded">
        Toggle Message
    </button>

    <div x-show="open" class="mt-4 text-green-600">
        Bonjour 👋 Je suis visible !
    </div>
</div>
</div>
@endsection
