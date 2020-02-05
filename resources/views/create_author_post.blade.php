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
                            <label>Наименование</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Ключевые слова</label>
                            <input type="text" name="keywords" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Короткое описание</label>
                            <textarea name="description" cols="30" rows="5" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Полное описание</label>
                            <textarea name="full_description" id="editor1" class="form-control" cols="30" rows="5" required></textarea>
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
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/admin_lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/admin_lte/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/admin_lte/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/admin_lte/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="/admin_lte/dist/js/demo.js"></script>
        <!-- CK Editor -->
        <script src="/admin_lte/bower_components/ckeditor/ckeditor.js"></script>
        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('description');
                CKEDITOR.replace('full_description');
                CKEDITOR.config.allowedContent = true;
            })
        </script>
    @endpush
@stop
