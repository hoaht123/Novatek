        <!-- HEADER -->
        <header>
            <div class="header-top">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-md-5 hidden-xs hidden-sm">
                            <div class="entry"><b>contact us:</b> <a href="tel:+35235551238745">+3  (523) 555 123 8745</a></div>
                            <div class="entry"><b>email:</b> <a href="mailto:office@exzo.com">office@exzo.com</a></div>
                        </div>
                        <div class="col-md-7 col-md-text-right">
                            <div class="entry">
                                <?php
                                    $user_name = Session::get('user_name');
                                ?>
                                @if($user_name)
                                {{$user_name}}
                                <a style="margin-left:10px " href="{{URL::to('log-out')}}">Logout</a>
                                @else
                                <a href="{{URL::to('login')}}"><b>login</b></a>&nbsp; or &nbsp;<a  href="{{URL::to('login')}}"><b>register</b></a>
                                @endif
                            </div>
                            
                            <div class="entry language">
                                <div class="title"><b>en</b></div>
                            </div>
                                @php
                                        $total = 0;
                                        $sum_quantity = 0;
                                @endphp
                            <div class="entry hidden-xs hidden-sm"><a href="{{ route('client.wish_list')}}"><i class="fa fa-heart-o" aria-hidden="true"></i></a></div>
                            <div class="entry hidden-xs hidden-sm cart">
                                <a href="{{ URL::to('show_cart')}}">
                                    <b class="hidden-xs">Your bag</b>
                                    <span class="cart-icon">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        @if(Session::get('cart') == true)
                                        @foreach(Session::get('cart') as $key=>$cart)
                                        @php
                                        $sum_quantity += $cart['product_qty'];
                                        @endphp
                                        @endforeach
                                        <span class="cart-label">{{$sum_quantity}}</span>
                                        @else
                                        <span class="cart-label">0</span>
                                        @endif
                                    </span>
                                    
                                </a>
                                
                                <div class="cart-toggle hidden-xs hidden-sm">
                                    <div class="cart-overflow">
                                        @if(Session::get('cart') == true)
                                        @foreach(Session::get('cart') as $key=>$cart)
                                         @php
                            
                                             $subtotal = $cart['product_qty'] * $cart['product_price'];
                                             $total +=$subtotal;
                                        @endphp
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img style="width: 50px;height:50px"src="{{ asset('images/product/'.$cart['product_image'])}}" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6">{{$cart['product_name']}}</div>
                                                            <div class="simple-article size-1">QUANTITY: {{$cart['product_qty']}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">${{$cart['product_price']}}</div>
                                                            <div class="simple-article size-1">TOTAL: ${{$cart['product_price'] * $cart['product_qty']}}</div>
                                                        </td>
                                                        <td>
                                                            <a class="cart_quantity_delete" href="{{URL::to('del_product/'.$cart['session_id'])}}" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-times"></i></a></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        @endforeach
                                    <div class="empty-space col-xs-b40"></div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="cell-view empty-space col-xs-b50">
                                                <div class="simple-article size-5 grey">TOTAL <span class="color">${{$total}}</span></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a class="button size-2 style-3" href="{{ URL::to('checkout')}}">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="{{ asset('client/img/icon-4.png')}}"alt=""></span>
                                                    <span class="text">proceed to checkout</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                            <div class="text-center" style="font-size:20px">Nothing in cart</div>
                            @endif
                                </div>
                            </div>
                            
                            <div class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-xs-3 col-sm-1">
                            <a id="logo" href="{{URL::to('/')}}"><img style="height:200px;width:200px" src="{{ asset('client/img/31.svg')}}"alt="" /></a>  
                        </div>
                        <div class="col-xs-9 col-sm-11 text-right">
                            <div class="nav-wrapper">
                                <div class="nav-close-layer"></div>
                                <nav>
                                    <ul>
                                        <li class="">
                                            <a href="{{ route('client.home')}}">Home</a>                                  
                                        </li>
                                        <li  class="">
                                            <a href="{{ route('client.about')}}">about us</a>
                                        </li>
                                        <li class="megamenu-wrapper">
                                            <a href="{{ route('client.products')}}">products</a>
                                        </li>
                                        <li class="megamenu-wrapper">
                                            <a href="{{ URL::to('checkout')}}">Checkout</a>
                                        </li>
                                        <li><a href="{{ route('client.contact')}}">contact</a></li>
                                    </ul>
                                    <div class="navigation-title">
                                        Navigation
                                        <div class="hamburger-icon active">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <div class="header-bottom-icon toggle-search"><i class="fa fa-search" aria-hidden="true"></i></div>
                            <div class="header-bottom-icon visible-rd"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                            <div class="header-bottom-icon visible-rd">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                <span class="cart-label">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-search-wrapper">
                        <div class="header-search-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                        <form>
                                            <div class="search-submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="submit"/>
                                            </div>
                                            <input class="simple-input style-1" type="text" value="" placeholder="Enter keyword" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="button-close"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>