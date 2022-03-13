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
<h2 class="text-center">CREATE NEW CPU </h1>
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
                        Socket
                       <select name="cpu_socket" class="form-control"style="width:200px">
                        <optgroup label="Intel">Intel
                            <option value="LGA775">LGA775</option>
                            <option value="LGA 1150">LGA 1150</option>
                            <option value="LGA 1151-V1">LGA 1151-V1</option>
                            <option value="LGA 1151-V2">LGA 1151-V2</option>
                            <option value="LGA1155">LGA1155</option>
                            <option value="LGA1200">LGA1200</option>
                            <option value="LGA 1366">LGA 1366</option>
                            <option value="LGA 1700">LGA 1700</option>
                            <option value="FCLGA2066">FCLGA2066</option>
                        </optgroup>
                        <optgroup label="AMD">AMD
                            <option value="AMD FM2+">AMD FM2+</option>
                            <option value="AMD sTRX4">AMD sTRX4</option>
                            <option value="AM3">AM3</option>
                            <option value="AM4">AM4</option>
                        </optgroup>
                       </select>
                   </div>
                <div class="form-group">
                    GPU integration
                    <input type="text" name="cpu_gpu_integration" class="form-control" style="width:200px">
               </div>
               <div class="form-group">
                    Core
                    <select name="cpu_core" class="form-control"style="width:200px">
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                        <option value="14">14</option>
                        <option value="16">16</option>
                    </select>
                </div>
                <div class="form-group">
                    Thread
                    <select name="cpu_thread" class="form-control"style="width:200px">
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="20">20</option>
                        <option value="24">24</option>
                        <option value="28">28</option>
                    </select>
                </div>
                <div class="form-group">
                    Cache
                    <select name="cpu_cache" class="form-control"style="width:200px">
                        <option value="256KB">256KB</option>
                        <option value="512KB">512KB</option>
                        <option value="1MB">1MB</option>
                        <option value="2MB">2MB</option>
                        <option value="3MB">3MB</option>
                        <option value="4MB">4MB</option>
                        <option value="6MB">6MB</option>
                        <option value="8MB">8MB</option>
                        <option value="9MB">9MB</option>
                        <option value="10MB">10MB</option>
                        <option value="12MB">12MB</option>
                        <option value="16MB">16MB</option>
                        <option value="32MB">32MB</option>
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