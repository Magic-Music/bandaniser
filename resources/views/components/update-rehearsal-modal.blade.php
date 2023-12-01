<div class="modal fade" id="rehearsalModal" name="rehearsalModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-available">
                <h5 class="modal-title">Update rehearsal on <span id="modal-rehearsal-date"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_rehearsal_form" onsubmit="event.preventDefault(); manageEvents.updateRehearsal(); return false;">
                    <div class="form-group">
                        <label for="update_rehearsal_time">Time</label>
                        <input type="time" id="update_rehearsal_time" name="update_rehearsal_time" placeholder="[optional details]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update_rehearsal_location">Location</label>
                        <input type="text" id="update_rehearsal_location" name="update_rehearsal_location" placeholder="[optional details]" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update_rehearsal_note">Note</label>
                        <input type="text" id="update_rehearsal_note" name="update_rehearsal_note" placeholder="[optional details]" class="form-control">
                    </div>
                    <input type="hidden" id="update_rehearsal_id" name="update_rehearsal_id" value="">
                    <button type="submit" class="btn btn-sm btn-primary">Update Rehearsal</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
