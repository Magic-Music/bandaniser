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

    private function getDayFromDate(string $date): string
    {
        return explode('-', $date)[2];
    }

    private function getGigs(): array
    {
        return Gig::whereYear('date', '=', $this->year)
            ->whereMonth('date', '=', $this->month)
            ->with('venue')
            ->get()
            ->toArray();
    }

    private function getAvailability(): array
    {
        return Availability::whereYear('date', '=', $this->year)
            ->whereMonth('date', '=', $this->month)
            ->with('member')
            ->get()
            ->toArray();
    }

    private function getRehearsals(): array
    {
        return Rehearsal::whereYear('date', '=', $this->year)
            ->whereMonth('date', '=', $this->month)
            ->get()
            ->toArray();
    }
}
