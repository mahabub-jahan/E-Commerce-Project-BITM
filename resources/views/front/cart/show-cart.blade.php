@extends('front.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br/>
                <h3 class="text-center text-success">My Shopping Cart</h3>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>SL. No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @php($sum=0)
                        @forelse($cartProducts as $cartProduct)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cartProduct->id }}</td>
                            <td>{{ $cartProduct->name }}</td>
                            <td><img src="{{asset($cartProduct->options->image)}}" alt="" height="50" width="50"></td>
                            <td>TK. {{ $cartProduct->price }}</td>
                            <td>
                                <form action="{{ url('/update-cart-product') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="number" value="{{ $cartProduct->qty }}" name="qty" min="1">
                                    <input type="hidden" value="{{ $cartProduct->rowId }}" name="rowId">
                                    <input type="submit" value="Update" name="btn">
                                </form>
                            </td>
                            <td>TK. {{ $total = $cartProduct->price*$cartProduct->qty }}</td>
                            <td>
                                <a href="{{ url('/delete-cart-product/'.$cartProduct->rowId) }}" class="btn btn-danger btn-xs" title="Delete Chart Product">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>

                        </tr>
                        @php($sum = $sum + $total)
                        @empty
                            <h1>No Product Availabel</h1>
                        @endforelse
                    </table>

                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Sub Total</th>
                            <td>TK. {{ $sum }}</td>
                        </tr>

                        <tr>
                            <th>Discount</th>
                            <td>TK. {{ $discount = 0 }} </td>
                        </tr>

                        <tr>
                            <th>Tax</th>
                            <td>TK. {{ $tax = 0 }}</td>
                        </tr>

                        <tr>
                            <th>Grand Total</th>
                            <td>TK. {{ $grandTotal = ($sum - $discount + $tax) }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection