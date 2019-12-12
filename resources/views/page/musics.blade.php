@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('page.show', null, 'Музыки') !!}
    <div class="row">
        <div class="col-md-12">
            <div class="page_content">
                <div class="page_title">
                    <h1>Песни</h1>
                </div>

                <div class="page_desc">
                    <!-- Blue Playlist Container -->
                    <div id="blue-playlist-container">

                        <!-- Amplitude Player -->
                        <div id="amplitude-player">

                            <!-- Left Side Player -->
                            <div id="amplitude-left">
                                <img data-amplitude-song-info="cover_art_url"/>
                                <div id="player-left-bottom">
                                    <div id="time-container">
              <span class="current-time">
                <span class="amplitude-current-minutes" ></span>:<span class="amplitude-current-seconds"></span>
              </span>
                                        <div id="progress-container">
                                            <input type="range" class="amplitude-song-slider"/>
                                            <progress id="song-played-progress" class="amplitude-song-played-progress"></progress>
                                            <progress id="song-buffered-progress" class="amplitude-buffered-progress" value="0"></progress>
                                        </div>
                                        <span class="duration">
                <span class="amplitude-duration-minutes"></span>:<span class="amplitude-duration-seconds"></span>
              </span>
                                    </div>

                                    <div id="control-container">
                                        <div id="repeat-container">
                                            <div class="amplitude-repeat" id="repeat"></div>
                                            <div class="amplitude-shuffle amplitude-shuffle-off" id="shuffle"></div>
                                        </div>

                                        <div id="central-control-container">
                                            <div id="central-controls">
                                                <div class="amplitude-prev" id="previous"></div>
                                                <div class="amplitude-play-pause" id="play-pause"></div>
                                                <div class="amplitude-next" id="next"></div>
                                            </div>
                                        </div>

                                        <div id="volume-container">
                                            <div class="volume-controls">
                                                <div class="amplitude-mute amplitude-not-muted"></div>
                                                <input type="range" class="amplitude-volume-slider"/>
                                                <div class="ms-range-fix"></div>
                                            </div>
                                            <div class="amplitude-shuffle amplitude-shuffle-off" id="shuffle-right"></div>
                                        </div>
                                    </div>

                                    <div id="meta-container">
                                        <span data-amplitude-song-info="name" class="song-name"></span>

                                        <div class="song-artist-album">
                                            <span data-amplitude-song-info="artist"></span>
                                            <span data-amplitude-song-info="album"></span>
                                        </div>

{{--                                        <div class="song-lyrics">--}}
{{--                                            <p data-amplitude-song-info="lyrics"></p>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- End Left Side Player -->

                            <!-- Right Side Player -->
                            <div id="amplitude-right">
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="0">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Дайдидау</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/daydidau.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="1">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Грешная страсть</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/greshnaya_strast.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="2">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Adagio</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Adagio.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="3">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Akkuym</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Akkuym.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="4">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">All By Myself</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/All_By_Myself.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="5">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Hello</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Hello.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="6">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Lay Down</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Lay Down.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="7">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">My Heart Will Go On</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/My heart will go on.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="8">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">A Question of Honour</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Question of Honour.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="9">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Screaming</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Screaming.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="10">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">S.O.S. D'un Terrien En Detresse</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Sos dun terrien (2018).mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="11">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">The Crown</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/The_Crown.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="12">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Война и Мир</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Война и Мир.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="13">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Знай</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Знай.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="14">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Любовь уставших лебедей</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Любовь уставших лебедей.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="15">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Махаббат бер маған</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Махаббат бер маған.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="16">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Опять метель</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Опять метель.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="17">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Umytylmas kún</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/umutulmas.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>
                                <div class="song amplitude-song-container amplitude-play-pause" data-amplitude-song-index="18">
                                    <div class="song-now-playing-icon-container">
                                        <div class="play-button-container">

                                        </div>
                                        <img class="now-playing" src="/img/now-playing.svg"/>
                                    </div>
                                    <div class="song-meta-data">
                                        <span class="song-title">Я люблю только тебя</span>
                                        <span class="song-artist">Димаш Кудайберген</span>
                                    </div>
                                    <a href="{{ asset('songs/Я люблю только тебя.mp3') }}" class="bandcamp-link" title="Скачать" target="_blank">
                                        <img class="bandcamp-grey" src="/img/bandcamp-grey.svg"/>
                                        <img class="bandcamp-white" src="/img/bandcamp-white.svg"/>
                                    </a>
                                </div>


                            </div>
                            <!-- End Right Side Player -->
                        </div>
                        <!-- End Amplitdue Player -->
                    </div>

                    <!--
                        Include UX functions JS

                        NOTE: These are for handling things outside of the scope of AmplitudeJS
                    -->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <script type="text/javascript">(function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                    }})();</script>
            <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=04" data-services="vkontakte,facebook,odnoklassniki,twitter,google,moimir"></div>
        </div>
    </div>
@stop
