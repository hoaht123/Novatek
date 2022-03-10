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
}
