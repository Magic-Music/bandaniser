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
            'memberId' => $request->input('member-id'),
            'length' => $request->input('create-length'),
            'note' => $request->input('create-availability-note'),
        ]);

        $this->availabilityService->createAvailability($this->availability);

        return $this->responseDataService->getRenderedCalendarAndEventData($this->availability->date);
    }

    public function update(Request $request)
    {
        $this->availabilityService->updateAvailability(
            $request->input('update-availability-id'),
            $request->input('update-availability-note') ?? ''
        );

        return $this->responseDataService->getRenderedCalendarAndEventData($request->input('date'));
    }

    public function delete($id, $date)
    {
        $this->availabilityService->deleteAvailability($id);

        return $this->responseDataService->getRenderedCalendarAndEventData($date);
    }
}
