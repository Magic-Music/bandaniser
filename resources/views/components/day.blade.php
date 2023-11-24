@aware(['calendarRowHeight', 'year', 'month'])

<div
    class="d-flex flex-column border border-1 border-top-0 {{ $borderRight }} border-opacity-50 border-dark calendar-day h-100"
    style="flex: 1 1 0; "
    @if ((string)$dateNumber != "")
        id="date_{{ $dateNumber }}"
        onClick="events.showEvents({{ $dateNumber }});"
    @endif
>
    <div class="px-1">
        <strong>{{ $dateNumber }}</strong>
    </div>

    @foreach($gigs as $gig)
        <div class="p-1 bg-{{ $gig['confirmed'] ? 'gig' : 'enquiry' }}">{{ $gig['arrival'] }} - {{ $gig['venue']['name'] }}, {{ $gig['venue']['town'] }}</div>
    @endforeach
    @foreach($availability as $available)
        <div class="p-1 bg-available">{{ $available['member']['name'] }}</div>
    @endforeach
    @foreach($rehearsals as $rehearsal)
        <div class="p-1 bg-rehearsal">Rehearsal - {{ $rehearsal['time'] }}</div>
    @endforeach

    @if ((string)$dateNumber != "")
        <div class="d-flex flex-row-reverse mt-auto">
            <div class="border-top border-left border-dark bg-light" data-toggle="modal" data-target="#createModal" onclick="create.open('{{ $year }}-{{ $month }}-{{ $dateNumber }}');">
                <img height=20px width=20px src="{{ Vite::asset('resources/images/plus.png') }}">
            </div>
        </div>
    @endif
</div>
