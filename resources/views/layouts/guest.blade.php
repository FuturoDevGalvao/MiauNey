<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full min-h-[100vh] flex items-center justify-center">
    <main class="w-full h-full flex items-center justify-center">
        @yield('content')
    </main>

    @yield('specific-scripts');
</body>

</html>
