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

        return $this->responseDataService->getRenderedCalendarAndEventData($this->rehearsal->date);
    }

    public function update(Request $request)
    {
        $this->rehearsal->set([
            'id' => $request->input('update_rehearsal_id'),
            'time' => $request->input('update_rehearsal_time'),
            'location' => $request->input('update_rehearsal_location'),
            'note' => $request->input('update_rehearsal_note'),
        ]);

        $this->rehearsalService->updateRehearsal($this->rehearsal);

        return $this->responseDataService->getRenderedCalendarAndEventData($request->input('date'));
    }

    public function delete($id, $date)
    {
        $this->rehearsalService->deleteRehearsal($id);

        return $this->responseDataService->getRenderedCalendarAndEventData($date);
    }
}
