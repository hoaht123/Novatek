@extends('client.layouts.master')
@section('title')
    <title>We Are NovaTek</title>
@endsection
@section('content')

        <div class="header-empty-space"></div>

        <div class="block-entry fixed-background" style="background-image: url(client/img/background-23.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="cell-view simple-banner-height text-center">
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                            <h1 class="h1 light">we are NovaTek</h1>
                            <div class="title-underline center"><span></span></div>
                            <div class="simple-article light transparent size-4">Here for Your Essential Communication and Information Technology Needs</div>
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="simple-article size-3 grey uppercase col-xs-b5">about us</div>
                    <div class="h2">NOVATEK</div>
                    <div class="title-underline left"><span></span></div>
                    <div class="simple-article size-4 grey">Over 22 million IT professionals, small businesses, local governments, students, engineers, programmers, makers, tech enthusiasts, gamers, computer product and electronic device customers have relied on NovaTek for their communication and information technology support needs since 1979.</div>
                </div>
                <div class="col-sm-7">
                    <div class="simple-article size-3">
                        <p>NovaTek is among the nation's leading information technology, communications, and electronic device suppliers, operating twenty-five large stores in major marketsnationwide. Founded in 1979 in Columbus, Ohio, NovaTek has grown steadily and profitably. Our stores are designed to supply the needs of a wide variety of consumers – from small businesses to local schools - with well-trained associates who offerinformation technology solutions</p>
                        <p>Uniquely focused on information technology products, NovaTek offers more computers, electronics, networking and communication devices (more than 30,000 items in stock) than any other company. NovaTek is deeply passionate about providing information technology products and technology support services. We have offered in-store pickup of online orders since 2010. Consumers can visit NovaTek's 25 stores from coast-to-coast or microcenter.com for thousands of computer-related items, electronics and other information technology products.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <div class="slider-wrapper">
                <div class="swiper-button-prev hidden"></div>
                <div class="swiper-button-next hidden"></div>
                <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lt-slides="3"  data-slides-per-view="3" data-space="30">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-35.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Information Technology Solutions for Critical Infrastructures</h6>
                                    <div class="description simple-article size-2">At NovaTek, we are dedicated to providing you with the entire information technology solution needed. As business and schools shift to remote work from home and virtual learning, we are here to supply your essential needs of computers, networking, webcams, and all work from home products. NovaTek is here to supply your telemedicine needs so you can consult with your doctor from your home. As the country is seeing a historic shift to remote digital access, we are here to support you as you effectively work, learn, and receive telemedicine from home.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-36.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Customer Satisfaction</h6>
                                    <div class="description simple-article size-2">At NovaTek, we always aim to provide you with a great shopping experience. NovaTek offers selection, service and sales expertise competitive with other leading service-oriented companies. NovaTek's store designs are based on exhaustive studies of customer shopping behavior, thousands of customer surveys and extensive testing.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-37.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Knowledgeable Sales Associates</h6>
                                    <div class="description simple-article size-2">NovaTek has long been known for the computer and electronic device stores with the most experienced, knowledgeable and helpful sales associates, plus walk-in technical support services NovaTek hires computer and electronics enthusiasts with good people skills and provides continuous training to ensure that customers receive an outstanding consultive sales experience. Our sales associates are proficient at helping customers at all levels of computer and consumer electronics knowledge</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-38.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Pricing</h6>
                                    <div class="description simple-article size-2">NovaTek has offered the lowest prices on CPUs for years as a service to the large percentage of our customers who prefer to build their own PCs. NovaTek compares CPU prices daily to ensure we are offering you prices which beat online sources, plus we give you the convenience of being able to purchase what you want at your local NovaTek. NovaTek offers competitive prices on our vast selection of merchandise. NovaTek's In-store Pickup lets you order what you want and pick it up as soon as you receive a confirmation email.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src={{ asset("client/img/thumbnail-39.jpg") }} alt="" />
                                <div class="content">
                                    <h6 class="title h6">Selection</h6>
                                    <div class="description simple-article size-2">A product assortment which is both deep and wide has been a mainstay of NovaTek since the company occupied its first large format store way back in 1982. With over 30,000 items in stock, NovaTek offers more information technology solutions and more square footage devoted to them than any other company. NovaTek continually researches our customers to ensure we are bringing to market the latest products they desire. In fact, NovaTek is the leading U.S. supplier for Arduino and Raspberry Pi. From novices to enthusiasts, NovaTek's vast inventory has you covered!</div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="swiper-slide">
                            <div class="icon-description-shortcode style-2">
                                <img class="image-icon image-thumbnail rounded-image" src="client/img/thumbnail-37.jpg" alt="" />
                                <div class="content">
                                    <h6 class="title h6">molestie nec tortor quis</h6>
                                    <div class="description simple-article size-2">Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="swiper-pagination relative-pagination"></div>
                </div>
            </div>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">our team</div>
                <div class="h2">meet with professionals</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="slider-wrapper our-team-slider">
                <div class="swiper-button-prev hidden-xs hidden-sm"></div>
                <div class="swiper-button-next hidden-xs hidden-sm"></div>
                <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lt-slides="4"  data-slides-per-view="4">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-40.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">co-founder</div>
                                        <div class="h6">Sir Võ Ngọc Hòa</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-41.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">marketing director</div>
                                        <div class="h6">Dr.Nguyễn Hoàng Tân</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-42.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">tech director</div>
                                        <div class="h6">Dr. Triệu Văn Tình</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-43.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">co-founder</div>
                                        <div class="h6">Sir Lý Triệu Đạt</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-44.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">co-founder</div>
                                        <div class="h6">Tom Cruise</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-45.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">marketing director</div>
                                        <div class="h6">Johnny Depp</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-46.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">tech director</div>
                                        <div class="h6">Leonardo DiCaprio</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                        <div class="swiper-slide">
                            <div class="product-shortcode style-9">
                                <div class="preview">
                                    <img src={{ asset("client/img/thumbnail-47.jpg") }} alt="" />
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <div class="simple-article size-1 uppercase color col-xs-b5">co-founder</div>
                                        <div class="h6">Keanu Reeves</div>
                                    </div>
                                    {{-- <div class="description">
                                        <div class="simple-article text size-2"></div>
                                    </div> --}}
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
                    <div class="swiper-pagination relative-pagination visible-xs visible-sm"></div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">our brands</div>
                <div class="h2">best of the best</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <a class="client-logo-entry">
                <img src={{ asset("client/img/MSI-Logo-700x394.png") }} alt="" />
                <img src={{ asset("client/img/MSI-Logo-700x394.png") }} alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Nvidia-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Nvidia-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Sony-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Sony-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/HP-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/HP-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Intel-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Intel-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Gigabyte-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Gigabyte-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Asus-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Asus-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/AMD-Logo-700x394.png") }} alt="" />
                <img src={{ asset("client/img/AMD-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/Canon-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/Canon-Logo-700x394.png") }}  alt="" />
            </a>
            <a class="client-logo-entry">
                <img src={{ asset("client/img/LG-Logo-700x394.png") }}  alt="" />
                <img src={{ asset("client/img/LG-Logo-700x394.png") }}  alt="" />
            </a>
        </div>

        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}
        {{-- <div class="empty-space col-xs-b35 col-md-b70"></div> --}}

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <div class="cell-view simple-banner-height big">
                        <div class="empty-space col-sm-b35"></div>
                        <div class="simple-article size-3 grey uppercase col-xs-b5">Technical Support</div>
                        <div class="h2">PC Upgrades and PC Repair Services</div>
                        <div class="title-underline left"><span></span></div>
                        <div class="simple-article size-4 grey">UNMATCHED LEVEL OF EXPERTISE
                            Our OEM and A+ Certified Technicians can help with any computer repair or service need. Repairs are completed in each store, giving you peace of mind and a quick turnaround. Walk-ins are welcome at any one of our 25 locations, or schedule a service appointment.</div>
                        <div class="empty-space col-xs-b30 col-sm-b70"></div>
                        <div class="icon-description-shortcode style-3">
                            <div class="image-icon">
                                <img class="image-thumbnail rounded-image" src="client/img/ekwb-rog-z690-glacial-cover.png" alt="" />
                            </div>
                            <div class="content">
                                <div class="cell-view">
                                    <h6 class="title h6">CUSTOM PC BUILD SERVICES</h6>
                                    <div class="description simple-article size-2">Looking to build a custom PC but overwhelmed by all of the options and complications of building yourself? Whether it's a top tier gaming PC, video or photo editing machine, or a workstation, pick your parts and our expert technicians can build the PC of your dreams for you. Order within 4 hours of close and it can be ready for pickup same day!</div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space col-xs-b30"></div>
                        <div class="icon-description-shortcode style-3">
                            <div class="image-icon">
                                <img class="image-thumbnail rounded-image" src="client/img/diagnostics_service.jpg" alt="" />
                            </div>
                            <div class="content">
                                <div class="cell-view">
                                    <h6 class="title h6">COMPUTER DIAGNOSTICS, TESTING & TROUBLESHOOTING</h6>
                                    <div class="description simple-article size-2">Is your computer not powering on or working correctly? It can be difficult to determine what is going wrong. Our expert technicians have experience dealing with any issue you may be having and can assist you in troubleshooting the problem to determine how best to fix your device.</div>
                                </div>
                            </div>
                        </div>
                        <div class="empty-space col-xs-b35"></div>
                    </div>
                </div>
            </div>
            <div class="row-background left hidden-xs hidden-sm">
                <img src="client/img/Computer-Technician-job-description.jpg" alt="" />
            </div>
        </div>
@endsection
