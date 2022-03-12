@extends('client.layouts.master')
@section('title')
    <title>Products</title>
@endsection
@section('content')

    <div class="header-empty-space"></div>

    <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="{{ route('client.home')}}">home</a>
                <a href="{{ route('client.products')}}">products</a>
                @if(!empty($title))
                <a>{{$title}}</a>
                @endif
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b20"></div>
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="align-inline spacing-1">
                        <div class="h4">All products</div>
                    </div>
                    <div class="align-inline spacing-1">
                        
                    </div>
                    <div  class="align-inline spacing-1 filtration-cell-width-1 d-inline-flex">
                    </div>
                    <div class="align-inline spacing-1">
                        <div class="simple-article size-1">TOTAL: <b class="grey">{{$total}}</b> RESULTS</div>
                    </div>
                    <div class="align-inline spacing-1">
                        {{$products->links()}}
                    </div>


                    <div class="empty-space col-xs-b25 col-sm-b60"></div>

                    <div class="products-content">
                        <div class="products-wrapper">
                            <div class="row nopadding">
                                @foreach($products as $product)
                                    <div class="col-sm-4 brand-{{$product->brand_id}}">
                                        <form>
                                           @csrf
                                           <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                           <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                           <input type="hidden" value="{{$product->product_main_image}}" class="cart_product_image_{{$product->product_id}}">
                                           <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                           <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                            <div class="product-shortcode style-1">
                                                <div class="title">
                                                    <div class="simple-article size-1 color col-xs-b5"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product ->product_name}}</a></div>
                                                    <div class="h6 animate-to-green"><a href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">{{$product ->product_name}}</a></div>
                                                </div>
                                                <div class="preview">
                                                    <img src="{{asset('images/product/'.$product->product_main_image)}}" alt="">
                                                    <div class="preview-buttons valign-middle">
                                                        <div class="valign-middle-content">
                                                            <a class="button size-2 style-2" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">
                                                                <span class="button-wrapper">
                                                                    <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                                    <span class="text">Learn More</span>
                                                                </span>
                                                            </a>
                                                            @if(Session::get('user_id') == true)
                                                            <a class="button size-2 style-3">
                                                                <span class="button-wrapper">
                                                                    <button type="button" class="add_to_cart" data-id="{{$product->product_id}}" name="add-to-cart"> <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span></button>
                                                                    <span class="text">Add To Cart</span>
                                                                </span>
                                                            </a>
                                                            @else
                                                            <a class="button size-2 style-3" href="{{URL::to('login')}}">
                                                                <span class="button-wrapper">
                                                                    <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                                    <span class="text">Add To Cart</span>
                                                                </span>
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <div class="simple-article size-4"><span class="color">${{$product->product_price}}.00</span>&nbsp;&nbsp;&nbsp;<span class=""></span></div>
                                                </div>
                                                <div class="description" style="margin-top:20px">
                                                    <div class="simple-article text size-2">{{$product->product_sort_descriptions}}</div>
                                                    <div class="icons">
                                                        <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                        <a class="entry open-popup" data-rel="3" data-id="{{$product->product_id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        <button  data-id="{{$product->product_id}}" name="add_wish_list_{{$product->product_id}}" class=" entry add_wish_list">
                                                            @include('client.components.in_wish_list')
                                                        </button> 
                                                    </div>
                                                </div>
                                            </div> 
                                        </form> 
                                    </div>
                                @endforeach
                            </div>        
                        </div>
                    </div>
                    <div class="empty-space col-xs-b35 col-sm-b0"></div>

                    {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}
                    <div class="empty-space col-md-b70"></div>
                </div>
                @include('client.components.product_sidebar')
            </div>
            @include('client.components.hot_product')
    </div>

    <div class="empty-space col-xs-b15 col-sm-b45"></div>
    <div class="empty-space col-md-b70"></div>

        <!-- FOOTER -->
    <div class="footer-form-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-xs-b10 col-lg-b0">
                        <div class="cell-view empty-space col-lg-b50">
                            <h3 class="h3 light">dont miss your chance</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-b10 col-lg-b0">
                        <div class="cell-view empty-space col-lg-b50">
                            <div class="simple-article size-3 light transparent">ONLY 200 PROMO CODES ON DISCOUNT!</div>
                        </div>

                    </div>
                    <?php
            $message_coupon = Session::get('message_coupon');
            if($message_coupon){
                echo '<script>alert("'.$message_coupon.'");</script>';
                Session::put('message_coupon', null);
            }
             ?>
                    <div class="col-lg-4">
                        <div class="single-line-form">
                            <form action="{{URL::to('get_coupon_promo')}}" method="post">
                                @csrf
                            <input class="simple-input light" type="text" name="user_mail" placeholder="Your email">
                            <div class="button size-2 style-1">
                                <span class="button-wrapper">
                                    <button type="submit"><span class="icon"><img src="client/img/icon-4.png" alt=""></span></button>
                                    <span class="text">submit</span>
                                </span>
                                <input type="submit" value="">
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
 @endsection

@section('js')

    <!-- range slider -->
    <script src="{{ asset('client/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('client/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            var minVal = parseInt($('.min-price').text());
            var maxVal = parseInt($('.max-price').text());

            $( "#prices-range" ).slider({
                range: true,
                min: minVal,
                max: maxVal,
                step: 5,
                values: [ minVal, maxVal ],
                slide: function( event, ui ) {
                    $('.min-price').text(ui.values[ 0 ]);
                    $('.max-price').text(ui.values[ 1 ]);
                }
            });
        });
        
    </script>
@endsection

