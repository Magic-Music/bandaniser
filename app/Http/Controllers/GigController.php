<?php

namespace App\Http\Controllers;

use App\Models\Gig;
use App\Services\DateAggregationService;
use Illuminate\Http\Request;

class GigController extends Controller
{
    public function __construct(private DateAggregationService $dateAggregationService)
    {}

    public function create(Request $request)
    {
        $date = $request->input('date');

        Gig::create([
            'venue_id' => $request->input('create_venue'),
            'agency_id' => $request->input('create_agency') ?: null,
            'date' => $date,
            'price' => $request->input('create_price'),
            'confirmed' => $request->boolean('create_confirmed'),
            'arrival' => $request->input('create_arrival'),
            'note' => $request->input('create_gig_note'),
        ]);

        $responseData = $this->dateAggregationService->getAllAggregatedData($date);

        return [
            'html' => view('layouts.calendar', $responseData['calendar'])->render(),
            'events' => $responseData['events']
        ];
    }
}
