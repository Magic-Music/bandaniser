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
            'venue_id' => $request->input('create_venue'),
            'agency_id' => $request->input('create_agency') ?: null,
            'date' => $request->input('date'),
            'price' => $request->input('create_price'),
            'confirmed' => $request->boolean('create_confirmed'),
            'arrival' => $request->input('create_arrival'),
            'note' => $request->input('create_gig_note'),
        ]);

        $this->gigService->createGig($this->gig);

        return $this->responseDataService->getResponseData($this->gig->date);
    }

    public function delete($id, $date)
    {
        $this->gigService->deleteGig($id);

        return $this->responseDataService->getResponseData($date);
    }
}
