<?php

namespace App\Http\Controllers;

use App\Models\Rehearsal;
use App\Services\DateAggregationService;
use Illuminate\Http\Request;

class RehearsalController extends Controller
{
    public function __construct(private DateAggregationService $dateAggregationService)
    {}

    public function create(Request $request)
    {
        $date = $request->input('date');

        Rehearsal::create([
            'date' => $date,
            'time' => $request->input('create_start'),
            'location' => $request->input('create_location'),
            'note' => $request->input('create_rehearsal_note'),
        ]);

        $dateParts = $this->dateAggregationService->getDateParts($date);
        $calendarData = $this->dateAggregationService->getAggregatedEventData(...$dateParts);
        $eventData = $this->dateAggregationService->getAggregatedDateData(...$dateParts);

        return ['html' => view('layouts.calendar', $calendarData)->render(), 'events' => $eventData];
    }
}
