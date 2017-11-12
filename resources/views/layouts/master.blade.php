<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title', 'Admin')
	</title>

	<!--add meta
	link to style sheet
-->
	@stack('head')
</head>
<body>
   <header>
	   <h1>Admin area</h1>

	@yield('content')

@stack('body')
</body>
</html>
