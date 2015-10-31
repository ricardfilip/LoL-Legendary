<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url("/css/main.css")}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    @yield("header"){{-- content specific header --}}
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav navbar-left">
            <li><a class="navbar-brand" href="{{url("/")}}">LoL-Legendary</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Login</a>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="{{url("/js/main.js")}}"></script>
@yield("footer"){{-- content specific footer --}}
</body>
</html>