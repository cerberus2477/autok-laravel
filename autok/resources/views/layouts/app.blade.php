<head>
    <!-- hmtl lang = app()->getlocalebol -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- kötelező, így nem annyira hekkelhető -->
</head>

<body>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>Készítette: Tábor Tünde</p>
        <p>Ez egy lábléc</p>
        <p>{{ config('app.name', 'Autok') }} v{{ config('app.version') }} (PHP v{{ PHP_VERSION }})</p>
    </footer>
</body>