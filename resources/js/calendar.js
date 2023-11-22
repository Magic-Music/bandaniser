export class Calendar
{
    getCalendar(year, month) {
        axios.get(`/api/calendar/${year}/${month}`)
            .then(function (response) {
                elUpdate('calendar', response.data)
                console.log(response)
            })
    }
}
