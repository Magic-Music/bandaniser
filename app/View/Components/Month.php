<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Month extends Component
{
    private const DAYS = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    ];

    public array $calendar;
    public float $calendarRowHeight = 16.66;
    private $date;
    private array $gigDates = [];
    private array $availabilityDates =[];
    private array $rehearsalDates =[];

    public function __construct(
        public int $year,
        public string $month,
        public array $availability = [],
        public array $gigs = [],
        public array $rehearsals = [],
    )
    {
        $this->date = date_create("{$this->year}-{$this->month}-1");
        $this->filterDates();
        $this->buildCalendar();
    }

    public function render(): View|Closure|string
    {
        return view('components.month');
    }

    public function monthName(int $monthNumber): string
    {
        return date_format($this->date, "F");
    }

    public function dayFromNumber($dayNumber): string
    {
        return self::DAYS[(($dayNumber - 1) % 7)];
    }

    private function cellNumberFromDay(string $day): int
    {
        return array_search($day, self::DAYS) + 1;
    }

    private function buildCalendar(): void
    {
        $daysInMonth = date_format($this->date, "t");
        $startCell = $this->cellNumberFromDay(date_format($this->date, "l"));

        $days = [];
        $dayNumber = 1;
        for($cell = 1; $cell < 43; $cell++)
        {
            $lastInRow = ($cell % 7) == 0 ? ['lastInRow' => true] : [];

            if ($cell < $startCell) {
                $days[] = [...$lastInRow];
                continue;
            }

            if ($dayNumber <= $daysInMonth) {
                $formattedDay = $dayNumber < 10 ? "0$dayNumber" : $dayNumber;
                $dateToSearch = "{$this->year}-{$this->month}-$formattedDay";

                $days[] = [
                    'day' => $this->dayFromNumber($cell),
                    'date' => $dayNumber,
                    'gigs' => $this->gigDates[$dateToSearch] ?? [],
                    'availability' => $this->availabilityDates[$dateToSearch] ?? [],
                    'rehearsals' => $this->rehearsalDates[$dateToSearch] ?? [],
                    ...$lastInRow
                ];

                $dayNumber++;
            } else {
                $days[] = [...$lastInRow];
            }

            if ($dayNumber > $daysInMonth && ($cell % 7) == 0) {
                $this->calendarRowHeight = round(90/($cell / 7), 2);
                break;
            }
        }
        $this->calendar = $days;
    }

    private function filterDates()
    {
        foreach ($this->gigs as $gig) {
            $this->gigDates[$gig['date']][] = $gig;
        }

        foreach ($this->availability as $availability) {
            $this->availabilityDates[$availability['date']][] = $availability;
        }

        foreach ($this->rehearsals as $rehearsal) {
            $this->rehearsalDates[$rehearsal['date']][] = $rehearsal;
        }
    }
}
