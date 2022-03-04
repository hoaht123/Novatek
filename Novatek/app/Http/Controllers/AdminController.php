<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Shipping;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use Barryvdh\DomPDF\PDF;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin/login');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function create_product(){
        $this->AuthLogin();
        return view('admin.product.create_product');
    }
    public function login(){
        return view('admin.login.login');
    }
    
    public function view_user(){
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $users = Users::whereNotIn('user_id', [$admin_id])->get();
        return view('admin.users.view_user',compact('users'));
    }

    public function checkLogin(Request $request){
        $data = $request->all();
        $check = DB::table('users')->where('email',$data['admin_email'])->where('password',md5($data['admin_password']))->where('roles','0')->first();
        if($check){
            Session::put('admin_name',$check->name);
            Session::put('admin_id',$check->user_id);
            return Redirect::to('admin');
        }else{
            Session::put('message','Try again!');
            return Redirect::back();
        }
    }

    public function delete_user($user_id){
        Users::find($user_id)->delete();
        Session::put('message','Delete user successfully');
        return Redirect::to('admin/view_user');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('admin/login');
    }

    public function view_contact(){
        $this->AuthLogin();
        $contacts = DB::table('contact')->get();
        return view('admin.view_contact',compact('contacts'));
    }

    public function view_order(){
        $this->AuthLogin();
        $invoices = Invoice::paginate(10);
        return view('admin.order.view_order',compact('invoices'));
    }

    public function invoice_details($invoice_id){
        $invoice_details = InvoiceDetails::where('invoice_id',$invoice_id)->get();
        $invoices = Invoice::where('invoice_id',$invoice_id)->get();
        foreach($invoices as $key=>$invoice){
            $invoice_id = $invoice->invoice_id;
        }
        return view('admin.order.invoice_details',compact('invoice_details','invoices','invoice_id'));
    }

    public function print_invoice($invoice_id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_invoice_convert($invoice_id));
        return $pdf->stream();
    }

    public function print_invoice_convert($invoice_id){
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
        <h1><center>Công Ty TNHH Notavek</center></h1>
        <h3><center>Độc lập - Tự do - Hạnh phúc</center></h3>
        <div style="text-align:right">Order code: '.$invoice_code.'</div>
        <div>Receiver: '.$shipping->shipping_name.'<div>
        <div>Email: '.$shipping->shipping_email.'<div>
        <div>Address: '.$shipping->shipping_address.'<div>
        <div>Order date: '. $invoice_date.'<div>
        <div>Note: '.$shipping->shipping_note.'<div>
        <br><br>
        <h4><center>Invoice details</center></h4>
        <table border="1" class="table table-styling">
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
                    <td>'.$in_de->product_name.'</td>
                    <td><img style="width:50px;height:50px" src="images/product/'.$in_de->product_image.'" alt="'.$in_de->product_name.'"></td>
                    <td>'.$in_de->quantity.'</td>
                    <td>$'.$in_de->subtotal.'</td>
                    <td>$'.$in_de->subtotal * $in_de->quantity .'</td>
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
        $output .= '</div><br></br>
        <div style="margin-top:50px">
        <span style="margin-left:50px" >Vote maker</span>
        <span style="margin-left:350px">Receiver </span></div>';

        return $output;
    }



}
