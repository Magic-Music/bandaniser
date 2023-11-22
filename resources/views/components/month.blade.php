<div class="container bg-body h-100">
    <div class="py-3 h-75">
        <div class="row px-5">
            @for($i = 1; $i < 8; $i++)
                <div class="seven-cols px-1 border border-1 {{ $i < 7 ? 'border-right-0' : '' }} border-dark">
                    <div>
                        <strong>{{ $dayFromNumber($i) }}</strong>
                    </div>
                </div>
            @endfor
        </div>
        <div class="row px-5" style="height: {{ $calendarRowHeight }}% !important;">
            @foreach($calendar as $day)
                <x-day :$day/>
                @if(($day['day'] ?? null) == 'Sunday')
                    </div>
                    <div class="row px-5"  style="height: {{ $calendarRowHeight }}% !important;">
                @endif
            @endforeach
        </div>
    </div>
</div>
