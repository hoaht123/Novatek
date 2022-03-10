<div class="col-md-3 col-md-pull-9">
    <div class="h4 col-xs-b10">popular categories</div>
    <ul class="categories-menu transparent">
        @foreach($categories as $category)
            <li>
                <a href="{{route('category_sidebar_clicked',$category->category_id)}}">{{ $category->category_name }}</a>
                <div class="toggle"></div>
                <ul>
                    @foreach($category->categoryChildren as $categoryChild)                          
                    <li>
                        <a href="{{route('category_sidebar_clicked',$categoryChild->category_id)}}">{{ $categoryChild->category_name }}</a>          
                    </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Price</div>
    {{-- <div class="price-filter">
        <label id="price-filter">
            <button class="btn" min = "0" max= "100" style ="width: 200px" name="btn-brand">0-100$</button>
            <button class="btn" min = "100" max= "200" style ="width: 200px" name="btn-brand">100-200$</button>
            <button class="btn" min = "200" max= "300" style ="width: 200px" name="btn-brand">200-300$</button>
            <button class="btn" min = "300" max= "400" style ="width: 200px" name="btn-brand">300-400$</button>
        </label>
            <div class="empty-space col-xs-b10"></div>
    </div> --}}
    <div id="prices-range"></div>
    <div class="simple-article size-1">PRICE: <b class="grey">$<span class="min-price">1</span> - $<span class="max-price">1000</span></b></div>
    {{-- <div>
        <label for="volume">PRICE:</label>
        <input type="range " id="volume" name="volume"
               min="0" max="1000">
      </div> --}}

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25" id="check-brand">Brands</div>
    @foreach($brands as $brand)
    <label class="checkbox-entry">
    <button class="btn" value = "{{ $brand->brand_id}}" style ="width: 200px" name="btn-brand">{{ $brand->brand_name}}</button>
        {{-- <input type="checkbox" value = "{{ $brand->brand_id}}"><span>{{ $brand->brand_name}}</span> --}}
    </label>
        <div class="empty-space col-xs-b10"></div>
    @endforeach

    <div class="empty-space col-xs-b25 col-sm-b50"></div>

    <div class="h4 col-xs-b25">Popular Tags</div>
    <div class="tags light clearfix">
        @php 
            $category = App\Models\Category::all();
        @endphp
        @foreach($category as $cate)
        <a class="tag" href="{{ route('client.tag_clicked',['category_id'=>$cate->category_id])}}">{{ $cate->category_name }}</a>
        @endforeach
    </div>

    <div class="empty-space col-xs-b25 col-sm-b50"></div>


</div>