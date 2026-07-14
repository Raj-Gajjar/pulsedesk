<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

<body>

    <x-alerts />


    <div class="admin-wrapper">

        {{-- Sidebar --}}
        @include('layouts.admin.partials.sidebar')

        {{-- Main Content --}}
        <div class="main-wrapper">

            {{-- Navbar --}}
            @include('layouts.admin.partials.navbar')

            <main class="content-wrapper">
                
                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>