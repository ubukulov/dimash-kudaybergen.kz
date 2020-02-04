<!doctype html>
<html lang="ru">
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NZ3L5QX');</script>
	<!-- End Google Tag Manager -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fontss/fontss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/play.css') }}">
    <!-- Include Style Sheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}"/>
    {!! SEO::generate() !!}
    <!-- Include Amplitude JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/amplitudejs@5.0.2/dist/amplitude.js"></script>
</head>

<body style="background: #fff !important;">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NZ3L5QX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrap">
    <header>
        <div class="header-wrap">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <img src="{{ asset('img/dimash-logo.png') }}" alt="Димаш">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ \Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Главная<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ \Request::is('page/biografiya*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('page.show', ['alias' => 'biografiya']) }}">Биография</a>
                </li>
                <li class="nav-item {{ \Request::is('articles*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('articles') }}">Статьи</a>
                </li>
                <li class="nav-item {{ \Request::is('page/musics*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('page.show', ['alias' => 'musics']) }}">Песни</a>
                </li>
                <li class="nav-item {{ \Request::is('page/klipy*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('page.show', ['alias' => 'klipy']) }}">Клипы</a>
                </li>
                <li class="nav-item {{ \Request::is('singer*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('singer') }}">Singer-2017</a>
                </li>
                <li class="nav-item {{ \Request::is('page/concerts*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('page.show', ['alias' => 'concerts']) }}">Концерты</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('search') }}" method="POST">
                @csrf
                <input class="form-control mr-sm-2" type="search" placeholder="Введите слово" aria-label="Search" name="query" required>
                <button class="btn btn-outline-success my-2 my-sm-0 poisk-knop" type="submit">Поиск</button>
            </form>
        </div>
    </nav>

    {{--<nav class="krosh" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Главная</li>
        </ol>
    </nav>--}}

    <div class="telo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
                </div>
                <div class="col-md-3 said">
                    <div class="news">
                        <h3>Популярные новости</h3>
                        <ul>
                            @foreach($popular_posts as $item)
                                <li><a href="{{ $item->url() }}">{{ $item->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="article">
                        <h3>Популярные статьи</h3>
                        <ul>
                            @foreach($popular_articles as $article)
                                <li><a href="{{ $article->url() }}">{{ $article->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<section id="numbering">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav class="main-numbering" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>--}}

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p>© 2019г. Все права защищены</p>
                    <a href="#">Политика конфедициальности</a>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>
