<?php

namespace App\Http\Controllers;

use App\Entities\RehearsalEntity;
use App\Services\RehearsalService;
use Illuminate\Http\Request;

class RehearsalController extends Controller
{
    public function __construct(
        private RehearsalEntity $rehearsal,
        private RehearsalService $rehearsalService
    ) {}

    public function create(Request $request)
    {
        $this->rehearsal->set([
            'date' => $request->input('date'),
            'time' => $request->input('create_start'),
            'location' => $request->input('create_location'),
            'note' => $request->input('create_rehearsal_note'),
        ]);

        return $this->rehearsalService->createRehearsal($this->rehearsal);
    }

    public function delete($id, $date)
    {
        return $this->rehearsalService->deleteRehearsal($id, $date);
    }
}
