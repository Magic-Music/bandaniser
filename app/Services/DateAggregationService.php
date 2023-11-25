<?php

namespace App\Services;

use App\Models\Availability;
use App\Models\Gig;
use App\Models\Rehearsal;
use \DateTime;

class DateAggregationService
{
    private int $year;
    private int $month;
    private ?array $gigs = null;
    private ?array $rehearsals = null;
    private ?array $availability = null;

    public function getAllAggregatedData(string $date): array
    {
        $dateParts = $this->getDateParts($date);
        $calendarData = $this->getAggregatedEventData(...$dateParts);
        $eventData = $this->getAggregatedDateData(...$dateParts);

        return [
            'calendar' => $calendarData,
            'events' =>$eventData,
        ];
    }

    public function getAggregatedEventData(int $year, int $month): array
    {
        $this->year = $year;
        $this->month = $month;

        $dates = [
            'year' => $year,
            'month' => $month,
            'monthName' => DateTime::createFromFormat('!m', $month)->format('F'),
        ];

        $dates['gigs'] = $this->getGigs();
        $dates['availability'] = $this->getAvailability();
        $dates['rehearsals'] = $this->getRehearsals();

        return $dates;
    }

    public function getAggregatedDateData(int $year, int $month): array
    {
        $this->year = $year;
        $this->month = $month;

        $dates = [];

        foreach ($this->getGigs() as $gig) {
            $dates['gigs'][$this->getDayFromDate($gig['date'])][] = $gig;
        }

        foreach ($this->getAvailability() as $availability) {
            $dates['availability'][$this->getDayFromDate($availability['date'])][] = $availability;
        }

        foreach ($this->getRehearsals() as $rehearsal) {
            $dates['rehearsals'][$this->getDayFromDate($rehearsal['date'])][] = $rehearsal;
        }

        return $dates;
    }

    public function getDateParts(string $date): array
    {
        $parts = explode('-', $date);
        return [(int)$parts[0], (int)$parts[1], (int)$parts[2]];
    }

    private function getDayFromDate(string $date): string
    {
        return explode('-', $date)[2];
    }

    private function getGigs(): array
    {
        if (!$this->gigs) {
            $this->gigs = Gig::whereYear('date', '=', $this->year)
                ->whereMonth('date', '=', $this->month)
                ->with('venue')
                ->get()
                ->toArray();
        }

        return $this->gigs;
    }

    private function getAvailability(): array
    {
        if (!$this->availability) {
            $this->availability = Availability::whereYear('date', '=', $this->year)
                ->whereMonth('date', '=', $this->month)
                ->with('member')
                ->get()
                ->toArray();
        }

        return $this->availability;
    }

    private function getRehearsals(): array
    {
        if (!$this->rehearsals) {
            $this->rehearsals = Rehearsal::whereYear('date', '=', $this->year)
                ->whereMonth('date', '=', $this->month)
                ->get()
                ->toArray();
        }

        return $this->rehearsals;
    }
}
