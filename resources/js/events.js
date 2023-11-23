export class Events {
    showEvents(date) {
        let events = calendar.getEvents(date)

        let html = ''

        events.gigs.forEach((gig) => {
            html += `<div class="card">
                        <div class="card-header ${gig.confirmed ? 'bg-gig' : 'bg-enquiry'}">
                            ${gig.confirmed ? 'Gig' : 'Enquiry'} - ${gig.venue.name}
                        </div>
                        <div class="card-body">
                            ${gig.venue.address}, ${gig.venue.town}, ${gig.venue.postcode}<br><br>
                            Fee: £${gig.price || 'unknown'}<br>
                            Arrival time: ${gig.arrival}<br>
                            Soundcheck by time: ${gig.soundcheck_finish}<br>
                            Number of sets: ${gig.sets}<br>
                            Set times: ${gig.set_times}<br>
                            ${gig.agency ? 'Agency: ' + gig.agency.name + '<br>': ''}
                            Notes: ${gig.note}
                        </div>
                    </div>`
        })

        events.rehearsals.forEach((rehearsal) => {
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

        if (events.availability.length > 0) {
            html += `<div class="card">
                        <div class="card-header bg-available">
                             Not Available
                        </div>
                        <div class="card-body">`

            events.availability.forEach((person) => {
                html += `${person.member.name}<br>
                         ${person.note ? '<i>(' + person.note + ')</i><br><br>': ''}`
            })
            html += '</div></div>'
        }

        elUpdate('events', html || 'Click on a day for event information...')
    }
}
