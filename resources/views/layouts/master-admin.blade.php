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
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<script type="text/javascript" src = "http://www.dukesnuz.com/js_libs/dukes.javascript.js"></script>
	<script type="text/javascript" src = "/js/admin/forms.js?t=<?php echo rand(); ?>"></script>
	@stack('head')
</head>
<body>
	<header>
		<h1>Admin area</h1>
	</header>
	@yield('content')

	@stack('body')
</body>
</html>
