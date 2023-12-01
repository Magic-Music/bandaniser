<?php

namespace App\Http\Controllers;

use App\Entities\GigEntity;
use App\Services\GigService;
use App\Services\ResponseDataService;
use Illuminate\Http\Request;

class GigController extends Controller
{
    public function __construct(
        private GigEntity $gig,
        private GigService $gigService,
        private ResponseDataService $responseDataService,
    ) {}

    public function create(Request $request)
    {
        $this->gig->set([
            'venue_id' => $request->input('create-venue'),
            'agency_id' => $request->input('create-agency') ?: null,
            'date' => $request->input('date'),
            'price' => $request->input('create-price'),
            'confirmed' => $request->boolean('create-confirmed'),
            'arrival' => $request->input('create-arrival'),
            'note' => $request->input('create-gig-note'),
        ]);

        $this->gigService->createGig($this->gig);

        return $this->responseDataService->getRenderedCalendarAndEventData($this->gig->date);
    }

    public function update(Request $request)
    {
        $this->gig->set([
            'id' => $request->input('update-gig-id'),
            'price' => $request->input('update-gig-price'),
            'confirmed' => $request->boolean('update-gig-confirmed'),
            'arrival' => $request->input('update-gig-arrival'),
            'note' => $request->input('update-gig-note'),
        ]);

        $this->gigService->updateGig($this->gig);

        return $this->responseDataService->getRenderedCalendarAndEventData($request->input('date'));
    }

    public function delete($id, $date)
    {
        $this->gigService->deleteGig($id);

        return $this->responseDataService->getRenderedCalendarAndEventData($date);
    }
}
