@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">INVOICES / VIEW</div>
<h2 class="text-center">VIEW INVOICES</h1>
<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Code</th>
            <th>Customer</th>
            <th>Shipping name</th>
            <th>Quantity</th>
            <th>Coupon code</th>
            <th>Total</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            $message = Session::get('message');
            if($message){
                echo '<script>alert("'.$message.'");</script>';
                Session::put('message', null);
            }
            ?>
            
            @foreach($invoices as $key=>$invoice)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$invoice->invoice_code}}</td>
                <td>{{$invoice->user->name}}</td>
                <td>{{$invoice->shipping->shipping_name}}</td>
                <td>{{$invoice->quantity}}</td>
                <td>{{$invoice->coupon_code}}</td>
                <td>${{$invoice->total}}</td>
                <td>
                  @if($invoice->invoice_status == 'Paid')
                 <span class="badge badge-success">{{$invoice->invoice_status}}</span>
                  @else
                  <a href="{{URL::to('admin/change_status_invoice/'.$invoice->invoice_id)}}"><span class="badge badge-primary">{{$invoice->invoice_status}}</span></a>
                  @endif
                </td>
                <td>
                  @if($invoice->payment == 'Paypal')
                  <i style="color:orange;font-size:30px" class="fa-brands fa-cc-paypal"></i>
                  @elseif($invoice->payment == 'Momo')
                  <img style="width:30px;height:30px;margin-bottom:-10px" src="{{ asset('images/icons/momo_icons.jpeg')}}"alt="">
                  @else
                  <i style="color:green;font-size:30px" class="fa-solid fa-money-bill-1-wave"></i>
                  @endif
                </td>
                <td>{{$invoice->created_at}}</td>
                <td><a href="{{URL::to('admin/invoice_details/'.$invoice->invoice_id)}}"><i style="font-size:25px" class="fa fa-clipboard"></i></a></td>
            </tr> 
            @endforeach
      </tbody>
    </table>
    {{ $invoices->links('vendor.custom_pagination') }}
  </div>
  @endsection