<?php

namespace App\Services;

use App\Entities\AvailabilityEntity;
use App\Models\Availability;

class AvailabilityService
{
    public function __construct() {}

    public function getAvailabilityForMonth(int $year, int $month): array
    {
        return Availability::whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->with('member')
            ->get()
            ->toArray();
    }

    public function createAvailability(AvailabilityEntity $availability): void
    {
        for ($i = 0; $i < $availability->length; $i++) {
            $dateToAdd = date('Y-m-d', strtotime($availability->date . " + $i days"));
            Availability::create([
                'member_id' => $availability->memberId,
                'date' => $dateToAdd,
                'note' => $availability->note,
            ]);
        }
    }

    public function deleteAvailability(int $id): void
    {
        Availability::destroy($id);
    }
}
