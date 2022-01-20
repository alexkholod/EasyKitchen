<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#24cda5">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div class="container">
    <nav class="navbar fixed-bottom navbar-expand-lg navbar-light" style="background-color: #0095B6; align-content: center; z-index:999;">
        <a class="navbar-brand col-2" href="{{ route('home') }}"><img src="http://sw.running-life.ru/home_icon.png" alt="home"></a>
        <a class="navbar-brand col-2" href="{{ route('add-product') }}"><img src="http://sw.running-life.ru/plus_icon.png" alt="add"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('storage', 1 )}}">Верхний отдел</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('storage', 2 )}}">Нижний отдел</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('storage', 3 )}}">Дверца</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('storage', 4 )}}">Холодильник</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
@yield('main-content')
</body>
</html>
