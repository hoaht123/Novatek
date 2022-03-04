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

                    @if($pro->spec_cpu != null)
                     <li>Speed : {{$pro->cpu->cpu_speed}}</li>
                     <li>Core : {{$pro->cpu->cpu_core}}</li>
                     <li>Socket: {{$pro->cpu->cpu_socket}}</li>
                     <li>Thread: {{$pro->cpu->cpu_thread}}</li>
                     <li>Cache : {{$pro->cpu->cpu_cache}}</li>
                    @endif

                    @if($pro->spec_keyboard != null)
                     <li>Quantity : {{$pro->keyboard->keyboard_qty}}</li>
                     <li>Wireless : {{$pro->keyboard->keyboard_wireless}}</li>
                     <li>Color: {{$pro->keyboard->keyboard_color}}</li>
                     <li>Switch: {{$pro->keyboard->keyboard_switch}}</li>
                    @endif

                    @if($pro->spec_vga != null)
                     <li>Memory : {{$pro->vga->gpu_memory}}</li>
                     <li>Output ports : {{$pro->vga->Output_Ports}}</li>
                     <li>Type: {{$pro->vga->gpu_type}}</li>
                     <li>Speed: {{$pro->vga->gpu_speed}}</li>
                    @endif

                    @if($pro->spec_psu != null)
                     <li>Power : {{$pro->psu->psu_power}}</li>
                     <li>Efficiency : {{$pro->psu->psu_efficiency}}</li>
                     <li>Type: {{$pro->psu->psu_type}}</li>
                    @endif

                    @if($pro->spec_storage != null)
                    <li>Type : {{$pro->storage->storage_type}}</li>
                    <li>Capacity : {{$pro->storage->storage_capacity}}</li>
                    <li>Speed: {{$pro->storage->storage_speed}}</li>
                    <li>Size: {{$pro->storage->storage_size}}</li>
                    @endif

                    @if($pro->spec_motherboard != null)
                    <li>Size : {{$pro->motherboard->Size}}</li>
                    <li>Socket : {{$pro->motherboard->Socket}}</li>
                    <li>Memory: {{$pro->motherboard->Memory}}</li>
                    @endif

                    @if($pro->spec_headphone != null)
                    <li>Type : {{$pro->headphone->headphone_type}}</li>
                    <li>Wireless : {{$pro->headphone->headphone_wireless}}</li>
                    <li>Mirco: {{$pro->headphone->headphone_micro}}</li>
                    @endif

                    @if($pro->spec_mouse != null)
                    <li>Type : {{$pro->mouse->mouse_type}}</li>
                    <li>Wireless : {{$pro->mouse->mouse_wireless}}</li>
                    <li>DPI: {{$pro->mouse->mouse_dpi}}</li>
                    @endif


            </ul>
            <div style="font-size:20px">Descriptions : </div>
            <div>{!! $pro->product_descriptions !!}</div>
            <div style="font-size:20px">Sort Descriptions : </div>
            <div>{!! $pro->product_sort_descriptions !!}</div>
        </div>
    </div>
</div>
@endforeach
@endsection