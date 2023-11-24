<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100 w-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])

        <title>Bandaniser</title>

        <script>
            @yield('script')
        </script>
    </head>

    <body class="bg-body vh-100 w-100 d-flex flex-column">

        <x-navbar active="home">
            <x-nav-item slug="home">Home</x-nav-item>
            <x-nav-item slug="members">Members</x-nav-item>
            <x-nav-item slug="gigs">Gigs</x-nav-item>
            <x-nav-item slug="venues">Venues</x-nav-item>
            <x-nav-item slug="agencies">Agencies</x-nav-item>
            <div class="border border-1 border-light">
            <x-nav-dropdown
                id="member_dropdown"
                title="Select Member"
                action="member.selectMember"
                :items="\App\Services\MemberService::getMembers()"
            />
            </div>
        </x-navbar>

        <div class="flex-grow-1 h-100">
            <div class="d-flex flex-grow-1 flex-row h-100">
                <div id="event-container" class="w-25 h-100 bg-events border-right border-dark">
                    @yield('sidebar')
                </div>

                <div id="calendar-container" class="d-flex flex-column flex-grow-1 h-100">
                    @yield('content')
                </div>
            </div>
        </div>

    </body>
</html>
