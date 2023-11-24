<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Services\DateAggregationService;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __construct(private DateAggregationService $dateAggregationService)
    {}

    public function create(Request $request)
    {
        $date = $request->input('date');
        $note = $request->input('create_availability_note');
        $numberOfDays = $request->input('create_length');

        for ($i = 0; $i < $numberOfDays; $i++) {
            $dateToAdd = date('Y-m-d', strtotime($date . " + $i days"));
            Availability::create([
                'member_id' => $request->input('member_id'),
                'date' => $dateToAdd,
                'note' => $note,
            ]);
        }

        $dateParts = $this->dateAggregationService->getDateParts($date);
        $calendarData = $this->dateAggregationService->getAggregatedEventData(...$dateParts);
        $eventData = $this->dateAggregationService->getAggregatedDateData(...$dateParts);

        return ['html' => view('layouts.calendar', $calendarData)->render(), 'events' => $eventData];
    }
}
