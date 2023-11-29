<?php

namespace App\Services;

class ResponseDataService
{
    public function __construct(private DateAggregationService $dateAggregationService) {}

    public function getResponseData($date)
    {
        $responseData = $this->dateAggregationService->getAllAggregatedData($date);

        return [
            'html' => view('layouts.calendar', $responseData['calendar'])->render(),
            'events' => $responseData['events']
        ];
    }
}
