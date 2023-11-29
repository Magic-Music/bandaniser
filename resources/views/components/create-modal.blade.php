<div class="modal fade" id="createModal" name="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new event - <span id="modal-date"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h6>Select event type</h6>
                <div class="btn-group d-flex" role="group" aria-label="Event type">
                    <button type="button" class="w-100 btn btn-gig" onclick="manageEvents.showForm('gig')">Gig</button>
                    <button type="button" class="w-100 btn btn-available" onclick="manageEvents.showForm('availability')">Availability</button>
                    <button type="button" class="w-100 btn btn-rehearsal" onclick="manageEvents.showForm('rehearsal')">Rehearsal</button>
                </div>

                <div id="create_gig" class="d-none py-2 create-event-form">
                    <form id="create_gig_form" onsubmit="event.preventDefault(); manageEvents.createGig(); return false;">
                        <div class="form-group">
                            <label for="create_venue">Venue</label>
                            <select id="create_venue" name="create_venue" class="form-control">
                                @foreach ($venues as $id=>$venue)
                                    <option value="{{ $id }}">{{ $venue }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create_agency">Agency</label>
                            <select id="create_agency" name= "create_agency" class="form-control">
                                <option value="0">No Agency</option>
                                @foreach ($agencies as $id=>$agency)
                                    <option value="{{ $id }}">{{ $agency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create_price">Price</label>
                            <input type="text" id="create_price" name="create_price" placeholder="e.g. 1000" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_arrival">Arrival Time</label>
                            <input type="time" id="create_arrival" name="create_arrival" placeholder="e.g. 19:00" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_gig_note">Note</label>
                            <input type="text" id="create_gig_note" name="create_gig_note" placeholder="[optional details]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_confirmed">Confirmed?</label>
                            <input type="checkbox" id="create_confirmed" name="create_confirmed" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Add Gig</button>
                    </form>
                </div>

                <div id="create_availability" class="d-none py-2 create-event-form">
                    <form id="create_availability_form" onsubmit="event.preventDefault(); manageEvents.createAvailability(); return false;">
                        <div class="form-group">
                            <label for="create_length">Not available for how many days?</label>
                            <input type="number" id="create_length" name="create_length" class="form-control" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="create_availability_note">Note</label>
                            <input type="text" id="create_availability_note" name="create_availability_note" placeholder="[optional details]" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Add Availability</button>
                    </form>
                </div>

                <div id="create_rehearsal" class="d-none py-2 create-event-form">
                    <form id="create_rehearsal_form" onsubmit="event.preventDefault(); manageEvents.createRehearsal(); return false;">
                        <div class="form-group">
                            <label for="create_start">Start Time</label>
                            <input type="time" id="create_start" name="create_start" placeholder="e.g. 19:00" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="create_location">Location</label>
                            <input type="text" id="create_location" name="create_location" placeholder="e.g. Adam's House" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="create_rehearsal_note">Note</label>
                            <input type="text" id="create_rehearsal_note" name="create_rehearsal_note" placeholder="[optional details]" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Create Rehearsal</button>
                    </form>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
