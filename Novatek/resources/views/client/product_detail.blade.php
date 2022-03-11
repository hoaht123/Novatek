@extends('client.layouts.master')
@section('title')
    <title>Detail</title>
@endsection
@section('content')
        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="#">accessories</a>
                <a href="#">gadgets</a>
                <a href="#">sport gadgets</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
                            <div class="main-product-slider-wrapper swipers-couple-wrapper">
                                <div class="swiper-container swiper-control-top">
                                   <div class="swiper-button-prev hidden"></div>
                                   <div class="swiper-button-next hidden"></div>
                <form>
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                           <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                           <input type="hidden" value="{{$product->product_main_image}}" class="cart_product_image_{{$product->product_id}}">
                                           <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                           
                                   <div class="swiper-wrapper">                                      
                                            <div class="swiper-slide">
                                                    {{-- <div class="swiper-lazy-preloader"></div> --}}
                                                    <div class="product-big-preview-entry " >
                                                        <img style="width:100%;height:75%" src="{{asset('images/product/'.$product->product_main_image)}}" alt="">
                                                    </div>
                                            </div>
                                            <div class="swiper-slide">
                                                {{-- <div class="swiper-lazy-preloader"></div> --}}
                                                <div class="product-big-preview-entry " >
                                                    <img style="width:100%;height:75%" src="{{{asset('images/product/'.$product->product_image_gallery)}}}" alt="">
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
                                        <div id="rateYo_product"></div>
                                        <input type="hidden" name="" id="rating_product" >
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
                                    <input type="number" value="1" min="1" class="cart_product_qty_{{$product->product_id}}">
                                </div>
                            </div>
                            <div class="row m5 col-xs-b40">
                                <div class="col-sm-6 col-xs-b10 col-sm-b0">
                                    @if(Session::get('user_id') == true)
                                    <a class="button size-2 style-2 block">
                                            <button style="background:#343434" type="button" class="add_to_cart" data-id="{{$product->product_id}}" name="add-to-cart">
                                                <span class="button-wrapper">
                                                 <span class="icon"><img src="{{ asset('client/img/icon-3.png')}}"alt=""></span> 
                                                 <span class="text">ADD TO CART</span>
                                                </span>
                                            </button>
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
                    </form>
                                <div class="col-sm-6">
                                    <a class="button size-2 style-1 block noshadow" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
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
                    </div>


                    <div class="tabs-block">
                        <div class="tabulation-menu-wrapper text-center">
                            <div class="tabulation-title simple-input">description</div>
                            <ul class="tabulation-toggle">
                                <li><a class="tab-menu active">description</a></li>
                                <li><a class="tab-menu">review</a></li>
                            </ul>
                        </div>
            

                        <div class="tab-entry visible">
                            <div class="row">
                                    {!!$product->product_descriptions!!}
                            </div>
                        </div>

                       

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
                                        <textarea class="simple-input" name="user_comment" placeholder="Your comment"></textarea>
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
                                            @if(Session::get('user_id'))
                                            <div id="rateYo"></div>
                                            @else
                                            <div id="rateYo1"></div>
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

            <div class="row">
                <div class="col-sm-6 col-md-3 col-xs-b25">
                    <div class="h4 col-xs-b25">Hot Sale</div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-28.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">WIRELESS</div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-29.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-30.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article"><span class="color">$24.00</span>&nbsp;&nbsp;&nbsp;<span class="line-through">$32.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-b25">
                    <div class="h4 col-xs-b25">Top Rated</div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-31.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">WIRELESS</div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-32.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-33.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article dark">$4.00</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-b25">
                    <div class="h4 col-xs-b25">Popular</div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-34.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">WIRELESS</div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-35.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-36.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article dark">$4.00</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-b25">
                    <div class="h4 col-xs-b25">Best Choice</div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-37.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">WIRELESS</div>
                            <h6 class="h6 col-xs-b10"><a href="#">wireless headphones</a></h6>
                            <div class="simple-article dark">$98.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-38.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">earphones case</a></h6>
                            <div class="simple-article dark">$12.00</div>
                        </div>
                    </div>
                    <div class="col-xs-b10"></div>
                    <div class="product-shortcode style-4 rounded clearfix">
                        <a class="preview" href="#"><img src="{{ asset('client/img/product-39.jpg')}}"alt="" /></a>
                        <div class="description">
                            <div class="simple-article color size-1 col-xs-b5">CASES</div>
                            <h6 class="h6 col-xs-b10"><a href="#">headphones case</a></h6>
                            <div class="simple-article dark">$4.00</div>
                        </div>
                    </div>
                </div>
            </div>

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
                            <input class="simple-input light" type="text" value="" placeholder="Your email">
                            <div class="button size-2 style-1">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="{{ asset('client/img/icon-1.png')}}"alt=""></span>
                                    <span class="text">submit</span>
                                </span>
                                <input type="submit" value="">
                            </div>
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
                alert('You must logging in to rate');
                // window.location.href = "{{URL::to('login')}}";
            // alert("The rating is set to " + data.rating + "!");
            });
            });
    </script>

@endsection
