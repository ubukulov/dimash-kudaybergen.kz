@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('singers') !!}
    <div class="row">
		@foreach($singers as $singer)
        <div class="col-md-12">
            <div class="post_content">
                <div class="klip_title">
                    <h1>{{ $singer->title }}</h1>
                </div>

                <div class="post_desc">
                    {!! $singer->full_description !!}
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

        <div class="col-md-12">
            <comment type="singer" :pcp-id="{{ $singer->id }}"></comment>

            <h2>Комментарии</h2>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($singer->comments() as $item)
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
    </div>
@stop