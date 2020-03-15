<!doctype html>
<html lang="en">
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" style="font-family: 'Vibur', cursive; font-size: 50px;" href="/">Instalife</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">+</span>
    </button>

    <div class="container collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-5 navbar-nav mr-auto">
           <!-- <li class="nav-item active">
                <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
            </li> -->
            <li class="nav-item active"> <!-- offset-3 -->
                <a class="nav-link" href="/"> + <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Найти..." aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>
<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="avatar"></div>
                    <div class="name">{{ $post->name }}</div>
                </div>
                <div class="card-body">
                    <div class="card-img" style="background-image:url({{ $post->img ?? asset('img/default.jpg') }});"></div>
                    <b>{{ $post->name }}</b>: {{ mb_strlen($post->descr)>190 ? mb_substr($post->descr, 0, 190) . '...' : $post->descr }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{
        $posts->links()
    }}
</div>
</body>
</html>
