<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Social;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin/login');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function create_product(){
        $this->AuthLogin();
        return view('admin.product.create_product');
    }
    public function login(){
        return view('admin.login.login');
    }
    
    public function view_user(){
        $this->AuthLogin();
        $admin_id = Session::get('admin_id');
        $users = Users::whereNotIn('user_id', [$admin_id])->get();
        return view('admin.users.view_user',compact('users'));
    }

    public function checkLogin(Request $request){
        $data = $request->all();
        $check = DB::table('Users')->where('email',$data['admin_email'])->where('password',md5($data['admin_password']))->where('roles','0')->first();
        if($check){
            Session::put('admin_name',$check->name);
            Session::put('admin_id',$check->user_id);
            return Redirect::to('admin');
        }else{
            Session::put('message','Try again!');
            return Redirect::back();
        }
    }

    public function delete_user($user_id){
        Users::find($user_id)->delete();
        Session::put('message','Delete user successfully');
        return Redirect::to('admin/view_user');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('admin/login');
    }

    public function view_contact(){
        $contacts = DB::table('contact')->get();
        return view('admin.view_contact',compact('contacts'));
    }

}
