@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">SUPPLIER / CREATE</div>
<h2 class="text-center">CREATE SUPPLIER</h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_supplier')}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
        <label>Name</label>
        <input type="text" name="supplier_name" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:50px">
            <label>Address</label>
            <input type="text" name="supplier_address" class="form-control" style="width:650px">
        </div>
        <div class="form-group" style="margin-top:50px">
            <label>Phone</label>
            <input type="text" name="supplier_phone" class="form-control" style="width:650px">
        </div>
        
        
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create_supplier">
    </form>
</div>
@endsection