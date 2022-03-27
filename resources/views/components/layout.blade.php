<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/layout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @yield('stylesheet')
    <title>Money Manager</title>
</head>
<body>
<nav>
    <h1><a href="/">Money Manager</a></h1>
    @if(Request::path() !== 'login' && Request::path() !== 'register')
        <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket logout"></i></a>
    @elseif(Request::path() === 'register')
        <a href="/login"><i class="fa-solid fa-arrow-right-to-bracket login"></i></a>
    @endif
</nav>

<div class="background">
    <div class="blur"></div>
</div>

@yield('content')

<script src="https://kit.fontawesome.com/be5a9998b5.js" crossorigin="anonymous"></script>
</body>
</html>
