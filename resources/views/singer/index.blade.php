@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('singers') !!}
    @foreach($singers as $singer)
        <div class="mini">
            <a href="{{ $singer->url() }}">
                <img src="{{ $singer->getImage() }}" alt="Димаш">
            </a>
            <h1><a href="{{ $singer->url() }}">{{ $singer->title }}</a></h1>
            <p>{!! $singer->description !!}</p>
            <a class="more" href="{{ $singer->url() }}">Подробнее</a>
        </div>
    @endforeach
@stop