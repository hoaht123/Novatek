@extends('admin.admin_layout')
@section('admin-content')

<h2 class="text-center">UPDATE PSU </h1>
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
                    Power
                   <select name="psu_power" class="form-control"style="width:200px">
                        <option {{$psu->psu_power == '300W'?'selected="selected"': ''}} value="300W">300W</option>
                        <option {{$psu->psu_power == '350W'?'selected="selected"': ''}} value="350W">350W</option>
                        <option {{$psu->psu_power == '400W'?'selected="selected"': ''}} value="400W">400W</option>
                        <option {{$psu->psu_power == '450W'?'selected="selected"': ''}} value="450W">450W</option>
                        <option {{$psu->psu_power == '500W'?'selected="selected"': ''}} value="500W">500W</option>
                        <option {{$psu->psu_power == '550W'?'selected="selected"': ''}} value="550W">550W</option>
                        <option {{$psu->psu_power == '600W'?'selected="selected"': ''}} value="600W">600W</option>
                        <option {{$psu->psu_power == '650W'?'selected="selected"': ''}} value="650W">650W</option>
                        <option {{$psu->psu_power == '700W'?'selected="selected"': ''}} value="700W">700W</option>
                        <option {{$psu->psu_power == '750W'?'selected="selected"': ''}} value="750W">750W</option>
                        <option {{$psu->psu_power == '1200W'?'selected="selected"': ''}} value="1200W">1200W</option>
                        <option {{$psu->psu_power == '1600W'?'selected="selected"': ''}} value="1600W">1200W</option>
                   </select>
               </div>
               <div class="form-group">
                Efficiency
                <select name="psu_efficiency" class="form-control"style="width:200px">
                    <option {{$psu->psu_power == 'KHT'?'selected="selected"': ''}} value="KHT">KHT</option>
                    <option {{$psu->psu_power == '80 PLUS'?'selected="selected"': ''}} value="80 PLUS">80 PLUS</option>
                    <option {{$psu->psu_power == '80 PLUS BROZEN'?'selected="selected"': ''}} value="80 PLUS BROZEN">80 PLUS BROZEN</option>
                    <option {{$psu->psu_power == '80 PLUS SLIVER'?'selected="selected"': ''}} value="80 PLUS SLIVER">80 PLUS SLIVER</option>
                    <option {{$psu->psu_power == '80 PLUS GOLD'?'selected="selected"': ''}} value="80 PLUS GOLD">80 PLUS GOLD</option>
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