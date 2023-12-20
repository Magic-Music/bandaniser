export class ManageEvents {
    constructor() {
        this.date = ''
        this.displayDate = ''
    }

    setDate(date) {
        this.date = date
        this.displayDate = this.formatDate(date)
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

        axios.post(`/api/gig/create`, this.getFormValues('create-gig-form'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    updateGig() {
        $('#gigModal').modal('hide')

        axios.patch(`/api/gig/update`, this.getFormValues('update-gig-form'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    deleteGig(id, date) {
        this.date = date

        axios.delete(`/api/gig/delete/${id}/${date}`)
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    createAvailability() {
        $('#createModal').modal('hide')

        axios.post(`/api/availability/create`, this.getFormValues('create-availability-form'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    updateAvailability() {
        $('#availabilityModal').modal('hide')

        axios.patch(`/api/availability/update`, this.getFormValues('update-availability-form'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    deleteAvailability(id, date) {
        this.date = date

        axios.delete(`/api/availability/delete/${id}/${date}`)
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    createRehearsal() {
        $('#createModal').modal('hide')

        axios.post(`/api/rehearsal/create`, this.getFormValues('create-rehearsal-form'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    updateRehearsal() {
        $('#rehearsalModal').modal('hide')

        axios.patch(`/api/rehearsal/update`, this.getFormValues('update-rehearsal-form'))
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    deleteRehearsal(id, date) {
        this.date = date

        axios.delete(`/api/rehearsal/delete/${id}/${date}`)
            .then((response) => {
                this.updateCalendar(response.data)
            })
    }

    getFormValues(formId) {
        let formData = new FormData(el(formId))
        let formObject = Object.fromEntries(formData.entries());
        formObject['date'] = this.date

        return formObject
    }

    updateCalendar(data) {
        elUpdate('calendar', data.html)
        calendar.storeEventData(data.events)
        displayEvents.showEvents(this.getDayFromDate(this.date))
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
