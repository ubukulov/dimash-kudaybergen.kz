@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.article.create') }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Добавить</a>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Действие</th>
                </thead>

                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            <a href="{{ route('admin.article.edit', ['id' => $article->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Ред.</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop