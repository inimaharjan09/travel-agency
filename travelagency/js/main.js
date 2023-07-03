const formInputs = [...document.querySelectorAll('.form-control input')];
// const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
// const confPassword = document.getElementById('conf-password');
const form = document.getElementById('form');
/*for label of inputs*/
formInputs.forEach((formInput) => {
    formInput.addEventListener('focusin', formInputFocusInHandler);
    formInput.addEventListener('focusout', formInputFocusOutHandler);
});

function formInputFocusInHandler() {
    const label = this.parentElement.querySelector('label');
    label.classList.add('active');
}

function formInputFocusOutHandler() {
    if (this.value === '') {
        const label = this.parentElement.querySelector('label');
        label.classList.remove('active');
    }
}

/*for form validation*/

form.addEventListener('login', (e) => {
    e.preventDefault();

    checkRequire([email, password]);
    checkEmail(email);
    checkLength(password, 8, 15);
    // checkMatch(password, confPassword);
});

function checkEmail(input) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1, 3}\.[0-9]{1, 3}\.[0-9]{1, 3}\.[0-9]{1, 3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim())) {
        showSuccess(input);
    } else {
        showError(input, 'Email not valid');
    }
}

function showError(input, message) {
    const parent = input.parentElement;
    const smallTag = parent.querySelector('small');
    if (parent.classList !== 'form-control error')
        parent.classList = 'form-control error';
    smallTag.innerText = message;
}

function showSuccess(input) {
    const parent = input.parentElement;
    const smallTag = parent.querySelector('small');
    if (parent.classList !== 'form-control success')
        parent.classList = 'form-control success';

}

function checkRequire(inputArray) {
    inputArray.forEach(function (input) {
        if (input.value.trim() === '') {
            const message =
                input.id.charAt(0).toUpperCase() + input.id.slice(1) + ' is require';
            showError(input, message);
        } else {
            showSuccess(input);
        }
    });
}

function checkMatch(firstInput, secondInput) {
    if (firstInput !== secondInput) {
        const message =
            secondInput.id.charAt(0).toUpperCase() +
            secondInput.id.slice(1) +
            ' not match';
        showError(secondInput, message);
    } else {
        showSuccess(secondInput);
    }
}

function checkLength(input, min, max) {
    if (input.value.length < min) {
        const message =
            input.id.charAt(0).toUpperCase() +
            input.id.slice(1) +
            ` length must be at least ${min} characters`;
        showError(input, message);
    } else if (input.value.length > max) {
        const message =
            input.id.charAt(0).toUpperCase() +
            input.id.slice(1) +
            ` length must be less than ${max} characters`;
        showError(input, message);
    } else {
        showSuccess(input);
    }
}