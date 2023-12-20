export class UpdateEvents {
    showUpdateAvailabilityModal(id) {
        let details = calendar.getAvailabilityById(id)
        elUpdate('modal-member', details.member.name)
        elUpdateValue('update-availability-note', details.note)
        elUpdateValue('update-availability-id', id)
    }

    showUpdateRehearsalModal(id) {
        let details = calendar.getRehearsalById(id)
        elUpdate('modal-rehearsal-date', manageEvents.displayDate)
        elUpdateValue('update-rehearsal-time', details.time)
        elUpdateValue('update-rehearsal-location', details.location)
        elUpdateValue('update-rehearsal-note', details.note)
        elUpdateValue('update-rehearsal-id', id)
    }

    showUpdateGigModal(id) {
        let details = calendar.getGigById(id)
        elUpdate('modal-gig-date', manageEvents.displayDate)
        elUpdateValue('update-gig-arrival', details.arrival)
        elUpdateValue('update-gig-price', details.price)
        elUpdateValue('update-gig-note', details.note)
        elUpdateValue('update-gig-id', id)

        if (details.confirmed) {
            hide('gig-confirmed')
            check('update-gig-confirmed')
            addClass('modal-gig-header', 'bg-gig')
            removeClass('modal-gig-header', 'bg-enquiry')
            elUpdate('gig-status', 'gig')
        } else {
            removeClass('modal-gig-header', 'bg-gig')
            addClass('modal-gig-header', 'bg-enquiry')
            elUpdate('gig-status', 'provisional booking')
            show('gig-confirmed')
        }
    }
}
