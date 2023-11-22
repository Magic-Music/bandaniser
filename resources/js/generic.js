window.el = (id) => {
    return document.getElementById(id)
}

window.elUpdate = (id, content) => {
    return el(id).innerHTML = content
}

window.elValue = (id) => {
    return el(id).value
}
