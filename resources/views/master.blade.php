<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-left">
				<li><a class="navbar-brand" href="#">LoL-Legendary</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" >Login</a>
			</ul>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
<script src="/js/main.js"></script>
</html>