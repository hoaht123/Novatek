<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
use App\Models\Coupon;
use App\Models\Users;
session_start();

class MomoController extends Controller
{   
     public function execPostRequest($url, $data)
    {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            //execute post
            $result = curl_exec($ch);
            //close connection
            curl_close($ch);
            return $result;
    }

    public function momo_payment(Request $request){
        $data = $request->all();
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = round($data['total']) * 22840;
        $orderId = time() . "";
        $redirectUrl = "http://localhost:8080/Novatek-2/Novatek/public/thanks";
        $ipnUrl = "http://localhost:8080/Novatek-2/Novatek/public/thanks";
        $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            // dd($signature);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            // dd($result);
            $jsonResult = json_decode($result, true);  // decode json
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
            $order->invoice_status = 'Paid';
            $order->payment = 'Momo';
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
            return redirect()->to( $jsonResult['payUrl']);
        
    }
}
