<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $amount = $data['total'] * 22840;
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

            //Just a example, please check more in there
            Session::forget('cart');
            return redirect()->to( $jsonResult['payUrl']);
        
    }
}
