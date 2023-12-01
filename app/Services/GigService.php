<?php

namespace App\Services;

use App\Entities\GigEntity;
use App\Entities\RehearsalEntity;
use App\Models\Gig;
use App\Models\Rehearsal;

class GigService
{
    public function getGigsForMonth(int $year, int $month): array
    {
        return Gig::whereYear('date', '=', $year)
                ->whereMonth('date', '=', $month)
                ->with('venue')
                ->get()
                ->toArray();
    }

    public function createGig(GigEntity $gig): void
    {
        Gig::create([
            'venue_id' => $gig->venue_id,
            'agency_id' => $gig->agency_id,
            'date' => $gig->date,
            'price' => $gig->price,
            'confirmed' => $gig->confirmed,
            'arrival' => $gig->arrival,
            'note' => $gig->note,
        ]);
    }

    public function updateGig(GigEntity $gig): void
    {
        Gig::where('id', $gig->id)
            ->update([
                'price' => $gig->price,
                'confirmed' => $gig->confirmed,
                'arrival' => $gig->arrival,
                'note' => $gig->note,
            ]);
    }

    public function deleteGig(int $id): void
    {
        Gig::destroy($id);
    }
}
