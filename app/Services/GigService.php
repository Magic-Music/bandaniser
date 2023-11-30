<?php

namespace App\Services;

use App\Entities\GigEntity;
use App\Models\Gig;
use App\Models\Rehearsal;

class GigService
{
    public function __construct(private ResponseDataService $responseDataService) {}

    public function createGig(GigEntity $gig)
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

        return $this->responseDataService->getResponseData($gig->date);
    }

    public function deleteGig(int $id, string $date)
    {
        Gig::destroy($id);

        return $this->responseDataService->getResponseData($date);
    }
}
