@extends('admin.admin_layout')
@section('admin-content')
<div style="margin-top:20px;font-weight:bold">PRODUCT / EDIT</div>
<h2 class="text-center">EDIT PRODUCT </h1>
<div class="container" style="margin-left: 300px">
    <form action="{{URL::to('admin/save_update_product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group" style="margin-top:20px">
        Name
        <input type="text" value="{{ $product->product_name}}" name="product_name" class="form-control" style="width:350px">
        </div>
        
        <div class="form-group">
            Category
            <select name="category" class="form-control"style="width:200px">
                <option value="">-----Choose-----</option>
                {!! $htmlOption !!}
            </select>
        </div>
        <div class="form-group" >
            Brand
            <select  name="brand" class="form-control"style="width:200px">
                @foreach($brands as $key=>$brand)
                @if($product->product_id == $brand->brand_id)
                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                @else
                <option value="{{$brand->brand_id}}"> {{$brand->brand_name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            Supplier
            <select name="supplier" class="form-control"style="width:200px">
                @foreach($suppliers as $key=>$supplier)
                @if($product->product_id == $supplier->supplier_id)
                <option selected value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                @else
                <option value="{{$supplier->supplier_id}}"> {{$supplier->supplier_name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            Price
            <input type="text" value="{{ $product->product_price}}" name="product_price" class="form-control" style="width:350px">
        </div>
        <div class="form-group" >
            SKU
            <input type="text" value="{{ $product->product_sku}}" name="product_sku" class="form-control" style="width:350px">
        </div>
        Description
        <div class="form-group">
            <textarea   rows="5" cols="60" name="product_description">{{ $product->product_descriptions}}</textarea>
        </div>
        Sort Description
        <div class="form-group">
            <textarea   rows="5" cols="60" name="product_sort_description">{{ $product->product_sort_descriptions}}</textarea>
        </div>
        <div class="form-group">
            Main Image
            <img src="{{asset('images/product/'.$product->product_main_image)}}" style="width:100px; height:100px" alt="">
            <input type="file"  name="product_image_main" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Gallery Image
            <img src="{{asset('images/product/'.$product->product_image_gallery)}}" style="width:100px; height:100px" alt="">
            <input type="file"  name="product_image_gallery" class="form-control" style="width:350px">
        </div>
        <div class="form-group">
            Hot
            <select  name="isHot" class="form-control"style="width:200px">
                <option value="0">Normal</option>
                <option value="1">Hot</option>
            </select>
        </div>
        <div class="form-group">
            New
            <select  name="isNew" class="form-control"style="width:200px">
                <option value="0">Old</option>
                <option value="1">New</option>
            </select>
        </div>
        <div class="form-group">
            Stock
            <select  name="stock" class="form-control"style="width:200px">
                <option value="0">In stock</option>
                <option value="1">Out stock</option>
            </select>
        </div> 
        <input style="margin-top:20px" type="submit" value="Edit" class="btn btn-info" name="create_cate">
    </form>
</div>
@endsection