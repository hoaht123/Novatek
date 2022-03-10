<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\PDF;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Shipping;
session_start();
class UserController extends Controller
{
    public function wish_list() {
        $brands = Brand::all();
        $categories = Category::all();
        $products = DB::table('wish_list')->join('product', 'wish_list.product_id', '=', 'product.product_id')->where('user_id', session('user_id'))->paginate(9);
        return view('client.products', compact('products','brands','categories'))->with(['title'=>'Wish List']);
    }

    public function add_wish_list(Request $request) {
        $data = $request->all();
        $product_id = $data['product_id'];
        $user_id = session('user_id');
        if($user_id == null) {
            return response()->json(['status' => 'failed', 'message' => 'You must login'])->header('Content-Type', 'application/json');
        }
        $wish_list = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if(!empty($wish_list)>0 ){
            DB::delete('delete from wish_list where user_id = ? and product_id = ?', [$user_id, $product_id]);
            return response()->json(['status' => 'deleted', 'message' => 'Product removed from wish list'])->header('Content-Type', 'application/json');
        }else{
            $wish_list = new Wishlist();
            $wish_list->user_id = $user_id;
            $wish_list->product_id = $product_id;
            $wish_list->save();
            return response()->json(['status' => 'added', 'message' => 'Product added to wish list'])->header('Content-Type', 'application/json');
        }
    }


    public function information_user(){
        $invoices = DB::table('invoices')->where('user_id', Session::get('user_id'))->get();
        $user = DB::table('users')->where('user_id', '=', Session::get('user_id'))->first();
        return view('client.information_user',compact('user','invoices'));
    }
    public function update_infor_user(Request $request , $user_id){
        $data = $request->all();
        $user = Users::find($user_id);
        $user['name'] = $data['user_name'];
        $user['phone'] = $data['user_phone'];
        $user['address'] = $data['user_address'];
        $user->save();
        Session::put('update_success','Update information successfully');
        return Redirect::back();
    }
    public function change_password(Request $request, $user_id){
        $data = $request->all();
        $check_password = DB::table('users')->where('user_id', $user_id)->where('password',md5( $data['old_password']))->first();
        if(!$check_password){
            Session::put('change_password','Your password is incorrect');
            return Redirect::back();
        }else{
            $change_password = Users::find($user_id);
            $change_password['password'] = md5($data['new_password']);
            $change_password->save();
            Session::put('change_password_success','Change password successfully');
            return Redirect::back();
        }
    }

    public function view_invoice_user($invoice_id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->view_invoice_user_convert($invoice_id));
        return $pdf->stream();
    }

    public function view_invoice_user_convert($invoice_id){
        $invoice_details = InvoiceDetails::where('invoice_id', $invoice_id)->get();
        $invoices = Invoice::where('invoice_id', $invoice_id)->get();
        foreach($invoices as $key=>$invoice){
            $user_id = $invoice->user_id;
            $shipping_id = $invoice->shipping_id;
            $invoice_code = $invoice->invoice_code;
            $invoice_date = $invoice->created_at;
        }
        
        $user = Users::find($user_id);
        $shipping = Shipping::find($shipping_id);
        $output = '';
        $i = 0;
        $total = 0;
        $output =
        '
        <style>
            body{
                font-family:DejaVu Sans;

            }
            .table-styling{
                border:solid 1px #000;
            }
            .table-styling tr td {
                border:solid 1px #000;
            }
            span{
                font-weight:bold;
            }
        </style>
        <img style="width:100px;height:50px" src="client/img/logo-novatek.jpg" alt="">
        <div style="text-align:right">Order code: '.$invoice_code.'</div>
        <div>Receiver: '.$shipping->shipping_name.'<div>
        <div>Email: '.$shipping->shipping_email.'<div>
        <div>Address: '.$shipping->shipping_address.'<div>
        <div>Order date: '. $invoice_date.'<div>
        <div>Note: '.$shipping->shipping_note.'<div>
        
        <h4><center>Invoice details</center></h4>
        <table border="1" class="table table-styling" style="text-align:center">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>';
            foreach($invoice_details as $key=>$in_de){
                $total += $in_de->quantity *$in_de->subtotal;
                $output .='
                <tr>
                    <td>'.++$i.'</td>
                    <td style="width:300px">'.$in_de->product_name.'</td>
                    <td style="width:100px"><img style="width:50px;height:50px" src="images/product/'.$in_de->product_image.'" alt="'.$in_de->product_name.'"></td>
                    <td>'.$in_de->quantity.'</td>
                    <td>$'.$in_de->subtotal.'</td>
                    <td style="width:100px">$'.$in_de->subtotal * $in_de->quantity .'</td>
                </tr>';
            }
            $output .='
            </tbody>
        </table>';
        $output .='</div>
        <div style="float:right">
        <div >Shipping : Free Shipping </div>
        <div >Total order: $'.$total.'</div>
        </div>';
        return $output;
    }
}
