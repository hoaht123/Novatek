@extends('admin.admin_layout')
@section('admin-content')
<h2 class="text-center">UPDATE STORAGE </h1>
<div class="container">
    <form action="{{URL::to('admin/save_update_product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    Name
                    <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control" style="width:350px">
                </div>           
                <div class="form-group">
                        Category
                        <select name="category" class="form-control"style="width:200px">
                            <option value="">-----Choose-----</option>
                            @foreach($categories as $cate)
                            <option {{$product->category_id == $cate->category_id?'selected="selected"': ''}} value="{{$cate->category_id}}">{!! $cate->parent_id ==0? $cate->category_name : '&nbsp;&nbsp;&nbsp;&nbsp;'.$cate->category_name !!}</option>
                            @endforeach
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
                {{-- spec type --}}
                <div class="form-group">
                    Type
                   <select name="storage_type" class="form-control"style="width:200px">
                       <option {{$storage->storage_type == 'SSD'?'selected="selected"': ''}} value="SSD">SSD</option>
                       <option {{$storage->storage_type == 'HDD'?'selected="selected"': ''}} value="HDD">HDD</option>
                   </select>
               </div>
               <div class="form-group">
                Size
               <select name="storage_size" class="form-control"style="width:200px">
                   <option {{$storage->storage_type == '2.5inch'?'selected="selected"': ''}} value="2.5inch">2.5inch</option>
                   <option {{$storage->storage_type == '3.5inch'?'selected="selected"': ''}} value="3.5inch">3.5inch</option>
                   <option {{$storage->storage_type == 'M2.2280'?'selected="selected"': ''}} value="M2.2280">M2.2280</option>
               </select>
           </div>
               <div class="form-group">
                Capacity
               <select name="storage_size" class="form-control"style="width:200px">
                   <option {{$storage->storage_size == '120GB'?'selected="selected"': ''}} value="120GB">120GB</option>
                   <option {{$storage->storage_size == '128GB'?'selected="selected"': ''}} value="128GB">128GB</option>
                   <option {{$storage->storage_size == '240GB'?'selected="selected"': ''}} value="240GB">240GB</option>
                   <option {{$storage->storage_size == '250GB'?'selected="selected"': ''}} value="250GB">250GB</option>
                   <option {{$storage->storage_size == '256GB'?'selected="selected"': ''}} value="256GB">256GB</option>
                   <option {{$storage->storage_size == '500GB'?'selected="selected"': ''}} value="500GB">500GB</option>
                   <option {{$storage->storage_size == '1TB'?'selected="selected"': ''}} value="1TB">1TB</option>
                   <option {{$storage->storage_size == '2TB'?'selected="selected"': ''}} value="2TB">2TB</option>
               </select>
           </div>
                {{-- end spec type --}}
            </div>
            <div class="col">
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
            </div>
        </div>
        
        <input style="margin-top:20px" type="submit" value="Update" class="btn btn-info btn-lg btn-block" name="update">
    </form>
</div>
@endsection