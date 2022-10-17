<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps.css' rel='stylesheet' type='text/css'>
    <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.20.0/maps/maps-web.min.js' defer></script>
    <link href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' rel='stylesheet'>
    <link href='style.css' rel='stylesheet' type='text/css' />

    <script src='https://code.jquery.com/jquery-1.12.4.js' defer></script>
    <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js' defer></script>

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/host') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://vapor.laravel.com">Vapor</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>

    <div class='control-panel'>
        <div class='heading'>
            <img src='img/Bool_bnb_logo.png'>
        </div>
        <div id='store-list'></div>
    </div>
    <div class='map' id='map'></div>

    <script>
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


        // // ! Nuova istanza del popup 
        let popup = new tt.Popup({
            closeButton: false,
            offset: 70,
        }).setDOMContent(divPopup);

        // //! Creazione elemento div del Marker

        const element = document.createElement('div');
        element.id = 'marker';

        // !Nuova istanza del Marker

        let marker = new tt.Marker({
            element: element
        }).setLngLat(Rome).setPopup(popup)
        marker.addTo(map);
    </script>
</body>

</html>
