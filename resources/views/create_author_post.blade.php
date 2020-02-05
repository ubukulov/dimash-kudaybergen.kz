@extends('layouts.app')
@section('content')
    @push('styles')

    @endpush

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить пост</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('store.author.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label>Заголовок</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea name="full_description" id="full_desc" class="form-control" cols="30" rows="5" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Картинка</label>
                            <input type="file" name="file">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Добавить и отправить на модерацию</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>

    @push('scripts')
        <!-- CK Editor -->
        <script src="/admin_lte/bower_components/ckeditor/ckeditor.js"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('full_desc');
                CKEDITOR.config.allowedContent = true;
            })
        </script>
    @endpush
@stop
