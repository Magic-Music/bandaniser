<?php

namespace App\Services;

use App\Entities\AvailabilityEntity;
use App\Models\Availability;

class AvailabilityService
{
    public function __construct(private ResponseDataService $responseDataService) {}

    public function createAvailability(AvailabilityEntity $availability)
    {
        for ($i = 0; $i < $availability->length; $i++) {
            $dateToAdd = date('Y-m-d', strtotime($availability->date . " + $i days"));
            Availability::create([
                'member_id' => $availability->memberId,
                'date' => $dateToAdd,
                'note' => $availability->note,
            ]);
        }

        return $this->responseDataService->getResponseData($availability->date);
    }

    public function deleteAvailability(int $id, string $date)
    {
        Availability::destroy($id);

        return $this->responseDataService->getResponseData($date);
    }
}
