@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">BRAND / EDIT</div>
<h2 class="text-center">EDIT BRAND</h1>

<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/saveUpdate_brand/'.$brand->brand_id)}}" method="post">
        @csrf
        <div class="form-group" style="margin-top:50px">
            <label>Name</label>
            <input type="text" name="brand_name" class="form-control" style="width:650px" value="{{$brand->brand_name}}">
            </div>
            <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="update_cate">
    </form>
</div>

@endsection