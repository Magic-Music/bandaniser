export class UpdateEvents {
    showUpdateAvailabilityModal(id) {
        let details = calendar.getAvailabilityById(id)
        elUpdate('modal-member', details.member.name)
        elUpdateValue('update_availability_note', details.note)
        elUpdateValue('update_availability_id', id)
    }
}
