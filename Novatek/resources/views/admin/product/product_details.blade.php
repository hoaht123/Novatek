@extends('admin.admin_layout')
@section('admin-content')
@foreach($product as $key=>$pro)
<div style="margin-top:20px;font-weight:bold">PRODUCT / DETAILS / {{$pro->product_name}}</div>
<h2 class="text-center" style="margin-top:20px">PRODUCT INFORMATION</h2>
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                   <p>MAIN :</p>
                    <img src="{{asset('images/product/'.$pro->product_main_image)}}" alt="{{$pro->product_name}}" style="width:300;height:300px"" alt="">
                </div>
                <div class="col-lg-12">
                    <p>GALLERY :</p>
                    <img src="{{asset('images/product/'.$pro->product_image_gallery)}}" alt="{{$pro->product_name}}" style="width:300;height:300px">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="title" style="font-size: 30px;font-weight:bold">{{$pro->product_name}}</div>
            <div style="font-size:20px">Sku : {{$pro->product_sku}}</div>
            <div style="font-size:20px">Category : {{$pro->categories->category_name}}</div>
            <div style="font-size:20px">Brand : {{$pro->brands->brand_name}}</div>
            <div style="font-size:20px">Price : {{number_format($pro->product_price).' VNĐ    '}}</div>
            SPEC
            <ul>
                    @if($pro->spec_ram != null)
                     <li>Memory sie : {{$pro->ram->memory_size}}</li>
                     <li>Ram type : {{$pro->ram->ram_type}}</li>
                     <li>Bandwidth: {{$pro->ram->ram_bandwidth}}</li>
                     <li>Speed : {{$pro->ram->ram_speed}}</li>
                    @endif
            </ul>
            <div style="font-size:20px">Descriptions : </div>
            <div>{{$pro->product_descriptions}}</div>
            <div style="font-size:20px">Sort Descriptions : </div>
            <div>{{$pro->product_sort_descriptions}}</div>
        </div>
    </div>
</div>
@endforeach
@endsection