const elems = document.querySelectorAll('.elem')
const next = document.querySelector('.next')
const prev = document.querySelector('.prev')
const showresult = document.querySelector('.showresult')
const warning = document.querySelector('.warning')

let count = 0

function validate() {
    let valid = false

    elems[count].querySelectorAll('input').forEach(function check(element) {
        if (element.checked) valid = true
    })

    return valid
}

function nextElem() {
    warning.classList.add('hidden')

    count++

    if (count < elems.length) {
        if(count === elems.length - 1) next.innerHTML = 'show the result'

        elems[count - 1].classList.remove('visible')
        elems[count].classList.add('visible')
    }

    if (count === elems.length) showresult.click()

    if (count > 0) {
        prev.classList.remove('hidden')
    }
}

function prevElem() {
    if(count === elems.length - 1) next.innerHTML = 'next question'

    elems[count].classList.remove('visible')
    elems[count - 1].classList.add('visible')

    next.classList.add('visible')
    next.classList.remove('hidden')

    count--

    if (count === 0) {
        prev.classList.remove('visible')
        prev.classList.add('hidden')
    }
}

next.addEventListener('click', () => {
    validate() ? nextElem() : warning.classList.remove('hidden')
})

prev.addEventListener('click', () => {
    prevElem()
})
