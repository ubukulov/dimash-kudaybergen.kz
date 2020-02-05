@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Имя</th>
                <th>Наименование</th>
                <th>Статус</th>
                <th>Действие</th>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td><a href="{{ $post->author_url() }}" target="_blank">{{ $post->title }}</a></td>
                        <td>
                            @if($post->active == '0')
                                Не активно
                            @else
                                Активно
                            @endif
                        </td>
                        <td>
                            @if($post->active == '0')
                                <a href="{{ route('admin.author.active', ['id' => $post->id]) }}" class="btn btn-primary">Показать</a>
                            @else
                                <a href="{{ route('admin.author.noactive', ['id' => $post->id]) }}" class="btn btn-primary">Скрыть</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
