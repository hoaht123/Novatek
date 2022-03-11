<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
use App\Models\Coupon;
session_start();
class CartController extends Controller
{
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart == true){
            $is_available = 1;
            foreach($cart as $key=>$val){
                if($val['product_id'] == $data['cart_product_id']){
                    $is_available++;
                    $cart[$key]['product_qty']+=$data['cart_product_qty'];
                }
            }
            if($is_available == 1){
                $cart = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_image' => $data['cart_product_image'],
                    'product_price' => $data['cart_product_price'],
                    'product_qty' => $data['cart_product_qty']
                );
               Session::push('cart',$cart);
            }else{
                Session::put('cart',$cart);
            }
        }else{
            $cart = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_qty' => $data['cart_product_qty']
            );
            Session::push('cart',$cart);
        }
        Session::save();
    }

    public function show_cart(){
        return view('client.cart');
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach($data['cart_qty'] as $key=>$qty){
                foreach($cart as $session=>$val){
                    if($val['session_id'] == $key){
                        $cart[$session]['product_qty']=$qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
    }

    public function del_product($session_id){
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        if($cart == true){
            foreach($cart as $key=>$val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function del_all_cart(){
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            return redirect()->back();
        }
    }

    public function checkout(){
        return view('client.checkout');
    }

    public function confirm_order(Request $request){
        $data = $request->all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');// set thời gian
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_note = $data['shipping_note'];
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
        // echo '<pre>';
        // print_r($shipping_id);
        // echo '</pre>';
        // die();
        $order_code = 'No'.substr(md5(microtime()),rand(0,26),5); //tạo mã tự động
        $order = new Invoice();
        $order->user_id = Session::get('user_id');
        $order->shipping_id = $shipping_id;
        $order->invoice_code = $order_code;
        $order->quantity = $sum_quantity;
        $order->total = Session::get('after_total');
        $order->coupon_code = Session::get('coupon_code');
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
        return Redirect::to('thanks');
    }

    public function thanks(){
        return view('client.thanks');
    }
}
