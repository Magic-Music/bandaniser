export class Calendar {
    constructor() {
        this.calendarEvents = []
    }

    getCalendar(year, month) {
        axios.get(`/api/calendar/${year}/${month}`)
            .then(function (response) {
                elUpdate('calendar', response.data)
            })
    }

    storeEvents(year, month) {
        axios.get(`/api/events/${year}/${month}`)
            .then((response) => {
                this.calendarEvents = response.data
            })
    }

    getEvents(date){
        let events = {}
        events['gigs'] = (this.calendarEvents.gigs[date]) || []
        events['availability'] = (this.calendarEvents.availability[date]) || []
        events['rehearsals'] = (this.calendarEvents.rehearsals[date]) || []

        return events
    }
}
