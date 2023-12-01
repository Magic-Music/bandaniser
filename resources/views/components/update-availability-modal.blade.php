<div class="modal fade" id="availabilityModal" name="availabilityModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-available">
                <h5 class="modal-title">Update availability for- <span id="modal-member"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form id="update-availability-form" onsubmit="event.preventDefault(); manageEvents.updateAvailability(); return false;">
                        <div class="form-group">
                            <label for="update-availability-note">Note</label>
                            <input type="text" id="update-availability-note" name="update-availability-note" placeholder="[optional details]" class="form-control">
                        </div>
                        <input type="hidden" id="update-availability-id" name="update-availability-id" value="">
                        <button type="submit" class="btn btn-sm btn-primary">Update Availability</button>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
