<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products()
    {
        $brands = Brand::all();
        $categories = Category::where('parent_id',0)->get();
        $products = Product::where('product_status',0)->paginate(9);
        return view('client.products', compact('categories','brands','products',));
    }
    public function product_detail($product_id)
    {
        $brands = Brand::all();
        $categories = Category::where('parent_id',0)->get();
        $product = Product::where('product_id',$product_id)->first();
        $reviews = Review::where('product_id',$product_id)->get();
        $Avg_rating = Review::where('product_id',$product_id)->avg('rating');
        $count_review = Review::where('product_id',$product_id)->count();
        return view('client.product_detail', compact('product','categories','brands','reviews','Avg_rating','count_review'));
    }
    public function category_sidebar_clicked($category_id){
        $arr = Array();
        $brands = Brand::all();
        $categories = Category::where('parent_id',0)->get();
        $category = Category::find($category_id);
        $arr[0] = $category->category_id;
        if($category->parent_id == 0){
            $categories1 = Category::where('parent_id',$category_id)->get();
            for($i=0;$i<count($categories1);$i++){
                $arr[$i+1]=$categories1[$i]->category_id;
            }
        }
        $products = Product::whereIn('category_id',$arr)->paginate(9);
        return view('client.products', compact('categories','brands','products'));
    }

    public function tag_clicked($category_id){
        $brands = Brand::all();
        $categories = Category::where('category_id',$category_id)->get();
        $products = Product::where('category_id',$category_id)->paginate(9);
        return view('client.products', compact('categories','brands','products'));
    }

    public function popup_product( Request $request) {
        $product_id = $request->product_id;
        $product = Product::where('product_id',$product_id)->first();
        if($product->inStock == 1){
            $inStock = 'Yes';
        }else{
            $inStock = 'No';
        }
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
                                <div class="simple-article size-5 grey">PRICE: <span class="color">'.$product->product_price.'.00</span></div>        
                            </div>
                            <div class="col-sm-6 col-sm-text-right">
                                <div class="rate-wrapper align-inline">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <div class="simple-article size-2 align-inline">128 Reviews</div>
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
                            <div class="col-sm-3">
                                <div class="h6 detail-data-title size-1">quantity:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="quantity-select">
                                    <span class="minus"></span>
                                    <span class="number">1</span>
                                    <span class="plus"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row m5 col-xs-b40">
                            <div class="col-sm-6 col-xs-b10 col-sm-b0">
                                <a class="button size-2 style-2 block" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="client/img/icon-2.png" alt=""></span>
                                        <span class="text">add to cart</span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <form style="margin:0px;padding:0px" method="POST" class="add_wish_list_form" data-id="'.$product->product_id.'">
                                    <input type="hidden" name="product_id" class="product_id_'.$product->product_id.'" value="'.$product->product_id.'">                                                    
                                    <input type="hidden" name="_token" class="token_'.$product->product_id.'" value="'.csrf_token().'">  
                                    <a type="submit" class="button size-2 style-1 block noshadow">
                                        <span class="button-wrapper">
                                            <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                            <span class="text">add to favourites</span>
                                        </span>
                                    </a>
                                </form>
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
