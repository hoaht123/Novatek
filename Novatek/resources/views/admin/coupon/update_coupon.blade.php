@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">COUPON / CREATE</div>
<h2 class="text-center">CREATE COUPON</h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_coupon/'.$coupons->voucher_id)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:30px">
            <label>Name</label>
            <input type="text" name="coupon_name" value="{{$coupons->voucher_name}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Code</label>
            <input type="text" name="coupon_code" value="{{$coupons->voucher_code}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Quantity</label>
            <input type="text" name="coupon_quantity" value="{{$coupons->voucher_quantity}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Options</label>
            <select name="coupon_options" class="form-control"style="width:650px">
                @if($coupons->voucher_options == 'Percent')
                <option selected value="{{$coupons->voucher_options}}">{{$coupons->voucher_options}}</option>
                <option value="Cash">Cash</option>
                @else
                <option selected value="{{$coupons->voucher_options}}">{{$coupons->voucher_options}}</option>
                <option value="Percent">Percent</option>
                @endif
            </select>
        </div>
        <div class="form-group" style="margin-top:20px">
            <label>Value</label>
            <input type="text" name="coupon_value" value="{{$coupons->voucher_value}}" class="form-control" style="width:650px">
        </div>
        <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection