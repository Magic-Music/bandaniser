<?php

namespace App\Http\Controllers;

use App\Services\AvailabilityService;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function __construct(private AvailabilityService $availabilityService)
    {}

    public function create(Request $request)
    {
        return $this->availabilityService
            ->createAvailability(
                $request->input('date'),
                $request->input('member_id'),
                $request->input('create_length'),
                $request->input('create_availability_note'),
            );
    }

    public function delete($id, $date)
    {
        return $this->availabilityService->deleteAvailability($id, $date);
    }
}
