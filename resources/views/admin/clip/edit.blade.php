@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактирование клип</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('admin.clip.update', ['id' => $clip->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Наименование</label>
                            <input type="text" value="{{$clip->title}}" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Ключевые слова</label>
                            <input type="text" value="{{$clip->keywords}}" name="keywords" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Короткое описание</label>
                            <textarea name="description" cols="30" rows="5" class="form-control" required>{!! $clip->description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea name="full_description" id="editor1" class="form-control" cols="30" rows="5" required>{!! $clip->full_description !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Картинка</label>
                            @if(!empty($clip->image))
                                <img width="150" src="{{ $clip->getImageThumbs() }}" alt=""> <br><br>
                                <input type="file" name="file">
                            @else
                                <input type="file" name="file">
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Изменить клип</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop