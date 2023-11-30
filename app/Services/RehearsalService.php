<?php

namespace App\Services;

use App\Entities\RehearsalEntity;
use App\Models\Rehearsal;

class RehearsalService
{
    public function __construct(private ResponseDataService $responseDataService) {}

    public function createRehearsal(RehearsalEntity $rehearsal)
    {
        Rehearsal::create([
            'date' => $rehearsal->date,
            'time' => $rehearsal->time,
            'location' => $rehearsal->location,
            'note' => $rehearsal->note,
        ]);

        return $this->responseDataService->getResponseData($rehearsal->date);
    }

    public function deleteRehearsal(int $id, string $date)
    {
        Rehearsal::destroy($id);

        return $this->responseDataService->getResponseData($date);
    }
}
