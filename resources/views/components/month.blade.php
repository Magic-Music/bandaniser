<div class="container bg-body">
    <div class="lead">{{ $monthName($month) }}</div>
    <div class="py-3">
        <div class="row px-5">
            @for($i = 1; $i < 8; $i++)
                <div class="seven-cols">
                    <div>
                        <strong>{{ $dayFromNumber($i) }}</strong>
                    </div>
                </div>
            @endfor
        </div>
        <div class="row px-5">
            @foreach($calendar as $day)
                <x-day :$day/>
                @if(($day['day'] ?? null) == 'Sunday')
                    </div>
                    <div class="row px-5">
                @endif
            @endforeach
        </div>
    </div>
</div>
