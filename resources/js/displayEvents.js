export class DisplayEvents {
    showEvents(date) {
        let events = calendar.getEvents(date)
        let html = this.getGigs(events.gigs)
            + this.getRehearsals(events.rehearsals)
            + this.getAvailability(events.availability)

        elUpdate('events', html || 'Click on a day for event information...')

        getByClass('selected-day').forEach((element) => {
            removeClass(element.id, 'selected-day')
        })

        addClass("date_" + date, 'selected-day')
    }

    getGigs(gigs) {
        let html = ''

        gigs.forEach((gig) => {
            html += `<div class="card">
                        <div class="card-header d-flex ${gig.confirmed ? 'bg-gig' : 'bg-enquiry'}">
                            <div class="flex-grow-1">${gig.confirmed ? 'Gig' : 'Enquiry'} - ${gig.venue.name}</div>
                             <div class="btn-icon" data-toggle="modal" data-target="#gigModal" onclick="updateEvents.showUpdateGigModal(${gig}')">
                                 <img width=22px height=22px src="/images/pencil.svg">
                             </div>
                             <div class="btn-icon" onclick="manageEvents.deleteGig(${gig.id}, '${gig.date}')">
                                 <img width=28px height=28px src="/images/bin.svg">
                             </div>
                        </div>
                        <div class="card-body">
                            ${gig.venue.address}, ${gig.venue.town}, ${gig.venue.postcode}<br><br>
                            Fee: £${gig.price || 'unknown'}<br>
                            Arrival time: ${gig.arrival}<br>
                            ${gig.agency ? 'Agency: ' + gig.agency.name + '<br>': ''}
                            ${gig.note ? 'Notes: ' + gig.note : ''}
                        </div>
                    </div>`
        })

        return html
    }

    getRehearsals(rehearsals) {
        let html = ''

        rehearsals.forEach((rehearsal) => {
            html += `<div class="card">
                        <div class="card-header bg-rehearsal d-flex align-items-start">
                             <div class="flex-grow-1">Rehearsal - ${rehearsal.time}</div>
                             <div data-toggle="modal" data-target="#rehearsalModal" onclick="updateEvents.showUpdateRehearsalModal('${rehearsal}')">
                                 <img width=22px height=22px src="/images/pencil.svg">
                             </div>
                             <div class="btn-icon" onclick="manageEvents.deleteRehearsal(${rehearsal.id}, '${rehearsal.date}')">
                                 <img width=28px height=28px src="/images/bin.svg">
                             </div>
                        </div>
                        <div class="card-body">
                            Location: ${rehearsal.location}<br><br>
                            Note: ${rehearsal.note}<br>
                        </div>
                    </div>`
        })

        return html
    }

    getAvailability(availability) {
        let html =''

        if (availability.length > 0) {
            html += `<div class="card">
                        <div class="card-header bg-available">
                             Not Available
                        </div>
                        <div class="card-body">`

            availability.forEach((unavailable) => {
                html += `<div class="d-flex">
                            <div class="flex-grow-1">${unavailable.member.name}</div>
                             <div data-toggle="modal" data-target="#availabilityModal" class="btn-icon" onclick="updateEvents.showUpdateAvailabilityModal(${unavailable.id})">
                                 <img width=22px height=22px src="/images/pencil.svg">
                             </div>
                             <div class="btn-icon" onclick="manageEvents.deleteAvailability(${unavailable.id}, '${unavailable.date}')">
                                 <img width=28px height=28px src="/images/bin.svg">
                             </div>
                        </div>
                        ${unavailable.note ? '<i>(' + unavailable.note + ')</i><br><br>' : '<br>'}`
            })
            html += '</div></div>'
        }

        return html
    }
}
