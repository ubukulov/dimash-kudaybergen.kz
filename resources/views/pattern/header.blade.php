<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    @if($agent->isMobile())
    <a class="navbar-brand" href="#">Меню</a>
    <button style="display: block;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @endif
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/') active @endif">
                <a class="nav-link" href="{{ route('home') }}">Главная <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/page/qairat-nurtas-musics') active @endif">
                <a class="nav-link" href="{{ route('page.show', ['alias' => 'qairat-nurtas-musics']) }}">Песни</a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/page/kajrat-nurtas-klipy') active @endif">
                <a class="nav-link" href="{{ route('page.show', ['alias' => 'kajrat-nurtas-klipy']) }}">Клипы</a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/page/biografiya-kayrata-nurtasa') active @endif">
                <a class="nav-link" href="{{ route('page.show', ['alias' => 'biografiya-kayrata-nurtasa']) }}">Биография</a>
            </li>

        </ul>
        {{--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>--}}
    </div>
</nav>
