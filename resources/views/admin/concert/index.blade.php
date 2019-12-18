@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.concert.create') }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Добавить</a>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th>Действие</th>
                </thead>

                <tbody>
                    @foreach($concerts as $concert)
                    <tr>
                        <td>{{ $concert->id }}</td>
                        <td>{{ $concert->title }}</td>
                        <td>
                            <a href="{{ route('admin.concert.edit', ['id' => $concert->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp; Ред.</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $concerts->links() }}
        </div>
    </div>
@stop
