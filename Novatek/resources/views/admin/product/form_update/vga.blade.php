@extends('admin.admin_layout')
@section('admin-content')
<h2 class="text-center">UPDATE VGA </h1>
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
                    Vram
                    <select name="vga_vram" class="form-control"style="width:200px">
                        <option {{ $vga->vga_vram=='1GB'? 'selected="selected"': ''}} value="1GB">1GB</option>
                        <option {{ $vga->vga_vram=='2GB'? 'selected="selected"': ''}} value="2GB">2GB</option>
                        <option {{ $vga->vga_vram=='3GB'? 'selected="selected"': ''}} value="3GB">3GB</option>
                        <option {{ $vga->vga_vram=='6GB'? 'selected="selected"': ''}} value="6GB">6GB</option>
                        <option {{ $vga->vga_vram=='8GB'? 'selected="selected"': ''}} value="8GB">8GB</option>
                        <option {{ $vga->vga_vram=='12GB'? 'selected="selected"': ''}} value="12GB">12GB</option>
                        <option {{ $vga->vga_vram=='16GB'? 'selected="selected"': ''}} value="16GB">16GB</option>
                    </select>
                </div>
                <div class="form-group">
                    Graphics card 
                   <input type="text" name="vga_graphics" class="form-control"style="width:200px" value="{{ $vga->vga_graphics }}">
               </div>
               <div class="form-group">
                    LED
                    <select name="vga_led" class="form-control"style="width:200px">
                        <option {{ $vga->vga_led=='No'?'selected="selected"': ''}} value="No">No</option>
                        <option {{ $vga->vga_led=='Single'?'selected="selected"': ''}} value="Single">Single</option>
                        <option {{ $vga->vga_led=='RGB'?'selected="selected"': ''}} value="RGB">RGB</option>
                    </select>
                </div>
                <div class="form-group">
                    Bandwith
                    <select name="vga_bandwidth" class="form-control"style="width:200px">
                        <option {{ $vga->vga_bandwidth=='64-bit' ? 'selected="selected"' : '' }} value="64-bit">64-bit</option>
                        <option {{ $vga->vga_bandwidth=='128-bit' ? 'selected="selected"' : '' }} value="128-bit">128-bit</option>
                        <option {{ $vga->vga_bandwidth=='192-bit' ? 'selected="selected"' : '' }} value="192-bit">192-bit</option>
                        <option {{ $vga->vga_bandwidth=='256-bit' ? 'selected="selected"' : '' }} value="256-bit">256-bit</option>
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