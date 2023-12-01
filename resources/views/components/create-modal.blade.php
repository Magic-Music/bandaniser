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
                    <form id="create-gig-form" onsubmit="event.preventDefault(); manageEvents.createGig(); return false;">
                        <div class="form-group">
                            <label for="create-venue">Venue</label>
                            <select id="create-venue" name="create-venue" class="form-control">
                                @foreach ($venues as $id=>$venue)
                                    <option value="{{ $id }}">{{ $venue }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create-agency">Agency</label>
                            <select id="create-agency" name= "create-agency" class="form-control">
                                <option value="0">No Agency</option>
                                @foreach ($agencies as $id=>$agency)
                                    <option value="{{ $id }}">{{ $agency }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create-price">Fee</label>
                            <input type="number" id="create-price" name="create-price" placeholder="e.g. 1000" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create-arrival">Arrival Time</label>
                            <input type="time" id="create-arrival" name="create-arrival" placeholder="e.g. 19:00" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create-gig-note">Note</label>
                            <input type="text" id="create-gig-note" name="create-gig-note" placeholder="[optional details]" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="create-confirmed">Confirmed?</label>
                            <input type="checkbox" id="create-confirmed" name="create-confirmed" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Add Gig</button>
                    </form>
                </div>

                <div id="create_availability" class="d-none py-2 create-event-form">
                    <form id="create-availability-form" onsubmit="event.preventDefault(); manageEvents.createAvailability(); return false;">
                        <div class="form-group">
                            <label for="member-id">Select Member</label>
                            <select class="form-control" id="member-id" name="member-id" required>
                                @foreach($members as $id=>$name)
                                    <option value="{{ $id }}" id="member-{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="create-length">Not available for how many days?</label>
                            <input type="number" id="create-length" name="create-length" class="form-control" value="1" required>
                        </div>
                        <div class="form-group">
                            <label for="create-availability-note">Note</label>
                            <input type="text" id="create-availability-note" name="create-availability-note" placeholder="[optional details]" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Add Availability</button>
                    </form>
                </div>

                <div id="create_rehearsal" class="d-none py-2 create-event-form">
                    <form id="create-rehearsal-form" onsubmit="event.preventDefault(); manageEvents.createRehearsal(); return false;">
                        <div class="form-group">
                            <label for="create-start">Start Time</label>
                            <input type="time" id="create-start" name="create-start" placeholder="e.g. 19:00" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="create-location">Location</label>
                            <input type="text" id="create-location" name="create-location" placeholder="e.g. Adam's House" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="create-rehearsal-note">Note</label>
                            <input type="text" id="create-rehearsal-note" name="create-rehearsal-note" placeholder="[optional details]" class="form-control">
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
