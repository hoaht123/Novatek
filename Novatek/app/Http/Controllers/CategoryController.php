<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Components\Recursive;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class CategoryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }else{
            return Redirect::to('admin/login')->send();
        }
    }

    public function getCategory($parent_id){
        $data = Category::all();
        $recursive = new Recursive($data);
       $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }

    public function create_category(){
        $this->AuthLogin();
        $parent_id='';
        $htmlOption = $this->getCategory($parent_id);
        return view('admin.category.create_category', compact('htmlOption'));
    }

    public function save_category(Request $request){
        $data = $request->all();
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->parent_id = $data['parent_id'];
        $category->category_slug =Str::slug($data['category_name'], '-');
        $category->category_status = $data['category_status'];
        $category->save();
        Session::put('message','Create category successfully');
        return Redirect::to('admin/view_category');
        
    }

    public function view_category(){
        $this->AuthLogin();
        $category = Category::all();
        return view('admin.category.view_category',compact('category'));
    }

    public function active_category($category_id){
        $this->AuthLogin();
        DB::table('categories')->where('category_id',$category_id)->update(['category_status'=>0]);
        Session::put('message','Show category successfully');
        return Redirect::to('admin/view_category');
    }

    public function unactive_category($category_id){
        $this->AuthLogin();
        DB::table('categories')->where('category_id',$category_id)->update(['category_status'=>1]);
        Session::put('message','Hide category successfully');
        return Redirect::to('admin/view_category');
    }

    public function edit($id)
    { 
          $this->AuthLogin();
        $category = Category::find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.categories.edit', compact('category', 'htmlOption'));
    }

    public function update_category($category_id){
        $this->AuthLogin();
        $category = Category::find($category_id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.update_category',compact('category','htmlOption'));
    }

    public function saveUpdate_category(Request $request , $category_id){
        $this->AuthLogin();
        $data = $request->all();
        DB::table('categories')->where('category_id',$category_id)->update(['category_name'=>$data['category_name'],'parent_id' =>$data['parent_id']]);
        Session::put('message','Update category successfully');
        return Redirect::to('admin/view_category');
    }

    public function delete_category($category_id){
        DB::table('categories')->where('category_id',$category_id)->delete();
        Session::put('message','Delete category successfully');
        return Redirect::to('admin/view_category');
    }
    public function search(Request $request){
        $keyword = $request->keyword;
        $category = Category::where('category_name','like','%'.$keyword.'%')->get();
        return view('admin.category.view_category',compact('category'));
    }
}
