        <!-- FOOTER -->
        <footer>
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-xs-b30 col-md-b0">
                            <img style="width:200px;height:50px" src="{{ asset('client/img/31.svg')}}" alt="" />
                            <div class="empty-space col-xs-b20"></div>
                            <div class="simple-article size-2 light fulltransparent">At NovaTek, we are dedicated to providing you with the entire information technology solution needed.</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-contact"><i class="fa fa-mobile" aria-hidden="true"></i> contact us: <a href="#">+84 (283) 123 456 789</a></div>
                            <div class="footer-contact"><i class="fa fa-envelope-o" aria-hidden="true"></i> email: <a href="#">office@novatek.com</a></div>
                            <div class="footer-contact"><i class="fa fa-map-marker" aria-hidden="true"></i> address: <a href="#">590, CMT8, Ho Chi Minh city</a></div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-b30 col-md-b0">
                            <h6 class="h6 light">quick links</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-column-links">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="{{ route('client.home')}}">home</a>
                                        <a href="{{ route('client.about')}}">about us</a>
                                        <a href="{{ route('client.products')}}">products</a>
                                        {{-- <a href="#">services</a>
                                        <a href="#">blog</a>
                                        <a href="#">gallery</a> --}}
                                        <a href="{{ route('client.contact')}}">contact</a>
                                    </div>
                                    <div class="col-xs-6">
                                        {{-- <a href="#">privacy policy</a>
                                        <a href="#">warranty</a>
                                        <a href="#">login</a>
                                        <a href="#">registration</a>
                                        <a href="#">delivery</a>
                                        <a href="#">pages</a>
                                        <a href="#">our stores</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear visible-sm"></div>
                        <div class="col-sm-6 col-md-3 col-xs-b30 col-sm-b0">
                            <h6 class="h6 light">News</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="footer-post-preview clearfix">
                                <a class="image" href="https://vnexpress.net/m1-ultra-chip-manh-nhat-cua-apple-4436567.html"><img src="{{ asset('client/img/m1ultra-8649-1646803018.jpg')}}" alt="" /></a>
                                <div class="description">
                                    <div class="date">10/3/2022</div>
                                    <a class="title">M1 Ultra - chip mạnh nhất của Apple</a>
                                </div>
                            </div>
                            <div class="footer-post-preview clearfix">
                                <a class="image" href="https://vnexpress.net/5-mau-laptop-oled-da-nhiem-tu-asus-4433989.html"><img src="{{ asset('client/img/21042BD-ASUS-Vivobook-20-HD-V2-1-1646393436.jpg')}}" alt="" /></a>
                                <div class="description">
                                    <div class="date">10/3/2022</div>
                                    <a class="title">5 mẫu laptop OLED đa nhiệm từ Asus</a>
                                </div>
                            </div>
                            <div class="footer-post-preview clearfix">
                                <a class="image" href="#"><img src="{{ asset('client/img/images2285979_12e.jpg')}}" alt="" /></a>
                                <div class="description">
                                    <div class="date">10/3/2022</div>
                                    <a class="title">Nhỏ học lập trình lớn làm phụ hồ</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <h6 class="h6 light">popular tags</h6>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="tags clearfix">
                                @php
                                    $tags = App\Models\Category::inRandomOrder()->limit(15)->get();
                                @endphp
                                @foreach($tags as $tag)
                                    <a class="tag" href="{{ route('client.tag_clicked',['category_id'=>$tag->category_id])}}">{{ $tag->category_name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-lg-8 col-xs-text-center col-lg-text-left col-xs-b20 col-lg-b0">
                            <div class="copyright">&copy; 2022 All rights reserved. Development by <a href="#" target="_blank">T2104.E0-TEAM 2</a></div>
                            <div class="follow">
                                <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-text-center col-lg-text-right">
                            <div class="footer-payment-icons">
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-4.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-5.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-6.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-7.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-8.jpg')}}" alt="" /></a>
                                <a class="entry"><img src="{{ asset('client/img/thumbnail-9.jpg')}}" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
