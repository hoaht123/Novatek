<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist;

class UserController extends Controller
{
    public function wish_list() {
        $products = DB::select('select * from wish_list where user_id = ?', [session('user_id')]);
        return view('client.products', compact('products'));
    }

    public function add_wish_list(Request $request) {
        dd(session('user_id'));
        $data = $request->all();
        $product_id = $data['product_id'];
        $user_id = session('user_id');
        if($user_id == null) {
            return response()->json(['status' => 'failed', 'message' => 'You must login'])->header('Content-Type', 'application/json');
        }
        $wish_list = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if(!empty($wish_list)>0 ){
            DB::delete('delete from wish_list where user_id = ? and product_id = ?', [$user_id, $product_id]);
            return response()->json(['status' => 'deleted', 'message' => 'Product removed from wish list'])->header('Content-Type', 'application/json');
        }else{
            $wish_list = new Wishlist();
            $wish_list->user_id = $user_id;
            $wish_list->product_id = $product_id;
            $wish_list->save();
            return response()->json(['status' => 'added', 'message' => 'Product added to wish list'])->header('Content-Type', 'application/json');
        }
    }
}
