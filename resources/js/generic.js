window.el = (id) => {
    return document.getElementById(id)
}

window.elUpdate = (id, content) => {
    return el(id).innerHTML = content
}

window.elValue = (id) => {
    return el(id).value
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
