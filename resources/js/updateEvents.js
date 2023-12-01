export class UpdateEvents {
    showUpdateAvailabilityModal(id) {
        let details = calendar.getAvailabilityById(id)
        elUpdate('modal-member', details.member.name)
        elUpdateValue('update_availability_note', details.note)
        elUpdateValue('update_availability_id', id)
    }

    showUpdateRehearsalModal(id) {
        let details = calendar.getRehearsalById(id)
        elUpdate('modal-rehearsal-date', manageEvents.displayDate)
        elUpdateValue('update_rehearsal_time', details.time)
        elUpdateValue('update_rehearsal_location', details.location)
        elUpdateValue('update_rehearsal_note', details.note)
        elUpdateValue('update_rehearsal_id', id)
    }

    showUpdateGigModal(id) {
        let details = calendar.getGigById(id)
        elUpdate('modal-gig-date', manageEvents.displayDate)
        elUpdateValue('update_gig_arrival', details.arrival)
        elUpdateValue('update_gig_price', details.price)
        elUpdateValue('update_gig_note', details.note)
        elUpdateValue('update_gig_id', id)

        if (details.confirmed) {
            hide('gig_confirmed')
            addClass('modal-gig-header', 'bg-gig')
            removeClass('modal-gig-header', 'bg-enquiry')
            elUpdate('gig-status', 'gig')
        } else {
            uncheck('update_gig_confirmed')
            removeClass('modal-gig-header', 'bg-gig')
            addClass('modal-gig-header', 'bg-enquiry')
            elUpdate('gig-status', 'provisional booking')
            show('gig_confirmed')
        }
    }
}
