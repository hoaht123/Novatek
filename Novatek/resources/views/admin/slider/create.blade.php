@extends('admin.admin_layout')
@section('admin-content')
<h2 class="text-center">Add image slider </h1>
<div class="container" style="margin-left: 300px">
    <?php
    if(!empty($message)){
                echo '<script>alert("'.$message.'");</script>';
        }
            ?>
    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            Name
            <input type="text"  name="name" class="form-control" style="width:350px">
            <input type="hidden"  name="_method" value="POST" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Main Image<br>
            <input type="file"  name="image" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Product ID
            <input type="text"  name="product_id" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Description<br>
            <textarea   rows="3" cols="60" name="description"></textarea>
        </div>
        
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info" name="create">
    </form>
</div>
@endsection