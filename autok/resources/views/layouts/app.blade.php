<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- hmtl lang = app()->getlocalebol -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- kötelező, így nem annyira hekkelhető -->
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/editable-eredeti.js"></script>
</head>

<body>
    @include('nav')
    <main>
        @yield('content')
    </main>

    @include('footer')
</body>

</html>