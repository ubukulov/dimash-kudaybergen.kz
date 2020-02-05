@extends('layouts.app')
@section('content')
    {!! Breadcrumbs::render('author.post') !!}

    @if(Auth::check())
        <a href="#" class="btn btn-success">Написать пост</a>
    @else
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#auth_form">Написать пост</button>
    @endif

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

    <!-- Modal -->
    <div class="modal fade" id="auth_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Форма авторизации</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" required placeholder="Ваш Email" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" required placeholder="Ваш пароль" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Войти</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#">Регистрация</a>
                </div>
            </div>
        </div>
  </div>
@stop
