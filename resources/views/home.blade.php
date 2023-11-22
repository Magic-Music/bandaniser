@extends('layouts.app')

@section('content')
    <div class="lead bg-date py-1 border-bottom border-1 border-dark w-100">
        <div class="container py-1 px-5">
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
    <div class="h-100" id="calendar">
        <x-month :$year :$month :$gigs :$availability :$rehearsals/>
    </div>
@endsection
