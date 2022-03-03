<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function wish_list() {
        $products = DB::select('select * from wish_list where user_id = ?', [session('user_id')]);
        return view('client.products', compact('products'));
    }
}
