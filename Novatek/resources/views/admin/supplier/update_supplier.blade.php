@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">SUPPLIER / EDIT</div>
<h2 class="text-center">EDIT SUPPLIER</h1>

<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_supplier/'.$suppliers->supplier_id)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
            <label>Name</label>
            <input type="text" name="supplier_name" class="form-control" style="width:650px" value="{{$suppliers->supplier_name}}">
        </div>
        <div class="form-group" style="margin-top:50px">
            <label>Address</label>
            <input type="text" name="supplier_address" class="form-control" style="width:650px" value="{{$suppliers->supplier_address}}">
        </div>
        <div class="form-group" style="margin-top:50px">
            <label>Phone</label>
            <input type="text" name="supplier_phone" class="form-control" style="width:650px" value="{{$suppliers->supplier_phone}}">
        </div>
            <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="update_cate">
    </form>
</div>

@endsection