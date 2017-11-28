<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title', 'Admin')
    </title>
    <link rel = "stylesheet" href = "http://www.dukesnuz.com/css_libs/dukes_normalize.css"/>
    <link rel = "stylesheet" href = "/css/main.css?t=<?php echo rand(); ?>"/>

    <script type="text/javascript" src = "http://www.dukesnuz.com/js_libs/dukes.javascript.js"></script>
    @stack('head')
</head>
<body>
    <header>
        <h1>Admin area</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Admin Home</a></li>
            <li><a href="/dispatchers/">Dispatcher Home</a></li>
            <li><a href="/dispatcher/offices/">Show dispatch Offices</a></li>
            <li><a href="/dispatcher/contact/create/">Add a dispatcher and office</a></li>
        </ul>
    </nav>

    <section class='content'>
        <div class='sessionMessage'>
            <p>{{ session('sessionMessage') }}</p>
        </div>
        @yield('content')
        @stack('body')
    </section>
</body>
</html>
