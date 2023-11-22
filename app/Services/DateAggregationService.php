<?php

namespace App\Services;

use App\Models\Availability;
use App\Models\Gig;
use App\Models\Rehearsal;
use \DateTime;

class DateAggregationService
{
    public function getAggregatedDateData(int $year, int $month): array
    {
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

        return $dates;
    }
}
