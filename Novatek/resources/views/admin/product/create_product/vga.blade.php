@extends('admin.admin_layout')
@section('admin-content')
        <div class="dropdown show ">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Choose component
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('create_motherboard')}}">Motherboard</a>
                <a class="dropdown-item" href="{{route('create_cpu')}}">CPU</a>
                <a class="dropdown-item" href="{{route('create_ram')}}">RAM</a>
                <a class="dropdown-item" href="{{route('create_vga')}}">VGA</a>
                <a class="dropdown-item" href="{{route('create_storage')}}">SSD/HDD</a>
                <a class="dropdown-item" href="{{route('create_psu')}}">PSU</a>
                <a class="dropdown-item" href="{{route('create_mouse')}}">Mouse</a>
                <a class="dropdown-item" href="{{route('create_keyboard')}}">Keyboard</a>
                <a class="dropdown-item" href="{{route('create_headphone')}}">Headphone</a>
            </div>
        </div>
<h2 class="text-center">CREATE NEW VGA </h1>
<div class="container">
    <form action="{{URL::to('admin/save_product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    Name
                    <input type="text" name="product_name" class="form-control" style="width:350px">
                </div>           
                <div class="form-group">
                        Category
                        <select name="category" class="form-control"style="width:200px">
                            <option value="">-----Choose-----</option>
                            @foreach($category as $cate)
                            <option value="{{$cate->category_id}}">{!! $cate->parent_id ==0? $cate->category_name : '&nbsp;&nbsp;&nbsp;&nbsp;'.$cate->category_name !!}</option>
                            @endforeach
                            {{-- {!! $htmlOption !!} --}}
                        </select>
                </div>
                <div class="form-group" >
                    Brand
                    <select name="brand" class="form-control"style="width:200px">
                        <option value="">-----Choose-----</option>
                        @foreach($brand as $key=>$bra)
                            <option value="{{$bra->brand_id}}"> {{$bra->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="form-group">
                    Supplier
                    <select name="supplier" class="form-control"style="width:200px">
                        <option value="">-----Choose-----</option>
                        @foreach($supplier as $key=>$sup)
                            <option value="{{$sup->supplier_id}}"> {{$sup->supplier_name}}</option>
                        @endforeach
                     </select>
                </div>
                {{-- spec type --}}
                <div class="form-group">
                    Vram
                    <select name="vga_vram" class="form-control"style="width:200px">
                        <option value="1GB">1GB</option>
                        <option value="2GB">2GB</option>
                        <option value="3GB">3GB</option>
                        <option value="6GB">6GB</option>
                        <option value="8GB">8GB</option>
                        <option value="12GB">12GB</option>
                        <option value="16GB">16GB</option>
                    </select>
                </div>
                <div class="form-group">
                    Graphics card 
                   <input type="text" name="vga_graphics" class="form-control"style="width:200px">
               </div>
               <div class="form-group">
                    LED
                    <select name="vga_led" class="form-control"style="width:200px">
                        <option value="No">No</option>
                        <option value="Single">Single</option>
                        <option value="RGB">RGB</option>
                    </select>
                </div>
                <div class="form-group">
                    Bandwith
                    <select name="vga_bandwidth" class="form-control"style="width:200px">
                        <option value="64-bit">64-bit</option>
                        <option value="128-bit">128-bit</option>
                        <option value="192-bit">192-bit</option>
                        <option value="256-bit">256-bit</option>
                    </select>
                </div>
                {{-- end spec type --}}
            </div>
            <div class="col">
                <div class="form-group">
                    Price
                    <input type="text" name="product_price" class="form-control" style="width:350px">
                </div>
                <div class="form-group" >
                    SKU
                    <input type="text" name="product_sku" class="form-control" style="width:350px">
                </div>
                Description
                <div class="form-group">
                    <textarea   rows="5" cols="60" name="product_description"></textarea>
                </div>
                Sort Description
                <div class="form-group">
                    <textarea   rows="5" cols="60" name="product_sort_description"></textarea>
                </div>
                <div class="form-group">
                    Main Image
                    <input type="file" name="product_image_main" class="form-control" style="width:350px">
                </div>
                <div class="form-group">
                    Gallery Image
                    <input type="file" name="product_image_gallery" class="form-control" style="width:350px">
                </div>
            </div>
        </div>
        
        <input style="margin-top:20px" type="submit" value="Create" class="btn btn-info btn-lg btn-block" name="create_cate">
    </form>
</div>
@endsection