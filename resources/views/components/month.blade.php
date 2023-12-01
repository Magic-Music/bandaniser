<div class="bg-light flex-grow-1 px-3 h-100">
    <div class="py-5 h-100">
        <div class="d-flex bg-date">
            @for($i = 1; $i < 8; $i++)
                <div class="px-1 border border-1 {{ $i < 7 ? 'border-right-0' : '' }} border-dark" style="flex: 1 1 0;">
                    <div>
                        <strong>{{ $dayFromNumber($i) }}</strong>
                    </div>
                </div>
            @endfor
        </div>
            @foreach($calendar as $day)
                @if($day['firstInRow'] ?? null)
                    <div class="d-flex flex-grow-1 bg-calendar" style="height: {{ $calendarRowHeight }}% !important; ">
                @endif
                <x-day :$day/>
                @if($day['lastInRow'] ?? null)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
