<!-- /.box -->
@extends('admin.master')

@section('body')
    <section class="content-header">
        <h1>
            Order
            <small>View Order</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Order Information Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    @if($message = Session::get('message'))
                        <h3 class="text-center text-success">{{ $message }}</h3>
                    @endif
                    <div class="box-body">
                        <h2>Customer Info For This Order</h2>
                        <hr/>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $customer->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                        </table>
                        <h2>Shipping Info For This Order</h2>
                        <hr/>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Shipping Name</th>
                                <td>{{ $shipping->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $shipping->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $shipping->address }}</td>
                            </tr>
                        </table>
                        <h2>Product Info For This Order</h2>
                        <hr/>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            @php($i=1)
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->product_id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>TK. {{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>TK. {{ $product->product_price * $product->product_quantity}}</td>

                                </tr>
                            @endforeach
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