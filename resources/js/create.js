export class Create {
    constructor() {
        this.date = ''
        this.displayDate = ''
    }

    open(date) {
        this.hideForms()
        this.date = date
        this.displayDate = this.formatDate(date)
        elUpdate('modal-date', this.displayDate)
    }

    showForm(eventType) {
        this.hideForms()
        show('create_' + eventType)
    }

    hideForms() {
        getByClass('create-event-form').forEach((eventForm) => {
            hide(eventForm.id)
        })
    }

    createGig() {
        $('#createModal').modal('hide')

        axios.post(`/api/gig/create`, this.getFormValues('gig'))
            .then((response) => {
                this.updateCalendar(response)
            })
    }

    createAvailability() {
        $('#createModal').modal('hide')

        axios.post(`/api/availability/create`, this.getFormValues('availability'))
            .then((response) => {
                this.updateCalendar(response)
            })
    }

    createRehearsal() {
        $('#createModal').modal('hide')

        axios.post(`/api/rehearsal/create`, this.getFormValues('rehearsal'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    getFormValues(formId) {
        let formData = new FormData(el('create_' + formId + '_form'))
        let formObject = Object.fromEntries(formData.entries());
        formObject['date'] = this.date

        return formObject
    }

    updateCalendar(data) {
        elUpdate('calendar', data.html)
        calendar.storeEventData(data.events)
        events.showEvents(this.getDayFromDate(this.date))
    }

    formatDate(date) {
        var datePart = date.match(/\d+/g),
            year = datePart[0].substring(2),
            month = datePart[1], day = datePart[2];

        return day+'/'+month+'/'+year;
    }

    getDayFromDate(date) {
        return date.match(/\d+/g)[2]
    }
}
