<!-- /.box -->
@extends('admin.master')

@section('body')
    <section class="content-header">
        <h1>
            Product
            <small>Add Product</small>
        </h1>


    </section>

    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Product</h3>
                        @if($message = Session::get('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            {{ $message }}
                        </div>
                        @endif

                        @if($message = Session::get('destroy'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                                {{ $message }}
                            </div>
                        @endif

                    </div>


                <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ url('/product/new-product') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                            <div class="form-group {{ $errors->has('product_name') ? ' has-error' : '' }}" >
                                <label for="inputName3" class="col-sm-2 control-label ">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_name" class="form-control" id="inputName3" placeholder="Add a Name">
                                    @if ($errors->has('product_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id">
                                        <option>Select Category Name</option>
                                        @foreach($publicationCagegories as $publicationCagegory)
                                        <option value="{{ $publicationCagegory->id }}">{{ $publicationCagegory->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="brand_id">
                                        <option>Select Category Name</option>
                                        @foreach($publicationBrands as $publicationBrand)
                                            <option value="{{ $publicationBrand->id }}">{{ $publicationBrand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_price" class="form-control" id="inputName3"
                                           placeholder="Add Number">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">Product Quantity</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_quantity" class="form-control" id="inputName3"
                                           placeholder="Add Number">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">Product Short Description</label>
                                <div class="col-sm-10">
                                    <textarea id="editor1" name="short_description"  rows="10" cols="80"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription3" class="col-sm-2 control-label">Product Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="editor2" name="long_description"  rows="10" cols="80"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">Product Main Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="product_image" accept="image/*"  id="inputName3">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">Product Sub Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="sub_image[]" accept="image/*" id="inputName3" multiple>
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
                                <button type="submit" name="btn" class="btn btn-info">Save Product Info</button>
                                <button type="submit" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
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
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection

