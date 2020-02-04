@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('search') !!}
    <div class="wtitle">
        <svg style="width: 20px; " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="network-wired" class="svg-inline--fa fa-network-wired fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M640 264v-16c0-8.84-7.16-16-16-16H344v-40h72c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H224c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h72v40H16c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16h104v40H64c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h304v40h-56c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h104c8.84 0 16-7.16 16-16zM256 128V64h128v64H256zm-64 320H96v-64h96v64zm352 0h-96v-64h96v64z"></path></svg>
        &nbsp;
        Результаты по поиску: {{ $query }}
    </div>
    <div class="row">
        @foreach($results as $post)
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
    </div>
@stop
