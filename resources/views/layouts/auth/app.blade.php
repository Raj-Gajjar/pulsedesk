<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if($appSettings->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $appSettings->favicon) }}">
    @endif

    <title>
        {{ $appSettings->app_name ?? config('app.name') }}

        @hasSection('title')

            | @yield('title')

        @endif

    </title>
    
    @include('layouts.admin.partials.styles')

    @stack('styles')

    @vite([ 'resources/js/app.js'])

</head>

<body class="bg-light">
    <x-alerts />

    @yield('content')

</body>

</html>