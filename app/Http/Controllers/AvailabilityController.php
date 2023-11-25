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

        $responseData = $this->dateAggregationService->getAllAggregatedData($date);

        return [
            'html' => view('layouts.calendar', $responseData['calendar'])->render(),
            'events' => $responseData['events']
        ];
    }
}
