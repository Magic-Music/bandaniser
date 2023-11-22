<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <title>Bandaniser</title>
    </head>

    <body class="bg-body d-flex flex-column h-100">
        <x-navbar active="home">
            <x-nav-item slug="home">Home</x-nav-item>
            <x-nav-item slug="members">Members</x-nav-item>
            <x-nav-item slug="gigs">Gigs</x-nav-item>
            <x-nav-item slug="venues">Venues</x-nav-item>
            <x-nav-item slug="agencies">Agencies</x-nav-item>
        </x-navbar>

        <div class="container h-100">
            <div class="h-100 bg-light">
                @yield('content')
            </div>
        </div>
    </body>
</html>
