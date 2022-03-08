@extends('admin.admin_layout')
@section('admin-content')
<h2 class="text-center">Edit image slider </h1>
<div class="container" style="margin-left: 300px">
    <form action="{{ route('slider.update',['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $slider->id }}">
        <div class="form-group">
            Name
            <input type="text" value="{{ $slider->name }}" name="name" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Main Image<br>
            <img src="{{asset('images/sliders/'.$slider->image)}}" style="width:350px; height:100px" alt="">
            <input type="file"  name="image" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Product ID
            <input type="text" value="{{ $slider->product_id }}" name="product_id" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Description<br>
            <textarea   rows="3" cols="60" name="description">{{ $slider->description}}</textarea>
        </div>
        
        <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info" name="update">
    </form>
</div>
@endsection