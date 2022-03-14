<div class="row">
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            $hots = DB::select('select product.product_id, AVG(invoice_details.quantity) as quantity from product  join invoice_details on product.product_id = invoice_details.product_id group by product.product_id order by quantity desc limit 3');
            $id = array();
            for ($i=0; $i < count($hots); $i++) {
                $id[$i] = $hots[$i]->product_id;
            }
            $hotSales = DB::table('product')->whereIn('product_id',$id)->get();
        @endphp
        <div class="h4 col-xs-b25">Hot Sales</div>
        @foreach($hotSales as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}"><img src="{{ asset('images/product/'.$product->product_main_image)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->product_name}}</a></h6>
                <div class="simple-article dark">${{$product->product_price}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            $ratings = DB::select('select product.product_id, AVG(review.rating) as rating from product  join review on product.product_id = review.product_id group by product.product_id order by rating desc limit 3');
            $id = array();
            for ($i=0; $i < count($ratings); $i++) {
                $id[$i] = $ratings[$i]->product_id;
            }
            $topRating = DB::table('product')->whereIn('product_id',$id)->get();
        @endphp
        <div class="h4 col-xs-b25">Top Rated</div>
        @foreach ($topRating as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}"><img src="{{ asset('images/product/'.$product->product_main_image)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->product_name}}</a></h6>
                <div class="simple-article dark">${{$product->product_price}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            // $key = DB::select('select product.product_id, AVG(invoice_details.quantity) as quantity from product  join invoice_details on product.product_id = invoice_details.product_id group by product.product_id order by quantity desc limit 3');
            // $id = array();
            // for ($i=0; $i < count($key); $i++) {
            //     $id[$i] = $key[$i]->product_id;
            // }
            $popular = DB::select(' select * from product where product_price between 100 and 300 order by product_price asc limit 3');
        @endphp
        <div class="h4 col-xs-b25">popular</div>
        @foreach($popular as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}"><img src="{{ asset('images/product/'.$product->product_main_image)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->product_name}}</a></h6>
                <div class="simple-article dark">${{$product->product_price}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
    <div class="col-sm-6 col-md-3 col-xs-b25">
        @php
            $choices = DB::select('select product.product_id, AVG(invoice_details.quantity) as quantity from product  join invoice_details on product.product_id = invoice_details.product_id group by product.product_id order by quantity desc limit 3');
            $id = array();
            for ($i=0; $i < count($choices); $i++) {
                $id[$i] = $choices[$i]->product_id;
            }
            $bestChoices = DB::table('product')->whereIn('product_id',$id)->get();
        @endphp
        <div class="h4 col-xs-b25">Best Choice</div>
        @foreach($bestChoices as $product)
        <div class="product-shortcode style-4 rounded clearfix">
            <a class="preview" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}"><img src="{{ asset('images/product/'.$product->product_main_image)}}" alt="" /></a>
            <div class="description">
                <div class="simple-article color size-1 col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->component}}</a></div>
                <h6 class="h6 col-xs-b10"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product->product_name}}</a></h6>
                <div class="simple-article dark">${{$product->product_price}}.00</div>
            </div>
        </div>
        <div class="col-xs-b10"></div>
        @endforeach
    </div>
</div>