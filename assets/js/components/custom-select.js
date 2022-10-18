import Choices from 'choices.js';

const elements = document.querySelectorAll('.form-select');
if (elements) {
    elements.forEach((el) => {
        new Choices(el, {
            searchEnabled: false,
            searchChoices: false,
        })
    })
}

