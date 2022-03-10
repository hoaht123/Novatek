<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function wish_list() {
        $brands = Brand::all();
        $categories = Category::all();
        $products = DB::table('wish_list')->join('product', 'wish_list.product_id', '=', 'product.product_id')->where('user_id', session('user_id'))->paginate(9);
        return view('client.products', compact('products','brands','categories'))->with(['title'=>'Wish List']);
    }

    public function add_wish_list(Request $request) {
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


    public function information_user(){
        $invoices = DB::table('invoices')->where('user_id', Session::get('user_id'))->get();
        $user = DB::table('users')->where('user_id', '=', Session::get('user_id'))->first();
        return view('client.information_user',compact('user','invoices'));
    }
    public function update_infor_user(Request $request , $user_id){
        $data = $request->all();
        $user = Users::find($user_id);
        $user['name'] = $data['user_name'];
        $user['phone'] = $data['user_phone'];
        $user['address'] = $data['user_address'];
        $user->save();
        Session::put('update_success','Update information successfully');
        return Redirect::back();
    }
    public function change_password(Request $request, $user_id){
        $data = $request->all();
        $check_password = DB::table('users')->where('user_id', $user_id)->where('password',md5( $data['old_password']))->first();
        if(!$check_password){
            Session::put('change_password','Your password is incorrect');
            return Redirect::back();
        }else{
            $change_password = Users::find($user_id);
            $change_password['password'] = md5($data['new_password']);
            $change_password->save();
            Session::put('change_password_success','Change password successfully');
            return Redirect::back();
        }
    }
}
