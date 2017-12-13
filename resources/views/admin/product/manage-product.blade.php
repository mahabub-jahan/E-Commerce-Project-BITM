<!-- /.box -->
@extends('admin.master')

@section('body')
<section class="content-header">
    <h1>
        Product
        <small>Manage Product</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Product Information Data Table</h3>

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

                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL Id</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>demo</td>
                            <td>demo</td>
                            <td>demo</td>
                            <td>demo</td>
                            <td>demo</td>
                            <td>demo</td>
                            <td>demo</td>
                            <td>demo</td>
                            <td>
                                <a href="" title="View Product Details" class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                <a href="" title="Published Product" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                <a href="" title="Edit Product" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="" title="Delete Product" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>

                        </tr>

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('script')
    <!-- DataTables -->
    <script src="{{asset('/admin')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/admin')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{asset('/admin')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection




