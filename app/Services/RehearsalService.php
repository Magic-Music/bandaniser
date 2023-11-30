<?php

namespace App\Services;

use App\Models\Rehearsal;

class RehearsalService
{
    public function __construct(private ResponseDataService $responseDataService) {}

    public function createRehearsal(string $date, ?string $time, ?string $location, ?string $note)
    {
        Rehearsal::create([
            'date' => $date,
            'time' => $time,
            'location' => $location,
            'note' => $note,
        ]);

        return $this->responseDataService->getResponseData($date);
    }

    public function deleteRehearsal(int $id, string $date)
    {
        Rehearsal::destroy($id);

        return $this->responseDataService->getResponseData($date);
    }
}
