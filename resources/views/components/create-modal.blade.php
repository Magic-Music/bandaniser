<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
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
                    <button type="button" class="w-100 btn btn-gig" onclick="create.showForm('gig')">Gig</button>
                    <button type="button" class="w-100 btn btn-available" onclick="create.showForm('availability')">Availability</button>
                    <button type="button" class="w-100 btn btn-rehearsal" onclick="create.showForm('rehearsal')">Rehearsal</button>
                </div>

                <div id="create_gig" class="d-none py-2 create-event-form">
                    <form>
                        <div class="form-group">
                            <label for="create_venue">Venue</label>
                            <select id="create_venue" class="form-control">
                                <option>Arden</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create_agency">Agency</label>
                            <select id="create_agency" class="form-control">
                                <option>Agency</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create_price">Agency</label>
                            <input type="text" id="create_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_price">Price</label>
                            <input type="text" id="create_price" placeholder="e.g. 1000" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_arrival">Arrival Time</label>
                            <input type="time" id="create_arrival" placeholder="e.g. 19:00" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_gig_note">Note</label>
                            <input type="text" id="create_gig_note" placeholder="[optional details]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_confirmed">Confirmed?</label>
                            <input type="checkbox" id="create_confirmed" class="form-control">
                        </div>
                    </form>
                </div>

                <div id="create_availability" class="d-none py-2 create-event-form">
                    <form>
                        <div class="form-group">
                            <label for="create_length">Not available for how many days?</label>
                            <input type="number" id="create_length" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_availability">Note</label>
                            <input type="text" id="create_availability)note" placeholder="[optional details]" class="form-control">
                        </div>
                    </form>
                </div>

                <div id="create_rehearsal" class="d-none py-2 create-event-form">
                    <form>
                        <div class="form-group">
                            <label for="create_start">Start Time</label>
                            <input type="time" id="create_arrival" placeholder="e.g. 19:00" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_location">Location</label>
                            <input type="text" id="create_location" placeholder="e.g. Adam's House" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create_rehearsal_note">Note</label>
                            <input type="text" id="create_rehearsal_note" placeholder="[optional details]" class="form-control">
                        </div>
                    </form>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-primary">Create Event</button>
            </div>
        </div>
    </div>
</div>
