export class UpdateEvents {
    showUpdateAvailabilityModal(id) {
        let details = calendar.getAvailabilityById(id)
        elUpdate('modal-member', details.member.name)
        elUpdateValue('update_availability_note', details.note)
        elUpdateValue('update_availability_id', id)
    }

    showUpdateRehearsalModal(id) {
        let details = calendar.getRehearsalById(id)
        console.log(id, details)
        elUpdate('modal-rehearsal-date', manageEvents.displayDate)
        elUpdateValue('update_rehearsal_time', details.time)
        elUpdateValue('update_rehearsal_location', details.location)
        elUpdateValue('update_rehearsal_note', details.note)
        elUpdateValue('update_rehearsal_id', id)
    }
}
