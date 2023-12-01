<?php

namespace App\Http\Controllers;

use App\Services\CalendarService;
use App\Services\ResponseDataService;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct(
        private ResponseDataService $responseDataService,
        private CalendarService     $calendarService,
    )
    {}

    public function index(Request $request)
    {
        $dates = $this->calendarService->getEventsForMonth(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return view('home', $dates);
    }

    public function getCalendar(Request $request)
    {
        $year = $request->year ?? date('Y');
        $month =$request->month ?? date('m');

        return $this->responseDataService->getRenderedCalendarAndEventData("$year-$month-01");

    }

    public function getEvents(Request $request)
    {
        $dates = $this->calendarService->getEventsCollatedByDate(
            $request->year ?? date('Y'),
            $request->month ?? date('m')
        );

        return $dates;
    }
}
