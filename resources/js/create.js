export class Create {
    constructor() {
        this.date = ''
        this.displayDate = ''
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
    }

    hideForms() {
        getByClass('create-event-form').forEach((eventForm) => {
            hide(eventForm.id)
        })
    }
}
