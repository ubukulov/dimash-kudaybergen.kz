@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="post_content">
                <div class="klip_title">
                    <h1>{{ $clip->title }}</h1>
                </div>

                <div class="post_desc">
                    {!! $clip->full_description !!}
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

    <div class="row">
        <div class="col-md-12">
            <div class="post_content" style="margin-top: 40px;">
                <div class="post_title">
                    <h2>Другие клипы</h2>
                </div>

                <div class="post_desc">
                    <div class="row">
                        @foreach($clips as $cl)
                            <div class="col-md-4">
                                <div class="clip_content">
                                    <div class="clip_im">
                                        <a href="{{ $cl->url() }}">
                                            <img src="{{ $cl->getImageThumbs() }}" alt="{{ $cl->title }}">
                                        </a>
                                    </div>
                                    <div class="clip_title">
                                        <a href="{{ $cl->url() }}">
                                            {{ $cl->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <comment type="clip" :pcp-id="{{ $clip->id }}"></comment>

        <h2>Комментарии</h2>
        <div class="row">
            <div class="col-md-12">
                @foreach ($clip->comments() as $item)
                    <div class="comment mb-2">
                        <div>
                            <i class="fas fa-user-circle"></i>&nbsp; {{ $item->first_name }}
                        </div>
                        <div>
                            {{ $item->comment }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
