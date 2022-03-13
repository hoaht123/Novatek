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
<h2 class="text-center">CREATE NEW MOTHERBOARD </h1>
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
                    Size
                    <select name="motherboard_size" class="form-control"style="width:200px">
                        <option value="ATX">ATX</option>
                        <option value="MicroATX">MicroATX</option>
                        <option value="Mini-ITX">Mini-ITX</option>
                    </select>
                </div>
                <div class="form-group">
                    Socket
                   <select name="motherboard_socket" class="form-control"style="width:200px">
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
                    Chipset
                   <select name="motherboard_chipset" class="form-control"style="width:200px">
                    <optgroup label="Intel">Intel
                        <option value="B85">B85</option>
                        <option value="B150">B150</option>
                        <option value="B250">B250</option>
                        <option value="B360">B360</option>
                        <option value="B365">B365</option>
                        <option value="B560">B560</option>
                        <option value="G31">G31</option>
                        <option value="H61">H61</option>
                        <option value="H81">H81</option>
                        <option value="H110">H110</option>
                        <option value="H310">H310</option>
                        <option value="H510">H510</option>
                        <option value="X299">X299</option>
                        <option value="X570">X570</option>
                        <option value="Z170">Z170</option>
                        <option value="Z270">Z270</option>
                        <option value="Z390">Z390</option>
                        
                    </optgroup>
                    <optgroup label="AMD">AMD
                        <option value="A520">A520</option>
                        <option value="A68">A68</option>
                        <option value="A320">A320</option>
                        <option value="B350">B350</option>
                        <option value="B450">B450</option>
                        <option value="B550">B550</option>
                        <option value="X470">X470</option>
                        <option value="X570">X570</option>
                        <option value="TRX40">TRX40</option>                     
                    </optgroup>
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