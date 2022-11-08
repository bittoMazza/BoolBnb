<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BoolBnb</title>

    <!-- Scripts -->



    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/register_form_validation.js') }}" defer></script>
    <script src="{{ asset('js/tomtom_coordinates.js') }}" defer></script>
    <script src="{{ asset('js/apartment_form_validation.js') }}" defer></script>

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft   +2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

   



    {{-- <!-- Braintree CDN -->
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-braintree/dist/vue-braintree.umd.min.js"></script> --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- MapStyleCss --}}
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps.css'>

    {{-- MapScript --}}
    <script type='text/javascript' src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps-web.min.js">
    </script>
</head>

<body>
    <div id="app">
        @include('partials.header')
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>

    <script>
        const API_KEY = '6qNAEpN1aWvsSHDysFdG1qoHsAhaUIQ0';


        let map = tt.map({

            key: API_KEY,

            container: 'map-div',

            center: [14.0, 42.0],

            zoom: 5.5

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
                        "address": "Via Salita Castello 13, 80079 Procida, NA"
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
                        "address": "Via Vittorio Emanuele 284, 80079 Procida, NA"
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
                        "address": "Via Perugia 67, 97100 Marina di Ragusa, SR"
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
                        "address": "Viale Giuseppe Mazzini 182, 47042 Cesenatico, FC"
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
                        "address": "Via Cristoforo Fontemaggi, 4, 47923 Rimini, RN"
                    }
                }
            ]
        };

        const markersCity = [];

        apartments.features.forEach(function(apartment, index) {
            const title = apartment.properties.title;
            const address = apartment.properties.address;
            const location = apartment.geometry.coordinates;


            let markStyle = document.createElement('div');
            markStyle.id = 'marker';

            const marker = new tt.Marker({
                element: markStyle
            }).setLngLat(location).addTo(map);


            let popupOffset = {
                top: [0, 0],
                bottom: [0, -70],
                'bottom-right': [0, -70],
                'bottom-left': [0, -70],
                left: [25, -35],
                right: [-25, -35]
            };

            let popup = new tt.Popup({
                offset: popupOffset
            }).setHTML(`<h4> ${title} </h4><h6> ${address} </h6>`);

            marker.setPopup(popup);

            markersCity[index] = {
                marker,
               
            };
        });
    </script>


    {{-- <script src="{{ asset('js/map.js') }}"></script> --}}
</body>

</html>
