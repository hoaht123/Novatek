@extends('client.layouts.master')
@section('title')
    <title>Detail</title>
@endsection

@section('content')
        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="{{ route('client.home')}}">home</a>
                <a href="{{ route('client.products')}}">product</a>
                <a href="#">{{ $product->product_name }}</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="row">
                        <form>
                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
                            <div class="main-product-slider-wrapper swipers-couple-wrapper">
                                <div class="swiper-container swiper-control-top">
                                   <div class="swiper-button-prev hidden"></div>
                                   <div class="swiper-button-next hidden"></div>
                                
                                   @csrf
                                   <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                   <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                   <input type="hidden" value="{{$product->product_main_image}}" class="cart_product_image_{{$product->product_id}}">
                                   <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                           
                                   <div class="swiper-wrapper">                                      
                                            <div class="swiper-slide">
                                                    {{-- <div class="swiper-lazy-preloader"></div> --}}
                                                    <div class="product-big-preview-entry " >
                                                        <img style="width:100%;height:60%" src="{{asset('images/product/'.$product->product_main_image)}}" alt="">
                                                    </div>
                                            </div>
                                            <div class="swiper-slide">
                                                {{-- <div class="swiper-lazy-preloader"></div> --}}
                                                <div class="product-big-preview-entry " >
                                                    <img style="width:100%;height:60%" src="{{{asset('images/product/'.$product->product_image_gallery)}}}" alt="">
                                                </div>
                                            </div>
                                   </div> 
                                                                                                    
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="simple-article size-3 grey col-xs-b5">{{$product->product_spec}}</div>
                            <div class="h3 col-xs-b25">{{$product->product_name}}</div>
                            <div class="row col-xs-b25">
                                <div class="col-sm-6">
                                    <div class="simple-article size-5 grey">PRICE: <span class="color">${{$product->product_price}}</span></div>        
                                </div>
                                <div class="col-sm-6 col-sm-text-right">
                                    <div class="rate-wrapper align-inline">
                                        @if($Avg_rating != 0)
                                        <div id="rateYo_product"></div>
                                        <input type="hidden" name="" id="rating_product" >
                                        @else
                                        <div id="rateYo_product_0"></div>
                                        <input type="hidden" name="" id="rating_product" >
                                        @endif
                                    </div>
                                    <div class="simple-article size-2 align-inline">{{$count_review}} Reviews</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span class="grey">{{$product->product_id}}</span></div>
                                </div>
                                <div class="col-sm-6 col-sm-text-right">
                                    <div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">{{$product->product_inStock==0?"out of stock":"in stock"}}</span></div>
                                </div>
                            </div>
                            <div class="simple-article size-3 col-xs-b30">{!!$product->product_descriptions!!}</div>
                            <div class="row col-xs-b40">
                                <div class="col-sm-6">
                                    <div class="h6 detail-data-title size-1">Quantity:</div>
                                </div>
                                <div class="col-sm-6">
                                    <input class="simple-input cart_product_qty_{{$product->product_id}}" type="number" value="1" min="1">
                                </div>
                            </div>
                            <div class="row m5 col-xs-b40">
                                <div class="col-sm-6 col-xs-b10 col-sm-b0">
                                    @if(Session::get('user_id') == true)
                                    <a class="button size-2 style-2 block add_to_cart" data-id="{{$product->product_id}}" name="add-to-cart">
                                    {{-- <a class="button size-2 style-2 block"> --}}
                                            {{-- <button style="background:#343434" type="button" class="add_to_cart" data-id="{{$product->product_id}}" name="add-to-cart"> --}}
                                                <span class="button-wrapper">
                                                 <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span> 
                                                 <span class="text">ADD TO CART</span>
                                                </span>
                                            {{-- </button> --}}
                                    </a>
                                    @else
                                    <a class="button size-2 style-2 block" href="{{URL::to('login')}}">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                            <span class="text">add to cart</span>
                                        </span>
                                    </a>
                                    @endif
                                </div>
                                
                                <div class="col-sm-6">
                                    <a class="button size-2 style-1 block noshadow add_wish_list" data-id="{{$product->product_id}}" href="#">
                                    <span class="button-wrapper" >
                                        <span class="icon">
                                            @include('client.components.in_wish_list')
                                        </span>
                                        <span class="text">add to favourites</span>
                                    </span>
                                </a>
                                </div>
                    
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="h6 detail-data-title size-2">share:</div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="follow light">
                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> 
                    </div>


                    <div class="tabs-block">
                        <div class="tabulation-menu-wrapper text-center">
                            <div class="tabulation-title simple-input">description</div>
                            <ul class="tabulation-toggle">
                                <li><a class="tab-menu active">Technical</a></li>
                                <li><a class="tab-menu">review</a></li>
                            </ul>
                        </div>
            
                        <div class="empty-space col-xs-b15 col-sm-b30"></div>
                        <div class="tab-entry visible">
                            <div class="row">
                                    @php
                                        $pro = App\Models\Product::find($product->product_id);
                                        $column = 'spec_'.strtolower($pro->component);
                                        $count =strlen($pro->component);
                                        $id = $pro->$column;
                                        $technicals = DB::table(strtolower($pro->component))->where('id',$id)->get();
                                        $technical= (array)$technicals[0];
                                        $key = array_keys($technical);
                                        $value = array_values($technical);
                                    @endphp
                                    <table class="table">
                                        <tr>
                                            <td style="padding-left:100px;font-weight: bold;" class="text-uppercase">Name</td>
                                            <td style="padding-left:50px; font-style: italic;" class="text-uppercase">{{ $pro->product_name }}</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left:100px; font-weight: bold;" class="text-uppercase">Component</td>
                                            <td style="padding-left:50px; font-style: italic;" class="text-uppercase">{{ $pro->component }}</td>
                                        </tr>
                                                           
                                        @for($i=1;$i<count($key);$i++)
                                            <tr>
                                                <td style="padding-left:100px; font-weight: bold;" class="text-uppercase">{{ substr($key[$i],$count+1) }}</td>
                                                <td style="padding-left:50px; font-style: italic;" class="text-uppercase">{{$value[$i]}}</td>
                                            </tr>
                                            @endfor
                                    </table>
                            </div>
                        </div>

                       
                        <div class="empty-space col-xs-b15 col-sm-b30"></div>
                        <div class="tab-entry">
                            @foreach($reviews as $key=>$review)
                            <div class="testimonial-entry">
                                <div class="row col-xs-b20">
                                    <div class="col-xs-8">
                                        <img class="preview" src="https://img.icons8.com/office/16/000000/user.png" alt="" />
                                        <div class="heading-description">
                                            <div class="h6 col-xs-b5">{{$review->user->name}}</div>
                                            <div class="rate-wrapper align-inline">
                                                {{-- <div id="rateYo_user_{{$review->review_id}}"></div>
                                                <input type="hidden" id="review" value="{{$review->review_id}}">
                                                <input type="hidden" id="rating_user_{{$review->review_id}}" value="{{$review->rating}}"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <div class="simple-article size-1 grey">{{$review->created_at}}</div>
                                    </div>
                                </div>
                                <div class="simple-article size-2 col-xs-b15">{{$review->comment}}</div>
                            </div>
                            @endforeach
                            <form action="{{URL::to('review_product')}}" method="post">
                                @csrf
                                <div class="row m10">
                                    <div class="col-sm-12">
                                        <textarea class="simple-input" name="user_comment" required placeholder="Your comment"></textarea>
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="align-inline">
                                            <div class="empty-space col-xs-b5"></div>
                                            <div class="simple-article size-3">Rating&nbsp;&nbsp;&nbsp;</div>
                                            <div class="empty-space col-xs-b5"></div>
                                        </div>
                                        <div class="rate-wrapper set align-inline">
                                            @if(Session::get('user_id') == null )
                                            <div id="rateYo1"></div>
                                            @else
                                            <div id="rateYo"></div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="simple-input" name="rating_start" type="hidden" id="rating_start" />
                                            <div class="empty-space col-xs-b20"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="simple-input" name="product_id" value="{{$product->product_id}}" type="hidden" />
                                            <div class="empty-space col-xs-b20"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <input class="simple-input" name="user_id" value="{{Session::get('user_id')}}" type="hidden" />
                                            <div class="empty-space col-xs-b20"></div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="button size-2 style-3">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span>
                                                <span class="text"><input type="submit">submit</span>
                                            </span>
                                            <input type="submit" value="">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="empty-space col-xs-b35 col-md-b70"></div>
                    <div class="empty-space col-md-b70"></div>

                </div>
                @include('client.components.product_sidebar')
            </div>

            {{-- <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5">
                <div class="h4 swiper-title">accessories</div>
                <div class="empty-space col-xs-b20"></div>
                <div class="swiper-button-prev style-1"></div>
                <div class="swiper-button-next style-1"></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-49.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-50.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-51.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-52.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-53.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-54.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-shortcode style-1 small">
                            <div class="title">
                                <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                                <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                            </div>
                            <div class="preview">
                                <img src="{{ asset('client/img/product-55.jpg')}}"alt="">
                                <div class="preview-buttons valign-middle">
                                    <div class="valign-middle-content">
                                        <a class="button size-2 style-2" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                                <span class="text">Learn More</span>
                                            </span>
                                        </a>
                                        <a class="button size-2 style-3" href="#">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span>
                                                <span class="text">Add To Cart</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price">
                                <div class="simple-article size-4 dark">$630.00</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination relative-pagination visible-xs"></div>
            </div> --}}

            <div class="empty-space col-xs-b35 col-md-b70"></div>
            {{-- <div class="empty-space col-md-b70"></div> --}}

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
                            <div class="simple-article size-3 light transparent">ONLY 200 PROMO CODES</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-line-form">
                            <form action="{{URL::to('get_coupon_promo')}}" method="post">
                                @csrf
                            <input class="simple-input light" name="user_mail" type="text" value="" placeholder="Your email">
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
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endsection
@section('js')
    <!-- range slider -->
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function () {
            $("#rateYo").rateYo({
            rating: 0,
            starWidth: "20px"
            }).on("rateyo.set", function (e, data) {
                $('#rating_start').val(data.rating);
            // alert("The rating is set to " + data.rating + "!");
            });
            });
    </script>
    <script>
        $(function () {
            $("#rateYo_product_0").rateYo({
            rating: 0,
            starWidth: "20px"
            }).on("rateyo.set", function (e, data) {
                $('#rating_start').val(data.rating);
            // alert("The rating is set to " + data.rating + "!");
            });
            });
    </script>
    <script>
        $(function () {
            let Avg_rate = '{{$Avg_rating}}';
            $("#rateYo_product").rateYo({
            rating: Avg_rate,
            starWidth: "20px"
            }).on("rateyo.set", function (e, data) {
                $('#rating_productt').val(data.rating);
            // alert("The rating is set to " + data.rating + "!");
            });
        });
    </script>
    <script>
        $(function () {
            $("#rateYo1").rateYo({
            rating: 0,
            starWidth: "20px"
            }).on("rateyo.set", function (e, data) {
                swal("You must have loggin to rating!");
                // window.location.href = "{{URL::to('login')}}";
            // alert("The rating is set to " + data.rating + "!");
            });
            });
    </script>
    

@endsection
