<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Vibur&display=swap" rel="stylesheet">
</head>
<body>
<header class="border-bottom">
<nav class="container navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" style="font-family: 'Vibur', cursive; font-size: 50px;" href="/">Instalife</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <!-- <li class="nav-item active">
                 <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
             </li> -->
            <li class="nav-item active "> <!-- offset-3 -->
                <a class="nav-link" href="/"> ADD... <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 " action="{{ route('post.index')}}">
            <input class="form-control mr-sm-2" name= "search" type="search" placeholder="Найти..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>
</header>
<div class="container">
    @yield('content')
</div>

</body>
</html>
