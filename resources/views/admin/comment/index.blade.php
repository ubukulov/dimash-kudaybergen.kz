@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>ID</th>
                <th>Имя</th>
                <th>Комментарии</th>
                <th>Статус</th>
                <th>Действие</th>
                </thead>

                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            @if($comment->status == '0')
                                Не активно
                            @else
                                Активно
                            @endif
                        </td>
                        <td>
                            @if($comment->status == '0')
                                <a href="{{ route('admin.comment.active', ['id' => $comment->id]) }}" class="btn btn-primary">Показать</a>
                            @else
                                <a href="{{ route('admin.comment.noactive', ['id' => $comment->id]) }}" class="btn btn-primary">Скрыть</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
