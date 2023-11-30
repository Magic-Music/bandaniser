<?php

namespace App\Http\Controllers;

use App\Models\Rehearsal;
use App\Services\DateAggregationService;
use App\Services\RehearsalService;
use Illuminate\Http\Request;

class RehearsalController extends Controller
{
    public function __construct(private RehearsalService $rehearsalService)
    {}

    public function create(Request $request)
    {
        return $this->rehearsalService
            ->createRehearsal(
                $request->input('date'),
                $request->input('create_start'),
                $request->input('create_location'),
                $request->input('create_rehearsal_note'),
            );
    }

    public function delete($id, $date)
    {
        return $this->rehearsalService->deleteRehearsal($id, $date);
    }
}
