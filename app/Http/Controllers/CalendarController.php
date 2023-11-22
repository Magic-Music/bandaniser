<?php

namespace App\Http\Controllers;

use App\Services\DateAggregationService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request, DateAggregationService $dateAggregationService)
    {
        $dates = $dateAggregationService->getAggregatedDateData(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return view('home', $dates);
    }

    public function getCalendar(Request $request, DateAggregationService $dateAggregationService)
    {
        $dates = $dateAggregationService->getAggregatedDateData(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return view('layouts.calendar', $dates);
    }
}
