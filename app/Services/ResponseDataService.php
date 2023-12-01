<?php

namespace App\Services;

class ResponseDataService
{
    public function __construct(private CalendarService $calendarService) {}

    public function getRenderedCalendarAndEventData(string $dateYmd): array
    {
        $responseData = $this->calendarService->getCalendarAndEventData($dateYmd);

        return [
            'html' => view('layouts.calendar', $responseData['calendar'])->render(),
            'events' => $responseData['events']
        ];
    }
}
