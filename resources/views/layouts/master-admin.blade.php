<!doctype html>
<html lang='{{ app()->getLocale() }}'>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>
        @yield('title', 'Admin')
    </title>
    <link rel='stylesheet' href='http://www.dukesnuz.com/css_libs/dukes_normalize.css'>
    <link rel='stylesheet' href='/css/main.css'/>

    <script src='http://www.dukesnuz.com/js_libs/dukes.javascript.js'></script>
    <script src='/js/main.js'></script>
    @stack('head')
</head>
<body>
    <header>
        <h1>Administrator Section</h1>
        <div id='logout'>
            @php
            if(Auth::check()) {
                @endphp
                <form method='POST' action='/logout' id='logoutForm'/>
                    {{ csrf_field() }}
                    <a href='#'>{{ $user->first_name }} Logout</a>
                </form>
                @php
            }
            @endphp
        </div>
        <nav id='navWrap'>
            <ul>
                <li class='item'><a href='/'>Home</a></li>
                @php
                if(Auth::check()) {
                    @endphp
                    <li class='item'><a href='#'>Dispatchers</a>
                        <ul>
                            <li><a href='/dispatchers/'>Dispatchers</a></li>
                            <li><a href='/dispatcher/offices/'>Offices</a></li>
                            <li><a href='/dispatcher/contact/create/'>Add</a></li>
                            <li><a href='/dispatcher/mail/'>Mail</a></li>
                        </ul>
                    </li>
                    <li class='item'><a href='#'>Carriers</a>
                        <ul>
                            <li><a href='#'>Carriers</a></li>
                        </ul>
                    </li>
                    <li class='item'><a href='#'>Shippers</a>
                        <ul>
                            <li><a href='#'>Shippers</a></li>
                        </ul>
                    </li>
                    @php
                } else {
                    @endphp
                    <li class='item'><a href='/login'>Login</a></li>
                    <li class='item'><a href='/register'>Register</a></li>
                    @php
                }
                @endphp
            </ul>
        </nav>
    </header>
    <section class='content'>
        <div class='sessionMessage'>
            <p>{{ session('sessionMessage') }}</p>
        </div>
        @yield('content')
    </section>
    <footer>
        footer
    </footer>
    @stack('body')
</body>
</html>
