<?php

namespace App\Services;

use App\Entities\RehearsalEntity;
use App\Models\Availability;
use App\Models\Rehearsal;

class RehearsalService
{
    public function __construct() {}

    public function getRehearsalsForMonth(int $year, int $month): array
    {
        return Rehearsal::whereYear('date', '=', $year)
            ->whereMonth('date', '=', $month)
            ->get()
            ->toArray();
    }

    public function createRehearsal(RehearsalEntity $rehearsal): void
    {
        Rehearsal::create([
            'date' => $rehearsal->date,
            'time' => $rehearsal->time,
            'location' => $rehearsal->location,
            'note' => $rehearsal->note,
        ]);
    }

    public function updateRehearsal(RehearsalEntity $rehearsal): void
    {
        Rehearsal::where('id', $rehearsal->id)
            ->update([
                'time' => $rehearsal->time,
                'location' => $rehearsal->location,
                'note' => $rehearsal->note,
            ]);
    }

    public function deleteRehearsal(int $id): void
    {
        Rehearsal::destroy($id);
    }
}
