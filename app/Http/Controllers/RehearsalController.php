<?php

namespace App\Http\Controllers;

use App\Entities\RehearsalEntity;
use App\Services\RehearsalService;
use App\Services\ResponseDataService;
use Illuminate\Http\Request;

class RehearsalController extends Controller
{
    public function __construct(
        private RehearsalEntity $rehearsal,
        private RehearsalService $rehearsalService,
        private ResponseDataService $responseDataService,
    ) {}

    public function create(Request $request)
    {
        $this->rehearsal->set([
            'date' => $request->input('date'),
            'time' => $request->input('create_start'),
            'location' => $request->input('create_location'),
            'note' => $request->input('create_rehearsal_note'),
        ]);

        $this->rehearsalService->createRehearsal($this->rehearsal);

        return $this->responseDataService->getResponseData($this->rehearsal->date);
    }

    public function delete($id, $date)
    {
        $this->rehearsalService->deleteRehearsal($id);

        return $this->responseDataService->getResponseData($date);
    }
}
