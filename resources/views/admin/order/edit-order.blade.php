
<!-- /.box -->
@extends('admin.master')

@section('body')
    <section class="content-header">
        <h1>
            Order
            <small>Edit Order</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('/update-order') }}" method="POST">
            <table>
                <tr>
                    <td>Order Status</td>
                    <td>
                        <select>
                            <option>Pending</option>
                            <option>Cancel</option>
                            <option>Successfull</option>
                        </select>
                        <input type="hidden" name="id" value="{{  }}"/>
                    </td>
                </tr>
                <tr>
                    <td>Payment Status</td>
                    <td>
                        <select>
                            <option>Pending</option>
                            <option>Cancel</option>
                            <option>Successfull</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Order Status</td>
                    <td>
                        <input type="submit" name="btn" value="Update Order"/>
                    </td>
                </tr>
            </table>
        </form>
    </section>
    <!-- /.content -->

@endsection

