<head>
    <!-- hmtl lang = app()->getlocalebol -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- kötelező, így nem annyira hekkelhető -->
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{route('fuels')}}">Üzemanyagok (fuels)</a></li>
            <li><a href="{{route('makers')}}">Gyártók (makers)</a></li>
            <li><a href="{{route('carModels')}}">carModels</a></li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>Készítette: Tábor Tünde</p>
        <p>{{ config('app.name', 'Autok') }} v{{ config('app.version') }} (PHP v{{ PHP_VERSION }})</p>
    </footer>
</body>