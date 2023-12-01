export class Calendar {
    constructor() {
        this.calendarEvents = {}
    }

    getCalendar(year, month) {
        axios.get(`/api/calendar/${year}/${month}`)
            .then((response) => {
                elUpdate('calendar', response.data.html)
                this.storeEventData(response.data.events)
                displayEvents.showEvents(0)
            })
    }

    storeEvents(year, month) {
        axios.get(`/api/events/${year}/${month}`)
            .then((response) => {
                this.calendarEvents = response.data
            })
    }

    storeEventData(data) {
        this.calendarEvents = data
    }

    getEvents(day) {
        let formattedDay = day < 10 ? `0${day}` : day
        let events = {}

        events['gigs'] = (this.calendarEvents.gigs ?? {})[formattedDay] || []
        events['availability'] = (this.calendarEvents.availability ?? {})[formattedDay] || []
        events['rehearsals'] = (this.calendarEvents.rehearsals ?? {})[formattedDay] || []

        return events
    }

    getAvailabilityById(id) {
        return this.getEventById(this.calendarEvents.availability ?? [], id)
    }

    getEventById(events, id) {
        let result = {}

        Object.values(events).filter(
            (event) => event.find(
                (e) => {
                    if(e.id == id) {
                        result = e
                    }
                }
            )
        )

        return result
    }
}
