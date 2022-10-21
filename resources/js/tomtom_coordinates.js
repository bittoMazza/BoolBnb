const address = document.getElementById("geoAddress");
const addresses = document.getElementById("addresses");
const lat = document.getElementById("latitudeHtml");
const lon = document.getElementById("longitudeHtml");
/* const inputFields = document.querySelectorAll("input:not(#upload, #lat, #lon)"); */
/* const photo = document.getElementById('upload'); */
// const URLpath = window.location.href;
let addressesResult = [];
let latValues = [];
let lonValues = [];
let addressIndex = 0;
let isTimeoutCompleted = false;
// l'address inserito non deve essere valido se metto cose a cazzo
// deve avere una lat e lon ! se vuoti non si submitmitta 
//  se lat e lon non sono valide non convalidare l'indirizzo e le cancelliamo ad ogni ricerca
// ad ogni keyup resetto lat o lon 
function searchAddress() {
    axios.get(`https://api.tomtom.com/search/2/search/${address.value}.json?key=Y3utdtjiBc6ObgcZs8bNzOGza3HV7trG&countrySet=IT&typeahead=true&limit=4`)
    .then(response => {
        addressesResult = response.data.results;
        let addressAutocomplete;
        addresses.innerHTML = "";
        addressesResult.forEach((result, index) => {
                addressAutocomplete = document.createElement("li");
                addressAutocomplete.classList.add("list-group-item", "list-group-item-action");
                addressAutocomplete.setAttribute('role','button');
                addressAutocomplete.value = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                addressAutocomplete.innerHTML = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                addressAutocomplete.addEventListener("click", function(){
                    setSuccess(address);
                    lat.value = addressesResult[index].position.lat;
                    lon.value = addressesResult[index].position.lon;
                    address.value = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                    address.innerHTML = result.address.freeformAddress + ", " + result.address.countrySubdivision;
                    addresses.innerHTML = "";
                })
                addresses.append(addressAutocomplete);
        })
        isTimeoutCompleted = true;
    })
    .catch((error) => console.log(error));
}
let search;
address.addEventListener("keyup", function(){
    lat.value = '';
    lon.value = '';
    setError(address);
    isTimeoutCompleted = false;
    clearTimeout(search);
    if(address.value.length != 0) {
        search = setTimeout(searchAddress,500);
    }
})
function setError(input){
    input.classList.remove('success');
    input.classList.add('error');
}
function setSuccess(input){
    input.classList.remove('error');
    input.classList.add('success');
}