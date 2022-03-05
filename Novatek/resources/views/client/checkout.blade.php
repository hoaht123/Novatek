@extends('client.layouts.master')
@section('title')
    <title>Checkout</title>
@endsection
@section('content')

        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="{{ route('client.home')}}">home</a>
                <a href="{{ URL::to('checkout')}}">checkout</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">checkout</div>
                <div class="h2">check your info</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <div class="row">
                @if(Session::get('cart') == true)
                <div class="col-md-6 col-xs-b50 col-md-b0">
                    <form>
                        @csrf
                    <h4 class="h4 col-xs-b25">billing details</h4>
                    <input class="simple-input shipping_name" type="text" name="shipping_name" value="" placeholder="Name" />
                    <div class="empty-space col-xs-b20"></div>
                    <input class="simple-input shipping_email" type="text" value=""  name="shipping_email" placeholder="Email" />
                    <div class="empty-space col-xs-b20"></div>
                    <input class="simple-input shipping_phone" type="text" value=""  name="shipping_phone" placeholder="Phone" />
                    <div class="empty-space col-xs-b20"></div>
                    <input class="simple-input shipping_address" type="text" value=""  name="shipping_address" placeholder="Address" />
                    <div class="empty-space col-xs-b20"></div>
                    <textarea class="simple-input shipping_note"  name="shipping_note" placeholder="Note about your order"></textarea>
                </div>
                <div class="col-md-6">
                    <h4 class="h4 col-xs-b25">your order</h4>
                    @php
                     $total = 0;
                    @endphp
                    @foreach(Session::get('cart') as $key=>$cart)
                    @php
                       
                            $subtotal = $cart['product_qty'] * $cart['product_price'];
                            $total +=$subtotal;
                    @endphp
                    
                    <div class="cart-entry clearfix">
                        <a class="cart-entry-thumbnail" href="#"><img style="width: 100px;height:100px" src="{{ asset('images/product/'.$cart['product_image'])}}" alt=""></a>
                        <div class="cart-entry-description">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="h6"><a href="#">{{$cart['product_name']}}</a></div>
                                            <div class="simple-article size-1">QUANTITY: {{$cart['product_qty']}}</div>
                                        </td>
                                        <td>
                                            <div class="simple-article size-3 grey">${{$cart['product_price']}}</div>
                                            <div class="simple-article size-1">TOTAL: ${{$subtotal}}</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
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
                    @php 
                     Session::put('total',$total);
                    @endphp
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
                                order total
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">${{$total}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                    <div class="button block size-2 style-3">
                        <span class="button-wrapper">
                            <span class="icon"><a href="{{ route('processTransaction') }}"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></a></span>
                            <span class="text"><img style="width:30px;height:30px" src="{{ asset('images/icons/icons8-paypal-64.png')}}"alt=""></i>Paypal</span>
                        </span>
                    </div>
                    @if(\Session::has('error'))
        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
        {{ \Session::forget('error') }}
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
        {{ \Session::forget('success') }}
    @endif
                    <div class="empty-space col-xs-b30"></div>
                    <div class="button block size-2 style-3">
                        <span class="button-wrapper">
                            <button type="button" class="send_order" name="send_order"><span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span></button>
                            <span class="text">place order</span>
                        </span>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-12 text-center" style="font-size:50px">Nothing in cart</div>
            @endif
        </div>
    </form>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
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
