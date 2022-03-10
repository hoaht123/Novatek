@extends('client.layouts.master')
@section('title')
    <title>Contact Us</title>
@endsection
@section('content')
    <div id="content-block">
        <div class="block-entry fixed-background" style="background-image: url(client/img/background-23.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="cell-view simple-banner-height text-center">
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                            <h1 class="h1 light">we are NovaTek</h1>
                            <div class="title-underline center"><span></span></div>
                            <div class="simple-article light transparent size-4">At NovaTek, we are dedicated to providing you with the entire information technology solution needed.</div>
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="empty-space col-xs-b25 col-sm-b50"></div>
        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">our contacts</div>
                <div class="h2">we ready for your questions</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-sm-b15 col-md-b50"></div>

        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-25.png") }} alt="">
                        <div class="title h6">address</div>
                        <div class="description simple-article size-2">590, CMT8, Ho Chi Minh city</div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-23.png") }} alt="">
                        <div class="title h6">phone</div>
                        <div class="description simple-article size-2" style="line-height: 26px;">
                            <a href="tel:+32323232323232">+84  (283) 123 456 789</a>
                            <br/>
                            <a href="tel:+32323232322323">+84  (283) 321 654 987</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-28.png") }} alt="">
                        <div class="title h6">email</div>
                        <div class="description simple-article size-2"><a href="#">office@novatek.com</a></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="icon-description-shortcode style-1">
                        <img class="icon" src={{ asset("client/img/icon-26.png") }} alt="">
                        <div class="title h6">Follow us</div>
                        <div class="follow light">
                            <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">    
            <div class="map-wrapper">
                <div id="map-canvas" class="full-width" data-lat="10.7866555" data-lng="106.6660413" data-zoom="19"></div>
            </div>
            <div class="addresses-block hidden">
                <a class="marker" data-lat="10.7866555" data-lng="106.6660413" data-string="Novatek Computer"></a>
            </div>
        </div>

        <div class="empty-space col-xs-b25 col-sm-b50"></div>
        <?php
        
            $correct = Session::get('correct');
            if($correct){
                echo '<script>alert("'.$correct.'");</script>';
                Session::put('correct', null);
            }
            ?>
    
        <div class="container">
            <h4 class="h4 text-center col-xs-b25">have a questions?</h4>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="contact-form" action="{{URL::to('save_contact')}}" method="post">
                        @csrf
                        <div class="row m5">
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="{{old('contact_name')}}" placeholder="Name" name="contact_name" />
                                @error('contact_name')
                            <div style="font-size:15px; color:red">{{ $message }}</div>
                             @enderror
                            </div>
                            
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="{{old('contact_email')}}" placeholder="Email" name="contact_email" />
                                @error('contact_email')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                            </div>
                           
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="{{old('contact_phone')}}" placeholder="Phone" name="contact_phone" />
                                @error('contact_phone')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                            </div>
                           
                            <div class="col-sm-12">
                                <textarea class="simple-input col-xs-b20" placeholder="Your message" name="contact_message">{{old('contact_message')}}</textarea>
                                @error('contact_message')
                                <div style="font-size:15px; color:red">{{ $message }}</div>
                                 @enderror
                            </div>
                           
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <div class="button size-2 style-3">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src={{ asset("client/img/icon-4.png") }}></span>
                                            <span class="text">send message</span>
                                        </span>
                                        <input type="submit"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
    </div>
@endsection
