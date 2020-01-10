@extends('layouts.app')
@section('content')
    @foreach($posts as $post)
    <div class="mini">
        <a href="{{ $post->url() }}">
            <img src="{{ $post->getImage() }}" alt="Димаш">
        </a>
        <h1><a href="{{ $post->url() }}">{{ $post->title }}</a></h1>
        <p>{!! $post->description !!}</p>
        <div class="stats">
			<span><i class="far fa-clock"></i>&nbsp;{{ date("d.m.Y", strtotime($post->created_at)) }}</span>
			<span><i class="fa fa-eye"></i>&nbsp;{{ $post->views }}</span>
		</div>
        <a class="more" href="{{ $post->url() }}">Подробнее</a>
    </div>
    @endforeach

    {{ $posts->links() }}
@stop
