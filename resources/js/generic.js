window.el = (id) => {
    return document.getElementById(id)
}

window.elUpdate = (id, content) => {
    return el(id).innerHTML = content
}

window.elValue = (id) => {
    return el(id).value
}

window.elUpdateValue = (id, value) => {
    el(id).value = value
}

window.getByClass = (className) => {
    return document.querySelectorAll('.' + className)
}

window.addClass = (element, className) => {
    el(element)?.classList?.add(className)
}

window.removeClass = (element, className) => {
    el(element).classList.remove(className)
}

window.show = (element) => {
    removeClass(element, "d-none")
}

window.hide = (element) => {
    addClass(element, "d-none")
}

window.check = (element) => {
    el(element).checked = true
}

window.uncheck = (element) => {
    el(element).checked = false
}
