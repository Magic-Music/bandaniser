@aware(['calendarRowHeight'])

<div class="seven-cols border border-1 border-top-0 {{ $borderRight }} border-opacity-50 border-dark calendar-day">
    <div class="px-1">
        <strong>{{ $dateNumber }}</strong>
    </div>
    @foreach($gigs as $gig)
        <div class="bg-{{ $gig['confirmed'] ? 'gig' : 'enquiry' }}">{{ $gig['arrival'] }} - {{ $gig['venue']['name'] }}, {{ $gig['venue']['town'] }}</div>
    @endforeach
    @foreach($availability as $available)
        <div class="bg-available">{{ $available['member']['name'] }}</div>
    @endforeach
    @foreach($rehearsals as $rehearsal)
        <div class="bg-rehearsal">Rehearsal - {{ $rehearsal['time'] }}</div>
    @endforeach
</div>
