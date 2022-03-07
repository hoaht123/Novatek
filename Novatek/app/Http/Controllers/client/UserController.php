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
        $data = $request->all();
        $product_id = $data['product_id'];
        $user_id = session('user_id');
        $wish_list = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        dd($wish_list);
        if(count($wish_list)>0 ){
            DB::delete('delete from wish_list where user_id = ? and product_id = ?', [$user_id, $product_id]);
            return 'remove';
        }else{
            $wish_list = new Wishlist();
            $wish_list->user_id = $user_id;
            $wish_list->product_id = $product_id;
            $wish_list->save();
            return 'add';
        }
    }
}
