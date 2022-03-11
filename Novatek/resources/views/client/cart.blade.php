@extends('client.layouts.master')
@section('title')
    <title>Cart</title>
@endsection
@section('content')

        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="#">shopping cart</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">shopping cart</div>
                <div class="h2">check your products</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>
        @php
        $message = Session::get('message');
        if($message){
                echo '<script>alert("'.$message.'");</script>';
                Session::put('message', null);
        }
        $coupon_code = Session::get('coupon');
        @endphp
        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <form action="{{URL::to('update_cart')}}" method="post">
            @csrf
            @if(Session::get('cart') == true)  
         <div class="container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th style="width: 95px;"></th>
                        <th>product name</th>
                        <th style="width: 150px;">price</th>
                        <th style="width: 260px;">quantity</th>
                        <th style="width: 150px;">total</th>
                        <th style="width: 70px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                     $total = 0;
                    @endphp
                    @foreach(Session::get('cart') as $key=>$cart)
                    @php
                       
                            $subtotal = $cart['product_qty'] * $cart['product_price'];
                            $total +=$subtotal;
                    @endphp
                    <tr>
                        <td data-title=" ">
                            <a class="cart-entry-thumbnail" href="#"><img style="width:100px;height:100px" src="{{ asset('images/product/'.$cart['product_image'])}}" alt=""></a>
                        </td>
                        <td data-title=" "><h6 class="h6">{{$cart['product_name']}}</h6></td>
                        <td data-title="Price: ">${{$cart['product_price']}}</td>
                        <td>
                            <input class="simple-input" class="cart_qty" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" autocomplete="off" size="2">
                        </td>
                        <td data-title="Total:">${{$subtotal}}</td>
                        <td data-title="">
                            <a class="cart_quantity_delete" href="{{URL::to('del_product/'.$cart['session_id'])}}" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-times"></i></a></div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
            <div class="empty-space col-xs-b35"></div>
            <div class="row">
                <form action="{{URL::to('add_coupon')}}" method="post">
                    @csrf
                <div class="col-sm-6 col-md-5 col-xs-b10 col-sm-b0">
                    <div class="single-line-form">
                        <input class="simple-input" type="text" name="coupon_code" placeholder="Enter your coupon code" />
                        <div class="button size-2 style-3">
                            <span class="button-wrapper">
                                <button type="submit"><span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span></button>
                                <span class="text">submit</span>
                            </span>
                        </div>
                    </div>
                </div>
                </form>
                <div class="col-sm-6 col-md-7 col-sm-text-right">
                    <div class="buttons-wrapper">
                        <a class="button size-2 style-2" href="{{URL::to('del_all_cart')}}" onclick="return confirm('Are you sure you want to delete all product ')">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-2.png')}}"alt=""></span>
                                <span class="text">delete all</span>
                            </span>
                        </a>
                        <a class="button size-2 style-2" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><input type="submit" value=""><img src="{{ asset('client/img/icon-2.png')}}"alt=""></span>
                                <span class="text">update cart</span>
                            </span>
                        </a>
                        <a class="button size-2 style-3" href="{{URL::to('checkout')}}">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span>
                                <span class="text">proceed to checkout</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        
            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <h4 class="h4">cart totals</h4>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                cart subtotal
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">${{$total}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                shipping and handling
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">free shipping</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                tax
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">8%</div>
                            </div>
                        </div>
                    </div>
                    @if($coupon_code)
                        @foreach($coupon_code as $key=>$coupon)
                            @if($coupon['coupon_options'] == 'Percent')
                            <div class="order-details-entry simple-article size-3 grey uppercase">
                                <div class="row">
                                    <div class="col-xs-6">
                                        coupon 
                                    </div>
                                    <div class="col-xs-6 col-xs-text-right">
                                        <div class="color">{{$coupon['coupon_code']}} - {{$coupon['coupon_number']}}% <a  href="{{URL::to('delete_coupon_cart')}}"><img style="width:20px;height:20px" src="{{asset('images/icons/times.png')}}" alt=""></a></div>
                                    </div>
                                    @php
                                        $tax = $total * 8/100;
                                        $total_after_tax = $total + $tax;
                                        $coupon_cash = $total_after_tax * $coupon['coupon_number']/100;
                                        $after_total = $total_after_tax - $coupon_cash;
                                    @endphp
                                </div>
                            </div>
                            @else
                            <div class="order-details-entry simple-article size-3 grey uppercase">
                                <div class="row">
                                    <div class="col-xs-6">
                                        coupon 
                                    </div>
                                    <div class="col-xs-6 col-xs-text-right">
                                        <div class="color">{{$coupon['coupon_code']}} - {{$coupon['coupon_number']}}$ <a href="{{URL::to('delete_coupon_cart')}}"><img style="width:20px;height:20px" src="{{asset('images/icons/times.png')}}" alt=""></a></div>
                                    </div>
                                    @php
                                        $tax = $total * 8/100;
                                        $total_after_tax = $total + $tax;
                                        $after_total = $total_after_tax - $coupon['coupon_number'];
                                    @endphp
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else
                    @php
                    $tax = $total * 8/100;
                    $after_total = $total + $tax;
                     @endphp
                     <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                coupon 
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                order total
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">${{$after_total}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="empty-space col-xs-b35 col-md-b70"></div>
        </div>
        @else
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="col-lg-12 text-center" style="font-size:50px">Nothing in cart</div>
                </div>
            </div>
        </div>
        @endif
        @endsection
@section('js')
    <!-- masonry -->
  
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
        $(window).load(function(){
            var $container = $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        });
    </script>
@endsection
