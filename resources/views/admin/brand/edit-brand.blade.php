
<!-- /.box -->
@extends('admin.master')

@section('body')
    <section class="content-header">
        <h1>
            Brand
            <small>Edit Brand</small>
        </h1>

    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    @if($message = Session::get('message'))
                        <h3 class="text-center text-success">{{ $message }}</h3>
                        @endif
                        <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" name="editBrandForm" method="POST" action="{{ url('/brand/update-brand') }}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputName3" class="col-sm-2 control-label">Brand Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control" id="inputName3" placeholder="Add a Name">
                                            <input type="hidden" name="brand_id" value="{{ $brand->id }}" class="form-control" id="inputName3" placeholder="Add a Name">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputDescription3" class="col-sm-2 control-label">Brand Description</label>
                                        <div class="col-sm-10">
                                            <textarea id="editor1" name="brand_description"  rows="10" cols="80">{{ $brand->brand_description }}</textarea>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Publication Status</label>

                                        <div class="col-sm-10">
                                            <select class="form-control" name="publication_status">
                                                <option>Select Publication Status</option>
                                                <option value="1">Published</option>
                                                <option value="0">Unpublished</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="col-sm-offset-2">
                                        <button type="submit" name="btn" class="btn btn-info">Update Brand Info</button>
                                        <button type="submit" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <script>
        document.forms['editBrandForm'].elements['publication_status'].value='{{$brand->publication_status}}';
    </script>
@endsection

@section('script')
    <!-- CK Editor -->
    <script src="{{asset('/admin')}}/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('/admin')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
