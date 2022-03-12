<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
use App\Models\Coupon;
use App\Models\Users;
session_start();

class PayPalController extends Controller
{
     /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('paypal.paypal');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $total = Session::get('after_total');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $get_user = Users::where('user_id', Session::get('user_id'))->first();
            $shipping = new Shipping();
            $shipping->shipping_name = $get_user->name;
            $shipping->shipping_email =$get_user->email;
            $shipping->shipping_address = $get_user->address;
            $shipping->shipping_phone = $get_user->phone;
            $shipping->shipping_note = '';
            $shipping->save();
            $shipping_id = $shipping->shipping_id;
            $sum_quantity = 0;
            $sum_total = 0;
            if(Session::get('cart')){
                foreach(Session::get('cart') as $key=>$cart){
                    $sum_quantity += $cart['product_qty'];
                    $sum_total += $cart['product_price'] * $cart['product_qty'];
                }
            }
            $order_code = 'No'.substr(md5(microtime()),rand(0,26),5); //tạo mã tự động
            $order = new Invoice();
            $order->user_id = Session::get('user_id');
            $order->shipping_id = $shipping_id;
            $order->invoice_code = $order_code;
            $order->quantity = $sum_quantity;
            $order->total = Session::get('after_total');
            $order->coupon_code = Session::get('coupon_code');
            $order->invoice_status = 'Paid';
            $order->payment = 'Paypal';
            $order->created_at = now();
            $order->save();
            $invoice_id = $order->invoice_id;
            if(Session::get('coupon_code') != ''){
                $quantity_coupon = Coupon::where('voucher_code',Session::get('coupon_code'))->first();
            DB::table('vouchers')->where('voucher_code',Session::get('coupon_code'))->update(['voucher_quantity' => $quantity_coupon->voucher_quantity - 1]);
            }
            if(Session::get('cart')){
                foreach(Session::get('cart') as $key=>$cart){
                    $order_details = new InvoiceDetails();
                    $order_details->invoice_id = $invoice_id;
                    $order_details->product_id  = $cart['product_id'];
                    $order_details->product_image  = $cart['product_image'];
                    $order_details->product_name = $cart['product_name'];
                    $order_details->subtotal = $cart['product_price'];
                    $order_details->quantity = $cart['product_qty'];
                    $order_details->save();
                }
            }
            Session::forget('cart');
            Session::forget('after_total');
            Session::forget('coupon_code');
            Session::forget('coupon');
            return redirect()
                ->route('thanks')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('checkout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
