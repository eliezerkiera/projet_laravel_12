@props(['class' => ''])

@php
    // Récupération de l'URL de l'avatar stocké (généré par l'observer)
    $avatarUrl = $user->getAvatarUrl()
        ? asset('storage/' . $user->getAvatarUrl())
        : asset('images/default-avatar.png');

    // Taille Tailwind
    $sizeClass = "w-{$size} h-{$size}";
@endphp

<img src="{{ $avatarUrl }}"
     alt="Avatar de {{ $user->first_name ?? '' }} {{ $user->last_name ?? '' }}"
     class="rounded-full object-cover {{ $sizeClass }} {{ $class }}">
