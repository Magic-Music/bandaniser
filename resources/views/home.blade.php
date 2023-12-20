@extends('layouts.app')

@section('sidebar')
    <div id="events" class="p-3">
        Click on a day for event information...
    </div>
@endsection

@section('content')
    <div class="lead bg-date py-1 border-bottom border-1 border-dark ">
        <div class="container py-1 text-center">
            <select id="year" onchange="calendar.getCalendar(elValue('year'), elValue('month'))">
                @for($y = $year - 2; $y < $year + 4; $y++)
                    <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>

            <span class="p-2"></span>

            <select id="month" onchange="calendar.getCalendar(elValue('year'), elValue('month'))">
                @for($m = 1; $m < 13; $m++)
                    <option value="{{ $m }}" data-month="{{ $mth = DateTime::createFromFormat('!m', $m)->format('F') }}" {{ ($m == $month) ? 'selected' : '' }}>
                        {{ $mth }}
                    </option>
                @endfor
            </select>
        </div>
    </div>
    <div class="h-100 flex-grow-1" id="calendar">
        <x-month :$year :$month :$gigs :$availability :$rehearsals/>
    </div>
    <x-create-modal />
    @include('modals.update-availability')
    @include('modals.update-rehearsal')
    @include('modals.update-gig')
@endsection

@section('script')
    <script>
        window.onload = () => {
            calendar.storeEvents({{ $year }}, {{ $month }})
        }
    </script>
@endsection
