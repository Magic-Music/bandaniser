@aware(['calendarRowHeight'])

<div class="border border-1 border-top-0 {{ $borderRight }} border-opacity-50 border-dark calendar-day h-100" style="flex: 1 1 0; " onClick="events.showEvents({{ $dateNumber }});">
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
</div>
