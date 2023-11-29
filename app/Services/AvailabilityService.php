<?php

namespace App\Services;

use App\Models\Availability;

class AvailabilityService
{
    public function __construct(private ResponseDataService $responseDataService) {}

    public function createAvailability(string $date, int $memberId,  int $numberOfDays, ?string $note)
    {
        for ($i = 0; $i < $numberOfDays; $i++) {
            $dateToAdd = date('Y-m-d', strtotime($date . " + $i days"));
            Availability::create([
                'member_id' => $memberId,
                'date' => $dateToAdd,
                'note' => $note,
            ]);
        }

        return $this->responseDataService->getResponseData($date);
    }

    public function deleteAvailability(int $id, string $date)
    {
        Availability::destroy($id);

        return $this->responseDataService->getResponseData($date);
    }
}
