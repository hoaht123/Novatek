                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                scelerisque.</div>
                                <a class="button size-2 style-1" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="client/img/icon-1.png" alt=""></span>
                                        <span class="text">learn more</span>
                                    </span>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="banner-shortcode style-3 wide" style="background-image: url(client/img/img_2710092851.jpg);">
                        <div class="valign-middle-cell">
                            {{-- <div class="valign-middle-content">
                                <div class="simple-article size-3 light transparent uppercase col-xs-b5">street collection</div>
                                <h3 class="h3 light">noise is not a problem</h3>
                                <div class="title-underline left"><span></span></div>
                                <div class="simple-article size-4 light transparent col-xs-b30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesentir pulvinar ante et nisl scelerisque.</div>
                                <a class="button size-2 style-1" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="client/img/icon-1.png" alt=""></span>
                                        <span class="text">learn more</span>
                                    </span>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-wrapper">
                <div class="swiper-button-prev visible-lg"></div>
                <div class="swiper-button-next visible-lg"></div>
                <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lt-slides="3"  data-slides-per-view="4">
                    <div class="swiper-wrapper" style="height: 700px; margin-bottom:100px">
                        @foreach($hotProducts as $product)           
                        <div class="swiper-slide">
                            <div class="product-shortcode style-1 big">
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_main_image}}" class="cart_product_image_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                <div class="preview">
                                    <img src="{{ asset('images/product/'.$product->product_main_image) }}" alt="{{$product->product_name}}">
                                    <div class="preview-buttons valign-middle">
                                        <div class="valign-middle-content">
                                            <a class="button size-2 style-2" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="client/img/icon-1.png" alt=""></span>
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
                                <div class="title">
                                    {{-- <div class="simple-article size-1 color col-xs-b5"><a href="#">COLOREX EDITION</a></div>
                                    <div class="h6 animate-to-green"><a href="#">hipster beat hr</a></div> --}}
                                </div>
                                <div class="description">
                                    <div class="simple-article text size-2">{{$product->product_sort_descriptions}}</div>
                                    <div class="icons">
                                        <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        <a class="entry open-popup" data-rel="3" data-id="{{$product->product_id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <button  data-id="{{$product->product_id}}" name="add_wish_list_{{$product->product_id}}" class=" entry add_wish_list">
                                            @php
                                                $in_wish_list = App\Models\Wishlist::where('product_id',$product->product_id)->where('user_id',Session::get('user_id'))->first();
                                                if(!empty($in_wish_list)){
                                                    echo '<i class="fa fa-heart" style="color:red" aria-hidden="true"></i>';
                                                }else{
                                                    echo '<i class="fa fa-heart-o" style="color:black" aria-hidden="true"></i>';
                                                }
                                            @endphp
                                        </button> 
                                    </div>
                                </div>
                                <div class="price">
                                    <div class="simple-article size-4"><span class="dark">${{$product->product_price}}.00</span></div>
                                </div>
                            </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination relative-pagination visible-xs visible-sm"></div>
                </div>
            </div>

            <div class="container">
                <div class="text-center">
                    <div class="simple-article size-3 grey uppercase col-xs-b5">new arrivals</div>
                    <div class="h2">something new for you</div>
                    <div class="title-underline center"><span></span></div>
                </div>
            </div>

            {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

                <div class="container">
                    <div class="text-center">
                        <ul id="filter-new-product-home">
                            <li><button class ="button-filter btn btn-info" value="All">ALL</button></li>
                            <li><button class ="button-filter btn" value="Ram">RAM</button></li>
                            <li><button class ="button-filter btn" value="Cpu">CPU</button></li>
                            <li><button class ="button-filter btn" value="Gpu">GPU</button></li>
                            <li><button class ="button-filter btn" value="Psu">PSU</button></li>
                            <li><button class ="button-filter btn" value="Headphone">HEADPHONE</button></li>
                            <li><button class ="button-filter btn" value="Motherboard">MOTHERBOARD</button></li>
                            <li><button class ="button-filter btn" value="Storage">STORAGE</button></li>
                            <li><button class ="button-filter btn" value="Mouse">MOUSE</button></li>
                            <li><button class ="button-filter btn" value="Keyboard">KEYBOARD</button></li>
                        </ul>
                    </div>
                </div>
                <div class="empty-space col-xs-b30 col-sm-b60"></div>
                <div class="slider-wrapper">
                    <div class="swiper-button-prev visible-lg"></div>
                    <div class="swiper-button-next visible-lg"></div>
                    <div class="swiper-container" data-slides-per-view="5">
                        <div class="swiper-wrapper" id="filter-home" style="height: 700px; margin-bottom:100px">
                            @foreach($newProducts as $product)   
                            <div class="swiper-slide swiper-slide-{{$product->component}}">
                                <div class="product-shortcode style-1 big">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                        <input type="hidden" value="{{$product->product_main_image}}" class="cart_product_image_{{$product->product_id}}">
                                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                    <div class="preview">
                                        <img src="{{ asset('images/product/'.$product->product_main_image) }}" alt="{{$product->product_name}}">
                                        <div class="preview-buttons valign-middle">
                                            <div class="valign-middle-content">
                                                <a class="button size-2 style-2" href="{{ route('client.product_detail',['product_id' => $product->product_id])}}">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="client/img/icon-1.png" alt=""></span>
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
                                    <div class="title">
                                        {{-- <div class="simple-article size-1 color col-xs-b5"><a href="#">COLOREX EDITION</a></div>
                                        <div class="h6 animate-to-green"><a href="#">hipster beat hr</a></div> --}}
                                    </div>
                                    <div class="description">
                                        <div class="simple-article text size-2">{{$product->product_sort_descriptions}}</div>
                                        <div class="icons">
                                            <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            <a class="entry open-popup" data-rel="3" data-id="{{$product->product_id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <button  data-id="{{$product->product_id}}" name="add_wish_list_{{$product->product_id}}" class=" entry add_wish_list">
                                                @php
                                                    $in_wish_list = App\Models\Wishlist::where('product_id',$product->product_id)->where('user_id',Session::get('user_id'))->first();
                                                    if(!empty($in_wish_list)){
                                                        echo '<i class="fa fa-heart" style="color:red" aria-hidden="true"></i>';
                                                    }else{
                                                        echo '<i class="fa fa-heart-o" style="color:black" aria-hidden="true"></i>';
                                                    }
                                                @endphp
                                            </button> 
                                    </div>
                                    </div>
                                    <div class="price">
                                        <div class="simple-article size-4"><span class="dark">${{$product->product_price}}.00</span></div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination relative-pagination visible-xs visible-sm"></div>
                    </div>
                </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-6">
                        <div class="cell-view simple-banner-height text-center">
                            <div class="empty-space col-sm-b35"></div>
                            <div class="simple-article grey uppercase size-5 col-xs-b5"><span class="color">special offers</span></div>
                            <h3 class="h3 col-xs-b15">new offers every week <span class="color">+</span> discount system <span class="color">+</span> best prices</h3>
                            <div class="simple-article size-3 col-xs-b25 col-sm-b50">GOOD THINGS HAPPEN EVERY TIME YOU SHOP<br>From big treats to little thank yous and a charity donation with every purchase.</div>
                            <div class="single-line-form">
                                <input class="simple-input" type="text" value="" placeholder="Enter your email">
                                <div class="button size-2 style-3">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="client/img/icon-4.png" alt=""></span>
                                        <span class="text">submit</span>
                                    </span>
                                    <input type="submit" value="">
                                </div>
                            </div>
                            <div class="empty-space col-xs-b35"></div>
                        </div>
                    </div>
                </div>
                <div class="row-background left hidden-xs">
                    <img src="client/img/nzxt3.jpg" alt="" />
                </div>
            </div>
        </div>
@endsection
@section('js')
       <script>
           $(document).ready(function() {
               $('.button-filter').click(function() {
                   var component = $(this).val();
                   if( component == 'All'){
                       $('.button-filter').removeClass('btn-info');
                        $(this).addClass('btn-info');
                        $('#filter-home .swiper-slide').show();
                   }else{
                    $('.button-filter').removeClass('btn-info');
                    $(this).addClass('btn-info');
                    $('#filter-home .swiper-slide').hide();
                    $('#filter-home .swiper-slide-'+component).show();
                   }            
               });
           });
       </script>
@endsection
