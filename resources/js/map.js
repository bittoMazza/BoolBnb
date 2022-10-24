
// Possible solution to add links and scripts like HEAD HTML 

// let mapScriptCss= document.createElement('link');
// mapScriptCss.src = "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps.css";
// document.head.appendChild(mapScriptCss);

// let mapScriptJS = document.createElement('script');
// mapScriptJS.src = "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps-web.min.js";
// document.head.appendChild(mapScriptJS);

// let searchBoxCss = document.createElement('link');
// searchBoxCss.src = "https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css";
// document.head.appendChild(searchBoxCss);

// let searchBox = document.createElement('script');
// searchBox.src = "https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js";
// document.head.appendChild(searchBox);

// let servicesBox = document.createElement('script');
// servicesBox.src = "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/services/services-web.min.js";
// document.head.appendChild(servicesBox);


// Map integration 


const apartment1 = {
    "title": "Casa sul Mare",
    "address": "Via Salita Castello 13, 80079 Procida, Italia",
    "location": "Procida",
    "coordinates": [14.031702205442677, 40.76199237334906],
};

const apartment2 = {
    "title": "Corallo Residence",
    "address": "Via Vittorio Emanuele 284, 80079 Procida, Italia",
    "location": "Procida",
    "coordinates": [14.019365200587943, 40.7577703070356],
};

const apartment3 = {
    "title": "IzzHome Bella Vista",
    "address": "Via Perugia, 97100 Marina di Ragusa, Italia",
    "location": "Ragusa",
    "coordinates": [14.530960987775696, 36.781475462893944],
};



const API_KEY = '6qNAEpN1aWvsSHDysFdG1qoHsAhaUIQ0';


let map = tt.map({

    key: API_KEY,

    container: 'map-div',

    center: [14.0, 42.0],

    zoom: 5

});

let options = {

    searchOptions: {

        key: API_KEY,

        language: 'it-IT',

        limit: 6

    },

    autocompleteOptions: {

        key: API_KEY,

        language: 'it-IT'

    }

};





let ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

let searchMarkersManager = new SearchMarkersManager(map);

ttSearchBox.on('tomtom.searchbox.resultsfound', handleResultsFound);

ttSearchBox.on('tomtom.searchbox.resultselected', handleResultSelection);

ttSearchBox.on('tomtom.searchbox.resultfocused', handleResultSelection);

ttSearchBox.on('tomtom.searchbox.resultscleared', handleResultClearing);

map.addControl(ttSearchBox, 'top-left');


function handleResultsFound(event) {
    let results = event.data.results.fuzzySearch.results;

    if (results.length === 0) {
        searchMarkersManager.clear();
    }
    searchMarkersManager.draw(results);
    fitToViewport(results);
}

function handleResultSelection(event) {
    let result = event.data.result;
    if (result.type === 'category' || result.type === 'brand') {
        return;
    }
    searchMarkersManager.draw([result]);
    fitToViewport(result);
}

function fitToViewport(markerData) {
    if (!markerData || markerData instanceof Array && !markerData.length) {
        return;
    }
    let bounds = new tt.LngLatBounds();
    if (markerData instanceof Array) {
        markerData.forEach(function (marker) {
            bounds.extend(getBounds(marker));
        });
    } else {
        bounds.extend(getBounds(markerData));
    }
    map.fitBounds(bounds, { padding: 100, linear: true });
}

function getBounds(data) {
    let btmRight;
    let topLeft;
    if (data.viewport) {
        btmRight = [data.viewport.btmRightPoint.lng, data.viewport.btmRightPoint.lat];
        topLeft = [data.viewport.topLeftPoint.lng, data.viewport.topLeftPoint.lat];
    }
    return [btmRight, topLeft];
}

function handleResultClearing() {
    searchMarkersManager.clear();
}

function SearchMarkersManager(map, options) {
    this.map = map;
    this._options = options || {};
    this._poiList = undefined;
    this.markers = {};
}

SearchMarkersManager.prototype.draw = function (poiList) {
    this._poiList = poiList;
    this.clear();
    this._poiList.forEach(function (poi) {
        let markerId = poi.id;
        let poiOpts = {
            name: poi.poi ? poi.poi.name : undefined,
            address: poi.address ? poi.address.freeformAddress : '',
            distance: poi.dist,
            classification: poi.poi ? poi.poi.classifications[0].code : undefined,
            position: poi.position,
            entryPoints: poi.entryPoints
        };
        let marker = new SearchMarker(poiOpts, this._options);
        marker.addTo(this.map);
        this.markers[markerId] = marker;
    }, this);
};

SearchMarkersManager.prototype.clear = function () {
    for (let markerId in this.markers) {
        let marker = this.markers[markerId];
        marker.remove();
    }
    this.markers = {};
    this._lastClickedMarker = null;
};


function SearchMarker(poiData, options) {
    this.poiData = poiData;
    this.options = options || {};
    this.marker = new tt.Marker({
        element: this.createMarker(),
        anchor: 'bottom'
    });
    let lon = this.poiData.position.lng || this.poiData.position.lon;
    this.marker.setLngLat([
        lon,
        this.poiData.position.lat
    ]);
}

SearchMarker.prototype.addTo = function (map) {
    this.marker.addTo(map);
    this._map = map;
    return this;
};

SearchMarker.prototype.createMarker = function () {
    let elem = document.createElement('div');
    elem.className = 'tt-icon-marker-black tt-search-marker';
    if (this.options.markerClassName) {
        elem.className += ' ' + this.options.markerClassName;
    }
    let innerElem = document.createElement('div');
    innerElem.setAttribute('style', 'background: white; width: 20px; height: 20px; border-radius: 50%; border: 5px solid blue;');

    elem.appendChild(innerElem);
    return elem;
};

SearchMarker.prototype.remove = function () {
    this.marker.remove();
    this._map = null;
};



map.on('load', () => {
// Apartment-1 

let markStyle = document.createElement('div');
markStyle.id = 'marker';

let marker1 = new tt.Marker({ element: markStyle }).setLngLat(apartment1.coordinates).addTo(map);


let popupOffset1 = {
    top: [0, 0],
    bottom: [0, -70],
    'bottom-right': [0, -70],
    'bottom-left': [0, -70],
    left: [25, -35],
    right: [-25, -35]
};

let popup1 = new tt.Popup({ offset: popupOffset1 }).setHTML('<h2>' + apartment1.title + '</h2><h4>' + apartment1.address + '</h4>');

marker1.setPopup(popup1);




// Apartment-2

markStyle = document.createElement('div');
markStyle.id = 'marker';

let marker2 = new tt.Marker({ element: markStyle }).setLngLat(apartment2.coordinates).addTo(map);

let popupOffset2 = {
    top: [0, 0],
    bottom: [0, -70],
    'bottom-right': [0, -70],
    'bottom-left': [0, -70],
    left: [25, -35],
    right: [-25, -35]
};

let popup2 = new tt.Popup({ offset: popupOffset2 }).setHTML('<h2>' + apartment2.title + '</h2><h4>' + apartment2.address + '</h4>');

marker2.setPopup(popup2);



// Apartment-3

markStyle = document.createElement('div');
markStyle.id = 'marker';

let marker3 = new tt.Marker({ element: markStyle }).setLngLat(apartment3.coordinates).addTo(map);

let popupOffset3 = {
    top: [0, 0],
    bottom: [0, -60],
    'bottom-right': [0, -70],
    'bottom-left': [0, -70],
    left: [25, -35],
    right: [-25, -35]
};

let popup3 = new tt.Popup({ offset: popupOffset3 }).setHTML('<h2>' + apartment3.title + '</h2><h4>' + apartment3.address + '</h4>');

marker3.setPopup(popup3);

})
