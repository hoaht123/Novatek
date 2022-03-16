<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Components\product_popup;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function products()
    {
        $categories = Category::where('parent_id',0)->get();
        $products = DB::table('product')->inRandomOrder()->paginate(12);
        $brands = DB::table('product')->leftJoin('brands','product.brand_id','=','brands.brand_id')->select('brands.brand_id','brands.brand_name')->groupBy('brands.brand_id','brands.brand_name')->get();
        $total = count(Product::where('product_status',0)->get());
        return view('client.products', compact('categories','products','total','brands'));
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
        $total = count(Product::whereIn('category_id',$arr)->get());
        return view('client.products', compact('categories','brands','products','total'));
    }

    public function tag_clicked($category_id){
        $brands = Brand::all();
        $categories = Category::where('category_id',$category_id)->get();
        $products = Product::where('category_id',$category_id)->paginate(9);
        $total = count(Product::where('category_id',$category_id)->get());
        return view('client.products', compact('categories','brands','products','total'));
    }

    public function product_price( $min, $max, Request $request ){
        $price = array();
        $price[0] = $min;
        $price[1] = $max;
        $brands = Brand::all();
        $categories = Category::where('parent_id',0)->get();
        $products = Product::where('product_price','>=',$min)->where('product_price','<=',$max)->paginate(9);
        $total = count(Product::whereIn('product_price',$price)->get());
        return view('client.products', compact('categories','brands','products','total'));
    }

    public function popup_product( Request $request) {
        $product_id = $request->product_id;
        $product = Product::where('product_id',$product_id)->first();
        if($product->inStock == 1){
            $inStock = 'outStock';
        }else{
            $inStock = 'inStock';
        }
        $htmlPopupProduct = new  product_popup();
        return $htmlPopupProduct->htmlPopupProduct($product,$inStock);
    }
}
