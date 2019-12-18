@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('articles') !!}
    @foreach($articles as $article)
        <div class="mini">
            <a href="{{ $article->url() }}">
                <img src="{{ $article->getImage() }}" alt="Димаш">
            </a>
            <h1><a href="{{ $article->url() }}">{{ $article->title }}</a></h1>
            <p>{!! $article->description !!}</p>
            <a class="more" href="{{ $article->url() }}">Подробнее</a>
        </div>
    @endforeach
@stop