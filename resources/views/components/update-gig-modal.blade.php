<div class="modal fade" id="gigModal" name="gigModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="modal-gig-header">
                <h5 class="modal-title">Update <span id="gig-status">gig</span> on <span id="modal-gig-date"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_gig_form" onsubmit="event.preventDefault(); manageEvents.updateGig(); return false;">
                    <div class="form-group">
                        <label for="update_gig_arrival">Arrival time</label>
                        <input type="time" id="update_gig_arrival" name="update_gig_arrival" placeholder="e.g. 19:00" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update_gig_price">Fee</label>
                        <input type="number" id="update_gig_price" name="update_gig_price" placeholder="e.g. 1000" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update_gig_note">Note</label>
                        <input type="text" id="update_gig_note" name="update_gig_note" placeholder="[optional details]" class="form-control">
                    </div>
                    <div class="form-group" id="gig_confirmed">
                        <label for="update_gig_confirmed">Confirmed?</label>
                        <input type="checkbox" id="update_gig_confirmed" name="update_gig_confirmed" class="form-control">
                    </div>
                    <input type="hidden" id="update_gig_id" name="update_gig_id" value="">
                    <button type="submit" class="btn btn-sm btn-primary">Update Gig</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
