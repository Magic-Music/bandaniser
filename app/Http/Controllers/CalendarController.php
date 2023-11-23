<?php

namespace App\Http\Controllers;

use App\Services\DateAggregationService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(private DateAggregationService $dateAggregationService)
    {}

    public function index(Request $request)
    {
        $dates = $this->dateAggregationService->getAggregatedEventData(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return view('home', $dates);
    }

    public function getCalendar(Request $request)
    {
        $dates = $this->dateAggregationService->getAggregatedEventData(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return view('layouts.calendar', $dates);
    }

    public function getEvents(Request $request)
    {
        $dates = $this->dateAggregationService->getAggregatedDateData(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return $dates;
    }
}
