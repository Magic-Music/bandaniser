export class Create {
    constructor() {
        this.date = ''
        this.displayDate = ''
        this.eventType = ''
    }

    open(date) {
        this.hideForms()
        this.date = date
        this.displayDate = formatDate(date)
        elUpdate('modal-date', this.displayDate)
    }

    showForm(eventType) {
        this.hideForms()
        show('create_' + eventType)
        this.eventType = eventType
    }

    hideForms() {
        getByClass('create-event-form').forEach((eventForm) => {
            hide(eventForm.id)
        })
    }

    createGig() {
        $('#createModal').modal('hide')
    }

    createAvailability() {
        $('#createModal').modal('hide')
    }

    createRehearsal() {
        $('#createModal').modal('hide')
        console.log(this.getFormValues('rehearsal'))
    }

    getFormValues(formId) {
        let formData = new FormData(el('create_' + formId + '_form'))
        console.log(formData)
        return Object.fromEntries(formData.entries());
    }
}
