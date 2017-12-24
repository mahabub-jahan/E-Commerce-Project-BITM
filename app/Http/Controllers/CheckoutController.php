<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Session;
use Mail;
use Cart;


class CheckoutController extends Controller
{
    public function index() {
        return view('front.checkout.checkout');
    }

    public function saveCustomerInfo(Request $request) {

        $this->validate($request, [
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            //'email' => 'required|email|unique:customers,email',
            'password' => 'required',
            'phone_number' => 'required|size:11|regex:/(01)[0-9]{9}/',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();

        Session::put('customerId', $customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();
        /* convert $customer object to array
           to access this array data we have to write
            $data['first_name']
        */

        /*
        Mail::send('front.mail.congratulation-mail', $data, function ($message) use ($data) {
            $message->to($data['email']);// In this position we can't use object. We must use array to pass data
            $message->subject('Congratulation Mail');
        });*/
        /*
         * 'front.mail.congratulation-mail' = this is a blade file where we write our mail
         * $data = this $data contain all data like first_name, last_name, email etc.
         * */

        return redirect('/shipping-info');
    }

    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }

    public function customerLoginCheck(Request $request) {
        $customer = Customer::where('email', $request->email)->first();

        if($customer) {
            if(password_verify($request->password, $customer->password)) {
                Session::put('customerId', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);

                return redirect('/shipping-info');
            } else {
                return redirect('/checkout')->with('message', 'Invalid Password');
            }
        } else {
            return redirect('/checkout')->with('message', 'Invalid Email');
        }

    }


    public function showShippingInfo() {
        $customer = Customer::find(Session::get('customerId'));
        return view('front.checkout.shipping-info',compact('customer'));
    }

    public function saveShippingInfo(Request $request) {
       $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);

        return redirect('/payment-info');
    }

    public function showPaymentForm() {
        return view('front.checkout.payment-form');
    }

    public function saveOrderInfo(Request $request) {
        $paymentType = $request->payment_type;
        if ($paymentType == 'Cash On Delivery') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('grandTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();

            }

            Cart::destroy();

            return redirect('/')->with('message', 'Thanks for your valuable order. We will contact with you soon');


        }
    }
}

