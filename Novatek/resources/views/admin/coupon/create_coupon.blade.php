@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">COUPON / CREATE</div>
<h2 class="text-center">CREATE COUPON</h1>
        <?php
            $i = 1;
            $check_coupon = Session::get('check_coupon');
            if($check_coupon){
                echo '<script>alert("'.$check_coupon.'");</script>';
                Session::put('check_coupon', null);
            }
        ?>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_coupon')}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:30px">
            <label>Name</label>
            <input type="text" name="coupon_name" value="{{old('coupon_name')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Code</label>
            <input type="text" name="coupon_code" value="{{old('coupon_code')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Quantity</label>
            <input type="text" name="coupon_quantity" value="{{old('coupon_quantity')}}" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:30px">
            <label>Options</label>
            <select name="coupon_options" class="form-control"style="width:650px">
                <option value="">-----Choose----</option>
                <option value="Percent">Percent</option>
                <option value="Cash">Cash</option>
            </select>
        </div>
        <div class="form-group" style="margin-top:20px">
            <label>Value</label>
            <input type="text" name="coupon_value" value="{{old('coupon_value')}}" class="form-control" style="width:650px">
        </div>
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection