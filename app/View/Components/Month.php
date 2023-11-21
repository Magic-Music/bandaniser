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

    private $date;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $year,
        public string $month,
        public array $availability = [],
        public array $gigs = []
    )
    {
        $this->date = date_create("{$this->year}-{$this->month}-1");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.month');
    }

    public function monthName(int $monthNumber): string
    {
        return date_format($this->date, "F");
    }

    public function calendar(): array
    {
        $daysInMonth = date_format($this->date, "t");
        $startCell = $this->cellNumberFromDay(date_format($this->date, "l"));

        $days = [];
        $dayNumber = 1;
        for($cell = 1; $cell < 43; $cell++)
        {
            if ($cell < $startCell) {
                $days[] = [];
                continue;
            }

            if ($dayNumber <= $daysInMonth) {
                $days[] = [
                    'day' => $this->dayFromNumber($cell),
                    'date' => $dayNumber,
                ];

                $dayNumber++;
            } else {
                $days[] = [];
            }

            if ($dayNumber > $daysInMonth && ($cell % 7) == 0) {
                break;
            }
        }

        return $days;
    }

    public function dayFromNumber($dayNumber): string
    {
        return self::DAYS[(($dayNumber - 1) % 7)];
    }

    private function cellNumberFromDay(string $day): int
    {
        return array_search($day, self::DAYS) + 1;
    }
}
