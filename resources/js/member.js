export class Member {
    constructor() {
        this.memberId = 0
        this.memberName = ''
    }

    selectMember(id, name) {
        this.memberId = id
        this.memberName = name

        elUpdate('member_dropdown', name)
    }
}
