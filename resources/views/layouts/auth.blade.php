<!DOCTYPE html>
<html lang="{{ $pageData['session_language_code'] }}">

    <head>
        <meta charset="{{ $pageData['session_language_data']->charset }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('/shortcut-icon.png') }}" type="image/x-icon">
        @livewireStyles()
        @vite(['resources/css/app.css'])
        <title>@yield('title')</title>
    </head>

    <body>

        <main class="container mt-3">
            @yield('content')

        </main>

      @livewireScripts()

     @vite('resources/js/app.js')
    </body>

</html>
