const form = document.getElementById('form_apartment');
const title = document.getElementById('title');
const rooms = document.getElementById('rooms');
const beds = document.getElementById('beds');
const bathrooms = document.getElementById('bathrooms');
const square_meters = document.getElementById('square_meters');
const file = document.getElementById('file');
let el = document.getElementsByClassName("check_require");
let elParent = document.getElementById('checkbox-container');
 //at least one cb is checked

form.addEventListener('submit', e => {
    if(!validateInputs()) {
        console.log('sei nel prevent')
        e.preventDefault();
    } 
    else{
        return true;
    } 
});



// messaggi d'errore e di successo
const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error_message');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error_message');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};
// messaggi d'errore e di successo

// validazioni lato client

const validateInputs = () => {
    const titleValue = title.value.trim();
    const roomsValue = rooms.value.trim();
    const bedsValue = beds.value.trim();
    const bathroomsValue = bathrooms.value;
    const squareMetersValue = square_meters.value.trim();
    const fileValue = file.files.length;
    const URLpath = window.location.href;
    let atLeastOneChecked = false;

    // validazioni titolo
    if(titleValue === '') {

        setError(title, 'Titolo obbligatorio');

    } else if (titleValue.length < 5) {

        setError(title, 'il titolo deve essere lungo almeno cinque caratteri');

    } else {

        setSuccess(title);
    }
    // validazioni titolo

    // validazioni camere
    if(roomsValue === '') {

        setError(rooms, 'numero di stanze obbligatorio');

    } else if (roomsValue <= 0 || roomsValue >= 20) {
        
        setError(rooms, 'l appartamento deve avere un numero di stanze tra 1 e 20');

    } else {

        setSuccess(rooms);
    }
    // validazioni camere


    for (i = 0; i < el.length; i++) {
      if (el[i].checked === true) {
        atLeastOneChecked = true;
      }
    }
    if(atLeastOneChecked){
        console.log('success');
        elParent.classList.remove('error');
        elParent.classList.add('success');
    }
    else{
        console.log('error');
        elParent.classList.remove('success');
        elParent.classList.add('error');
        const errorDisplay = elParent.querySelector('.error_message');
        errorDisplay.innerText = 'Seleziona almeno un servizio';
    }

    // validazioni letti
    if(bedsValue === '') {

        setError(beds, 'deve esserci almeno un letto');

    } else if (bedsValue <= 0 || bedsValue >= 20) {
        
        setError(beds, 'l appartamento deve avere un numero di letti tra 1 e 20');

    } else {
        setSuccess(beds);
    }
    // validazioni letti

    // validazione bagni
    if(bathroomsValue === '') {

        setError(bathrooms, 'deve esserci almeno un bagno');

    } else if (bathroomsValue <= 0 || bathroomsValue >= 10) {
        
        setError(bathrooms, 'l appartamento deve avere un numero di bagni tra 1 e 10');

    } else {
        setSuccess(bathrooms);
    }
    // validazione bagni

    // validazione metri quadrati 
    if(squareMetersValue === '') {

        setError(square_meters, 'deve avere una dimensione');

    } else if (squareMetersValue <= 0 || squareMetersValue >= 500) {
        
        setError(square_meters, 'l appartamento deve essere grande tra 1mq e 500mq');

    } else {
        setSuccess(square_meters);
    }
    // validazione metri quadrati 

    if(!URLpath.includes('edit')){
        if(fileValue === 0){
            setError(file, 'inserisci un immagine');
        }else{
            setSuccess(file);
        }
    }

    const errorDisplay = document.getElementsByClassName('input-control error');
    console.log(errorDisplay);
    if(errorDisplay.length > 0){
        return false;
    }
    else{
        return true;
    }
}