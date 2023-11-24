export class Events {
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
                        <div class="card-header ${gig.confirmed ? 'bg-gig' : 'bg-enquiry'}">
                            ${gig.confirmed ? 'Gig' : 'Enquiry'} - ${gig.venue.name}
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
                        <div class="card-header bg-rehearsal">
                             Rehearsal - ${rehearsal.time}
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

            availability.forEach((person) => {
                html += `${person.member.name}<br>
                         ${person.note ? '<i>(' + person.note + ')</i><br><br>' : ''}`
            })
            html += '</div></div>'
        }

        return html
    }
}
