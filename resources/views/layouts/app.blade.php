<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>@yield('title', '{{ $appSettings->app_name }}')</title> --}}
    <title>{{ $appSettings->app_name }} - @yield('title')</title>

    @if($appSettings->favicon)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $appSettings->favicon) }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body>

<div class="d-flex">

    @include('components.sidebar')

    <div class="flex-grow-1">

        @include('components.topbar')
        
        <main class="p-4">
            @include('components.alerts')
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>