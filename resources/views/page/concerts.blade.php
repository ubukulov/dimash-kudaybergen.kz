@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('page.show', null, 'Концерты') !!}
    <div class="row">
        @foreach($concerts as $concert)
        <div class="col-md-12">
            <div class="page_content">
                <div class="klip_title">
                    <h1>{!! $concert->title !!}</h1>
                </div>

                <div class="page_desc">
                    {!! $concert->full_description !!}
                </div>
            </div>
        </div>
        @endforeach
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
