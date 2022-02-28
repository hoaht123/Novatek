@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">INVOICES / DETAILS</div>
<h2 class="text-center">INFORMATION SHIPPING</h1>
    
<div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
            <th>STT</th>
            <th>Shipping name</th>
            <th>Shipping phone</th>
            <th>Shipping email</th>
            <th>Shiping address</th>
            <th>Shipping note</th>
            <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $i = 1;
            ?>
            
            @foreach($invoices as $key=>$invoice)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$invoice->shipping->shipping_name}}</td>
                <td>{{$invoice->shipping->shipping_phone}}</td>
                <td>{{$invoice->shipping->shipping_email}}</td>
                <td>{{$invoice->shipping->shipping_address}}</td>
                <td>{{$invoice->shipping->shipping_note}}</td>
                <td>{{$invoice->shipping->created_at}}</td>
            </tr> 
            @endforeach
        
      </tbody>
    </table>
  </div>
  <h2 class="text-center">INVOICE DETAILS</h1>
  <div class="table-responsive" style="margin-top:50px; text-align:center">
    <table class="table table-striped b-t b-light">
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
      <tbody>
        <?php
            $i = 1;
            $total = 0;
            ?>
            @foreach($invoice_details as $key=>$in_de)
            @php
            $total += $in_de->quantity *$in_de->subtotal;
            @endphp
            <tr>
                <td>{{$i++}}</td>
                <td>{{$in_de->product_name}}</td>
                <td><img style="width:100px;heigh:100px" src="{{asset('images/product/'.$in_de->product_image)}}" alt=""></td>
                <td>{{$in_de->quantity}}</td>
                <td>${{$in_de->subtotal}}</td>
                <td>${{$in_de->subtotal * $in_de->quantity}}</td>
            </tr> 
            @endforeach
            <tr>
                <td>Total order: </td>
                <td><td><td><td><td>${{$total}}</td></td></td></td></td>
            </tr>
      </tbody>
    </table>
  </div>
  @endsection