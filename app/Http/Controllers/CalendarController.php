<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Gig;
use App\Models\Rehearsal;
use Illuminate\Http\Request;
use \DateTime;

class CalendarController extends Controller
{
    public function __invoke(Request $request)
    {
        $year = $request->year ?? date('Y');
        $month = $request->month ?? date('m');

        $dates = [
            'year' => $year,
            'month' => $month,
            'monthName' => DateTime::createFromFormat('!m', $month)->format('F'),
        ];

        $dates['gigs'] = Gig::whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->with('venue')
            ->get()
            ->toArray();

        $dates['availability'] = Availability::whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->with('member')
            ->get()
            ->toArray();

        $dates['rehearsals'] = Rehearsal::whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->get()
            ->toArray();

        return view('home', $dates);
    }
}
