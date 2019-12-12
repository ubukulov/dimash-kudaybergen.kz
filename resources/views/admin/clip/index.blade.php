@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.clip.create') }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Добавить</a>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Действие</th>
                </thead>

                <tbody>
                    @foreach($clips as $clip)
                    <tr>
                        <td>{{ $clip->id }}</td>
                        <td>{{ $clip->title }}</td>
                        <td>
                            <a href="{{ route('admin.clip.edit', ['id' => $clip->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Ред.</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $clips->links() }}
        </div>
    </div>
@stop