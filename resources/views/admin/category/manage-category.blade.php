<!-- /.box -->
@extends('admin.master')

@section('body')
    <section class="content-header">
        <h1>
            Category
            <small>Category Info</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Category Information Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    @if($message = Session::get('message'))
                        <h3 class="alert alert-success">{{ $message }}</h3>
                    @endif

                    @if($message = Session::get('destroy'))
                        <h3 class="alert alert-danger">{{ $message }}</h3>
                    @endif
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1 @endphp
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_description }}</td>

                                    <td>
                                        @if($category->publication_status == 1)
                                            <span class="label label-success">Published</span>
                                        @else
                                            <span class="label label-warning">Unpublished</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($category->publication_status == 1)
                                            <a href="{{ url('/category/unpublished-category/'.$category->id) }}" class="btn btn-success btn-xs" title="Published">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                        @else
                                            <a href="{{ url('/category/published-category/'.$category->id) }}" class="btn btn-warning btn-xs" title="Unpublished">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @endif
                                        <a href="{{ url('/category/edit-category/'.$category->id) }}" class="btn btn-info btn-xs" title="Edit blog">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{ url('/category/delete-category/'.$category->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete This ?');">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
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