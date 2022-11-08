const API_KEY = '6qNAEpN1aWvsSHDysFdG1qoHsAhaUIQ0';


let map = tt.map({

    key: API_KEY,

    container: 'map-div',

    center: [14.0, 42.0],

    zoom: 5

});

// Apartment locator 

const apartments = {
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
        "geometry": {
            "type": "Point",
            "coordinates": [
                14.031702205442677,
                40.76199237334906
            ]
        },
        "properties": {
            "title": "Casa sul mare",
            "address": "Via Salita Castello 13, 80079 Procida, Italia",
            "city": "Procida NA"
        }
    },
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [
                    14.019365200587943,
                    40.7577703070356
                ]
            },
            "properties": {
                "title": "Corallo Residence",
                "address": "Via Vittorio Emanuele 284, 80079 Procida, Italia",
                "city": "Procida NA"
            }
        },
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [
                    14.530960987775696,
                    36.781475462893944
                ]
            },
            "properties": {
                "title": "IzzHome Bella Vista",
                "address": "Via Perugia 67, 97100 Marina di Ragusa, Italia",
                "city": "Ragusa SR"
            }
        },
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [
                    12.383846649136192,
                    44.21331410599949
                ]
            },
            "properties": {
                "title": "Villetta al mare",
                "address": "Viale Giuseppe Mazzini 182, 47042 Cesenatico, Emilia Romagna",
                "city": "Cesenatico FC"
            }
        },
        {
            "type": "Feature",
            "geometry": {
                "type": "Point",
                "coordinates": [
                    12.554644359866689,
                    44.047578422255526
                ]
            },
            "properties": {
                "title": "Appartamento vicino a Rimini",
                "address": "Via Cristoforo Fontemaggi, 4, 47923 Rimini RN",
                "city": "Rimini RN"
            }
        }
    ]
};

const markersCity = [];

apartments.features.forEach(function (apartment, index) {
    const title = apartment.properties.title;
    const city = apartment.properties.city;
    const address = apartment.properties.address;
    const location = apartment.geometry.coordinates;

    
    let markStyle = document.createElement('div');
    markStyle.id = 'marker';
    
    const marker = new tt.Marker({ element: markStyle }).setLngLat(location).addTo(map);
    
    
    let popupOffset = {
        top: [0, 0],
        bottom: [0, -70],
        'bottom-right': [0, -70],
        'bottom-left': [0, -70],
        left: [25, -35],
        right: [-25, -35]
    };
    
    let popup = new tt.Popup({ offset: popupOffset }).setHTML(`<h2> ${title} </h2><h4> ${address} </h4>`);
    
    marker.setPopup(popup);

    markersCity[index] = {
        marker,
        city
    };
});