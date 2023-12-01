<div class="modal fade" id="availabilityModal" name="availabilityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update availability for- <span id="modal-member"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="update_availability" class="d-none py-2 create-event-form">
                    <form id="update_availability_form" onsubmit="event.preventDefault(); manageEvents.createAvailability(); return false;">
                        <div class="form-group">
                            <label for="update_availability_note">Note</label>
                            <input type="text" id="update_availability_note" name="update_availability_note" placeholder="[optional details]" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Add Availability</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
