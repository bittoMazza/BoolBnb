// Map integration 

//! Definisco ApiKey e Coordinate luogo

const ApiKey = '6qNAEpN1aWvsSHDysFdG1qoHsAhaUIQ0';

let Rome = [12.504404953745091, 41.89823194636421]

//! Settaggio mappa Tom Tom
const map = tt.map({
    key: ApiKey,
    container: 'map',
    center: Rome,
    zoom: 10
});


// //! Creazione elemento div del Popup con testo

const divPopup = document.createElement('div');
divPopup.innerHTML = `
<img style="width:40; height:20;" src="img/pop_up_logoBoobnb.png" alt="Roma">
<br>
<h4>Roma</h4>`;


// ! Nuova istanza del popup 
let popup = new tt.Popup({
    closeButton: false,
    offset: 70,
}).setDOMContent(divPopup);

// //! Creazione elemento div del Marker

const element = document.createElement('div');
element.id = 'marker';

// !Nuova istanza del Marker

let marker = new tt.Marker({ element: element }).setLngLat(Rome).setPopup(popup)
marker.addTo(map);


// Searchbox 

let options = {

    searchOptions: {

        key: '6qNAEpN1aWvsSHDysFdG1qoHsAhaUIQ0',

        language: 'it-IT',

        limit: 6

    },

    autocompleteOptions: {

        key: '6qNAEpN1aWvsSHDysFdG1qoHsAhaUIQ0',

        language: 'it-IT'

    }

};



let ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

let searchBoxHTML = ttSearchBox.getSearchBoxHTML();

document.body.append(searchBoxHTML);
