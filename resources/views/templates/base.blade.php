<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>@yield('title', 'Accueil') - Learning App</title>
		
		@include('templates.components.css')
		@yield('stylesheets')
	</head>

	<body>
		@include('templates.components.header')

		@yield('content')

		@include('templates.components.footer')

		@include('templates.components.js')
		@yield('javascripts')
	</body>

</html>