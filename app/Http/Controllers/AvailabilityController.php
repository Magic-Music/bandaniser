<?php

namespace App\Http\Controllers;

use App\Entities\AvailabilityEntity;
use App\Services\AvailabilityService;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __construct(
        private AvailabilityEntity $availability,
        private AvailabilityService $availabilityService
    ) {}

    public function create(Request $request)
    {
        $this->availability->set([
            'date' => $request->input('date'),
            'memberId' => $request->input('member_id'),
            'length' => $request->input('create_length'),
            'note' => $request->input('create_availability_note'),
        ]);

        return $this->availabilityService->createAvailability($this->availability);
    }

    public function delete($id, $date)
    {
        return $this->availabilityService->deleteAvailability($id, $date);
    }
}
