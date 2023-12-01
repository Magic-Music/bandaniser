<?php

namespace App\Services;

use App\Models\Availability;
use App\Models\Gig;
use App\Models\Rehearsal;
use \DateTime;

class CalendarService
{
    private int $year;
    private int $month;
    private ?array $gigs = null;
    private ?array $rehearsals = null;
    private ?array $availability = null;

    public function __construct(
        private GigService $gigService,
        private RehearsalService $rehearsalService,
        private AvailabilityService $availabilityService,
    ) {}

    public function getCalendarAndEventData(string $dateYmd): array
    {
        $dateParts = $this->getDateParts($dateYmd);
        $calendarData = $this->getEventsForMonth(...$dateParts);
        $eventData = $this->getEventsCollatedByDate(...$dateParts);

        return [
            'calendar' => $calendarData,
            'events' =>$eventData,
        ];
    }

    public function getEventsForMonth(int $year, int $month): array
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

    public function getEventsCollatedByDate(int $year, int $month): array
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
            $this->gigs = $this->gigService->getGigsForMonth($this->year, $this->month);
        }

        return $this->gigs;
    }

    private function getAvailability(): array
    {
        if (!$this->availability) {
            $this->availability = $this->availabilityService->getAvailabilityForMonth($this->year, $this->month);
        }

        return $this->availability;
    }

    private function getRehearsals(): array
    {
        if (!$this->rehearsals) {
            $this->rehearsals = $this->rehearsalService->getRehearsalsForMonth($this->year, $this->month);
        }

        return $this->rehearsals;
    }
}
