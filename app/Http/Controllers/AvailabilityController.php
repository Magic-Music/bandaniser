<?php

namespace App\Http\Controllers;

use App\Entities\AvailabilityEntity;
use App\Services\AvailabilityService;
use App\Services\ResponseDataService;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __construct(
        private AvailabilityEntity $availability,
        private AvailabilityService $availabilityService,
        private ResponseDataService $responseDataService,
    ) {}

    public function create(Request $request)
    {
        $this->availability->set([
            'date' => $request->input('date'),
            'memberId' => $request->input('member_id'),
            'length' => $request->input('create_length'),
            'note' => $request->input('create_availability_note'),
        ]);

        $this->availabilityService->createAvailability($this->availability);

        return $this->responseDataService->getResponseData($this->availability->date);
    }

    public function delete($id, $date)
    {
        $this->availabilityService->deleteAvailability($id);

        return $this->responseDataService->getResponseData($date);
    }
}
