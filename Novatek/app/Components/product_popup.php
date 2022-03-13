<?php
namespace App\Components;
use App\Models\Review;
class product_popup{

    public function htmlPopupProduct($product, $inStock){
        $count_review = Review::where('product_id',$product->product_id)->count();
        
        return '
            <div id="replace-data-rel-3" class="popup-content" data-rel="3">
            <div class="layer-close"></div>
            <div class="popup-container size-2">
                <div class="popup-align">
                    <div class="row">
                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
                            <div class="main-product-slider-wrapper swipers-couple-wrapper">
                                <div class="swiper-container swiper-control-top">
                                <div class="swiper-button-prev hidden"></div>
                                <div class="swiper-button-next hidden"></div>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class=""></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="">
                                                <img style="width: 100%; height:70%" src="images/product/'.$product->product_main_image.'" alt="">
                                            </div>
                                    </div>
                                </div>
                                </div>
                                <div class="empty-space col-xs-b15 col-sm-b30"></div>

                                <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="5" data-slides-per-view="5" data-center="1" data-click="1">
                                <div class="swiper-button-prev hidden"></div>
                                <div class="swiper-button-next hidden"></div>
                                <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img style="width:100px; height:100px" src="images/product/'.$product->product_main_image.'" alt="">
                                            </div>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="simple-article size-3 grey col-xs-b5">'.$product->component.'</div>
                            <div class="h3 col-xs-b25">'.$product->product_name.'</div>
                            <div class="row col-xs-b25">
                                <div class="col-sm-6">
                                    <div class="simple-article size-5 grey">PRICE: <span class="color">$'.$product->product_price.'.00</span></div>        
                                </div>
                                <div class="col-sm-6 col-sm-text-right">
                                    <div class="rate-wrapper align-inline">
                                        <div id="rateYo_product"></div>
                                        <input type="hidden" name="" id="rating_product" >
                                    </div>
                                    <div class="simple-article size-2 align-inline">'.$count_review.' Reviews</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span class="grey">'.$product->product_id.'</span></div>
                                </div>
                                <div class="col-sm-6 col-sm-text-right">
                                    <div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">'.$inStock.'</span></div>
                                </div>
                            </div>
                            <div class="simple-article size-3 col-xs-b30">'.$product->product_descriptions.'</div>
                            <div class="row col-xs-b40">
                            </div>
                            <div class="row m5 col-xs-b40">
                                <div class="col-sm-12">                                                                                        
                                        <a class="button size-2 style-2 block noshadow add_wish_list" href="product/'.$product->product_id.'">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="client/img/icon-1.png"alt=""></span> 
                                            <span class="text">Learn more</span>
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
                </div>
                <div class="button-close"></div>
            </div>
        </div>
        ';
    }

}