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

        $responseData = $this->dateAggregationService->getAllAggregatedData($date);

        return [
            'html' => view('layouts.calendar', $responseData['calendar'])->render(),
            'events' => $responseData['events']
        ];
    }
}
