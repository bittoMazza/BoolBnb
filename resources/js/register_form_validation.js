const { set } = require("lodash");

const form = document.getElementById('form');
const username = document.getElementById('username');
const surname = document.getElementById('surname');
const email = document.getElementById('email');
const date_birth = document.getElementById('date_birth');
const password = document.getElementById('password');
const password_confirm = document.getElementById('password-confirm');

form.addEventListener('submit', e => {
    validateInputs();
    if(!validateInputs()) {
        e.preventDefault();
    }
    return true;  
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const surnameValue = surname.value.trim();
    const emailValue = email.value.trim();
    const dateBirth = date_birth.value;
    let parts = dateBirth.split("-");
    let year = parseInt(parts[0], 10);
    const passwordValue = password.value.trim();
    const password2Value = password_confirm.value.trim();

    if(usernameValue === '') {
        setError(username, 'Nome obbligatorio');
        return false;
    } else {
        setSuccess(username);
    }

    if(surnameValue === '') {
        setError(surname, 'Cognome obbligatorio');
        return false;
    } else {
        setSuccess(surname);
    }

    if(emailValue === '') {
        setError(email, 'Email obbligatoria');
        return false;
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Inserire un\'email valida');
        return false;
    } else {
        setSuccess(email);
    }

    var now = new Date();
    //Validate birth date some time before today's date and
    //within 120 years
    if(dateBirth == null || (now.getFullYear() - year > 120) || (now.getFullYear() - year < 18) ){
        setError(date_birth, 'Data non valida');
        return false;
    } else{
        setSuccess(date_birth);
    } 

    if(passwordValue === '') {
        setError(password, 'Password obbligatoria');
        return false;
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password deve avere minimo 8 caratteri.')
        return false;
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password_confirm, 'Perfavore conferma la tua password');
        return false;
    } else if (password2Value !== passwordValue) {
        setError(password_confirm, "Le password devono essere uguali");
        return false;
    } else {
        setSuccess(password_confirm);
    }
    return true;
};