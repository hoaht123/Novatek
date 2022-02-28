<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recursive;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class ProductController extends Controller
{   
    private $component='';
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');
        }else{
            return Redirect::to('admin/login')->send();
        }
    }

    public function getCategory($parent_id){
        $recursive = new Recursive();
       $htmlOption = $recursive->categoryRecursive($parent_id);
        return $htmlOption;
    }
    
    public function create_ram(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','Ram')->first();
        $category = DB::select('select * from categories where category_name like "Ram" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.ram',compact('supplier','category','brand'));
    }
    public function create_gpu(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','gpu')->first();
        $category = DB::select('select * from categories where category_name like "gpu" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.gpu',compact('supplier','category','brand'));
    }
    public function create_motherboard(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','motherboard')->first();
        $category = DB::select('select * from categories where category_name like "motherboard" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.motherboard',compact('supplier','category','brand'));
    }
    public function create_psu(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','psu')->first();
        $category = DB::select('select * from categories where category_name like "psu" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.psu',compact('supplier','category','brand'));
    }
    public function create_storage(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','storage')->first();
        $category = DB::select('select * from categories where category_name like "storage" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.storage',compact('supplier','category','brand'));
    }
    public function create_mouse(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','mouse')->first();
        $category = DB::select('select * from categories where category_name like "mouse" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.mouse',compact('supplier','category','brand'));
    }
    public function create_cpu(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','CPU')->first();
        $category = DB::select('select * from categories where category_name like "CPU" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.cpu',compact('supplier','category','brand'));
    }
    public function create_keyboard(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','keyboard')->first();
        $category = DB::select('select * from categories where category_name like "keyboard" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.keyboard',compact('supplier','category','brand'));
    }
    public function create_headphone(){
        $this->AuthLogin();
        $supplier = Supplier::all();
        $cate = Category::where('category_name','like','headphone')->first();
        $category = DB::select('select * from categories where category_name like "headphone" or parent_id ='. $cate->category_id);
        // $parent_id='';
        // $htmlOption = $this->getCategory($parent_id);
        $brand = Brand::all();
        return view('admin.product.create_product.headphone',compact('supplier','category','brand'));
    }
    
    public function getComponent($category_id){
        $category = Category::where('category_id',$category_id)->first();
        if ($category->parent_id==0){         
            $this->component=$category->category_name;
            return $this->component;
        }
        else{
            $recursive = new Recursive();
            $this->component=$recursive->getCategoryParent($category->parent_id);
            return $this->component;
        }
    }

    public function save_product(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = Str::slug($data['product_name'],'-');
        $data['category_id'] = $request->category;
        $data['component'] = $this->getComponent($data['category_id']);
        $data['brand_id'] = $request->brand;
        $data['supplier_id'] = $request->supplier;
        $data['product_price'] = $request->product_price;
        $data['product_sku'] = $request->product_sku;
        $data['product_descriptions'] = $request->product_description;
        $data['product_sort_descriptions'] = $request->product_sort_description;
        $data['product_isHot'] = 1;
        $data['product_isNew'] = 1;
        $data['product_inStock'] = 1;
        $data['product_status'] = 0;
        $get_image_gallery = $request->file('product_image_gallery');
        $get_image_main = $request->file('product_image_main');
        // echo '<pre>';
        // print_r($data);
        // die();
        // echo '</pre>';
        
        if($get_image_main == true && $get_image_gallery == true){
            //main
            $get_name_image = $get_image_main->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$get_name_image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension = explode('.',$get_name_image);
            $get_extension = end($extension);
            $extensionChange = strtolower($get_extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            //gallery
            $get_name_image_gallery = $get_image_gallery->getClientOriginalName();// lấy tên file
            $name_image_gallery = current(explode('.',$get_name_image_gallery));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension_gallery = explode('.',$get_name_image_gallery);
            $get_extension_gallery = end($extension_gallery);
            $extensionChange_gallery = strtolower($get_extension_gallery);
            if(in_array($extensionChange,$extensionArray) && in_array($extensionChange_gallery,$extensionArray)){
                $new_image = $name_image.rand(0,9999) . '.' . $get_image_main->getClientOriginalExtension(); //hàm lấy đuôi file
                $new_image_gallery = $name_image_gallery.rand(0,99) . '.' . $get_image_gallery->getClientOriginalExtension();
                $stored = $get_image_main->move(public_path().'/images/product', $new_image);
                $store_gallery = $get_image_gallery->move(public_path().'/images/product', $new_image_gallery);
                $data['product_main_image'] = $new_image;
                $data['product_image_gallery'] = $new_image_gallery;
                if(strcasecmp($data['component'], 'Ram')==0){
                    $ram = array();
                    $ram['ram_type'] = $request->ram_type;
                    $ram['memory_size'] = $request->memory_size;
                    $ram['ram_speed'] = $request->ram_speed;
                    $ram['ram_bandwidth'] = $request->ram_bandwidth;
                    DB::table('ram')->insert($ram);
                    $data['spec_ram'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'CPU')==0){
                    $cpu = array();
                    $cpu['cpu_socket'] = $request->cpu_socket;
                    $cpu['cpu_speed'] = $request->cpu_speed;
                    $cpu['cpu_core'] = $request->cpu_core;
                    $cpu['cpu_thread'] = $request->cpu_thread;
                    $cpu['cpu_cache'] = $request->cpu_cache;
                    DB::table('cpu')->insert($cpu);
                    $data['spec_cpu'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'GPU')==0){
                    $gpu = array();
                    $gpu['gpu_type'] = $request->gpu_type;
                    $gpu['gpu_speed'] = $request->gpu_speed;
                    $gpu['gpu_memory'] = $request->gpu_memory;
                    DB::table('gpu')->insert($gpu);
                    $data['spec_gpu'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'storage')==0){
                    $storage = array();
                    $storage['storage_type'] = $request->storage_type;
                    $storage['storage_speed'] = $request->storage_speed;
                    $storage['storage_capacity'] = $request->storage_capacity;
                    DB::table('storage')->insert($storage);
                    $data['spec_storage'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'PSU')==0){
                    $psu = array();
                    $psu['psu_type'] = $request->psu_type;
                    $psu['psu_power'] = $request->psu_power;
                    $psu['psu_efficiency'] = $request->psu_efficiency;
                    DB::table('psu')->insert($psu);
                    $data['spec_psu'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'Mouse')==0){
                    $mouse = array();
                    $mouse['mouse_type'] = $request->mouse_type;
                    $mouse['mouse_dpi'] = $request->mouse_dpi;
                    $mouse['mouse_wireless'] = $request->mouse_wireless;
                    DB::table('mouse')->insert($mouse);
                    $data['spec_mouse'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'Keyboard')==0){
                    $keyboard = array();
                    $keyboard['keyboard_qty'] = $request->keyboard_qty;
                    $keyboard['keyboard_wireless'] = $request->keyboard_wireless;
                    $keyboard['keyboard_color'] = $request->keyboard_color;
                    $keyboard['keyboard_switch'] = $request->keyboard_switch;
                    DB::table('keyboard')->insert($keyboard);
                    $data['spec_keyboard'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'Headphone')==0){
                    $headphone = array();
                    $headphone['headphone_type'] = $request->headphone_type;
                    $headphone['headphone_wireless'] = $request->headphone_wireless;
                    $headphone['headphone_micro'] = $request->headphone_micro;
                    DB::table('headphone')->insert($headphone);
                    $data['spec_headphone'] = DB::getPdo()->lastInsertId();
                }
                else if(strcasecmp($data['component'], 'Case')==0){
                    $case = array();
                    $case['case_type'] = $request->case_type;
                    $case['case_size'] = $request->case_size;
                    $case['case_brand'] = $request->case_brand;
                    DB::table('case')->insert($case);
                }
                else if(strcasecmp($data['component'], 'Motherboard')==0){
                    $motherboard = array();
                    $motherboard['motherboard_size'] = $request->motherboard_size;
                    $motherboard['motherboard_socket'] = $request->motherboard_socket;
                    $motherboard['motherboard_chipset'] = $request->motherboard_chipset;
                    DB::table('motherboard')->insert($motherboard);
                    $data['spec_motherboard'] = DB::getPdo()->lastInsertId();
                }
                DB::table('product')->insert($data);
                
                Session::put('message', 'Create product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        }else{
            Session::put('message', 'Create product failed. Try again');
            return Redirect::to('admin/view_product');
        }
        
    }


    public function view_product(){
        $this->AuthLogin();
        $product = Product::paginate(10);
        $category = Category::where('parent_id', '=', 0)->get();
        $brand = Brand::all();
        $supplier = Supplier::all();
        return view('admin.product.view_product',compact('product','category','brand','supplier'));
    }

    public function view_product_cate($category_name){
        $this->AuthLogin();
        $category = Category::where('parent_id', '=', 0)->get();
        $product = Product::where('component',$category_name)->paginate(10);
        $brand = Brand::all();
        $supplier = Supplier::all();
        return view('admin.product.category_product',compact('product','category','brand','supplier'));
    }

    public function view_product_brand($brand_id){
        $this->AuthLogin();
        $product = Product::where('brand_id',$brand_id)->paginate(10);
        $category = Category::all();
        $brand = Brand::all();
        $supplier = Supplier::all();
        return view('admin.product.category_product',compact('product','category','brand','supplier'));
    }

    public function view_product_supplier($supplier_id){
        $this->AuthLogin();
        $product = Product::where('supplier_id',$supplier_id)->paginate(10);
        $category = Category::all();
        $brand = Brand::all();
        $supplier = Supplier::all();
        return view('admin.product.category_product',compact('product','category','brand','supplier'));
    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Show product successfully');
        return Redirect::to('admin/view_product');
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Hide product successfully');
        return Redirect::to('admin/view_product');
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        Product::find($product_id)->delete();
        Session::put('message','Delete product successfully');
        return Redirect::to('admin/view_product');
    }


    public function product_details($product_id){
        $this->AuthLogin();
        $product = Product::where('product_id',$product_id)->get();
        return view('admin.product.product_details',compact('product'));
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $product = Product::where('product_id',$product_id)->first();
        $suppliers = Supplier::all();
        // $category = Category::find($product->category_id);
        // $htmlOption = $this->getCategory($product->category_id);
        $brands = Brand::all();
        if(strcasecmp($product->component, 'cpu')==0){
            $cpu = DB::table('cpu')->where('id',$product->spec_cpu)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.cpu',compact('product','suppliers','categories','brands','cpu'));
        }
        if(strcasecmp($product->component, 'gpu')==0){
            $gpu = DB::table('gpu')->where('id',$product->spec_gpu)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.gpu',compact('product','suppliers','categories','brands','gpu'));
        }
        if(strcasecmp($product->component, 'ram')==0){
            $ram = DB::table('ram')->where('id',$product->spec_ram)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.ram',compact('product','suppliers','categories','brands','ram'));
        }
        if(strcasecmp($product->component, 'storage')==0){
            $storage = DB::table('storage')->where('id',$product->spec_storage)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.storage',compact('product','suppliers','categories','brands','storage'));
        }
        if(strcasecmp($product->component, 'case')==0){
            $case = DB::table('case')->where('id',$product->spec_case)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.case',compact('product','suppliers','categories','brands','case'));
        }
        if(strcasecmp($product->component, 'psu')==0){
            $psu = DB::table('psu')->where('id',$product->spec_psu)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.psu',compact('product','suppliers','categories','brands','psu'));
        }
        if(strcasecmp($product->component, 'headphone')==0){
            $headphone = DB::table('headphone')->where('id',$product->spec_headphone)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.headphone',compact('product','suppliers','categories','brands','headphone'));
        }
        if(strcasecmp($product->component, 'keyboard')==0){
            $keyboard = DB::table('keyboard')->where('id',$product->spec_keyboard)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.keyboard',compact('product','suppliers','categories','brands','keyboard'));
        }
        if(strcasecmp($product->component, 'mouse')==0){
            $mouse = DB::table('mouse')->where('id',$product->spec_mouse)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.mouse',compact('product','suppliers','categories','brands','mouse'));
        }
        if(strcasecmp($product->component, 'motherboard')==0){
            $motherboard = DB::table('motherboard')->where('id',$product->spec_motherboard)->first();
            $category = Category::find($product->category_id);
            $categories = Category::whereIn('category_id', [$product->category_id, $category->parent_id])->get();
            return view('admin.product.form_update.motherboard',compact('product','suppliers','categories','brands','motherboard'));
        }
        return view('admin.product.update_product',compact('product','suppliers','category','brands','htmlOption'));
    }
    
    public function save_update_product($product_id, Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = Str::slug($data['product_name'],'-');
        $data['category_id'] = $request->category;
        $data['component'] = $this->getComponent($data['category_id']);
        $data['brand_id'] = $request->brand;
        $data['supplier_id'] = $request->supplier;
        $data['product_price'] = $request->product_price;
        $data['product_sku'] = $request->product_sku;
        $data['product_descriptions'] = $request->product_description;
        $data['product_sort_descriptions'] = $request->product_sort_description;
        $data['product_isHot'] = 1;
        $data['product_isNew'] = 1;
        $data['product_inStock'] = 1;
        $data['product_status'] = 0;
        $get_image_gallery = $request->file('product_image_gallery');
        $get_image_main = $request->file('product_image_main');
        // echo $get_image_gallery;
        // echo $get_image_main;
        // die();
        // echo '<pre>';
        // print_r($data);
        // die();
        // echo '</pre>';
        
        if($get_image_main){
            //main
            $get_name_image = $get_image_main->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$get_name_image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension = explode('.',$get_name_image);
            $get_extension = end($extension);
            $extensionChange = strtolower($get_extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            //gallery
            if(in_array($extensionChange,$extensionArray)){
                $new_image = $name_image.rand(0,9999) . '.' . $get_image_main->getClientOriginalExtension(); //hàm lấy đuôi file
                $stored = $get_image_main->move(public_path().'/images/product', $new_image);
                $data['product_main_image'] = $new_image;
                DB::table('Product')->where('product_id',$product_id)->update($data);
                
                Session::put('message', 'Update product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        // }else{
        //     Session::put('message', 'Create product failed. Try again');
        //     return Redirect::to('admin/view_product');
        }elseif($get_image_gallery){
            //gallery
            $get_name_image_gallery = $get_image_gallery->getClientOriginalName();// lấy tên file
            $name_image_gallery = current(explode('.',$get_name_image_gallery));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension_gallery = explode('.',$get_name_image_gallery);
            $get_extension_gallery = end($extension_gallery);
            $extensionChange_gallery = strtolower($get_extension_gallery);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            if(in_array($extensionChange_gallery,$extensionArray)){
                $new_image_gallery = $name_image_gallery.rand(0,999) . '.' . $get_image_gallery->getClientOriginalExtension();
                $store_gallery = $get_image_gallery->move(public_path().'/images/product', $new_image_gallery);
                $data['product_image_gallery'] = $new_image_gallery;
                DB::table('Product')->where('product_id',$product_id)->update($data);
                Session::put('message', 'Update product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        }elseif($get_image_main == true && $get_image_gallery == true){
            //main
            $get_name_image = $get_image_main->getClientOriginalName();// lấy tên file
            $name_image = current(explode('.',$get_name_image));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension = explode('.',$get_name_image);
            $get_extension = end($extension);
            $extensionChange = strtolower($get_extension);
            $extensionArray = ['jpg','jpeg','gif','tiff','psb','eps','png'];
            //gallery
            $get_name_image_gallery = $get_image_gallery->getClientOriginalName();// lấy tên file
            $name_image_gallery = current(explode('.',$get_name_image_gallery));// cắt tên file thành nhiều phần tử, lấy phần tử đầu
            $extension_gallery = explode('.',$get_name_image_gallery);
            $get_extension_gallery = end($extension_gallery);
            $extensionChange_gallery = strtolower($get_extension_gallery);
            if(in_array($extensionChange,$extensionArray) && in_array($extensionChange_gallery,$extensionArray)){
                $new_image = $name_image.rand(0,9999) . '.' . $get_image_main->getClientOriginalExtension(); //hàm lấy đuôi file
                $new_image_gallery = $name_image_gallery.rand(0,99) . '.' . $get_image_gallery->getClientOriginalExtension();
                $stored = $get_image_main->move(public_path().'/images/product', $new_image);
                $store_gallery = $get_image_gallery->move(public_path().'/images/product', $new_image_gallery);
                $data['product_main_image'] = $new_image;
                $data['product_image_gallery'] = $new_image_gallery;
                $product = Product::find($product_id);
                if(strcasecmp($data['component'], 'Ram')==0){
                    $ram = array();
                    $ram['ram_type'] = $request->ram_type;
                    $ram['memory_size'] = $request->memory_size;
                    $ram['ram_speed'] = $request->ram_speed;
                    $ram['ram_bandwidth'] = $request->ram_bandwidth;
                    DB::table('ram')->where('id',$product->spec_ram)->update($ram);
                }
                else if(strcasecmp($data['component'], 'CPU')==0){
                    $cpu = array();
                    $cpu['cpu_socket'] = $request->cpu_socket;
                    $cpu['cpu_speed'] = $request->cpu_speed;
                    $cpu['cpu_core'] = $request->cpu_core;
                    $cpu['cpu_thread'] = $request->cpu_thread;
                    $cpu['cpu_cache'] = $request->cpu_cache;
                    DB::table('cpu')->where('id',$product->spec_cpu)->update($cpu);
                }
                else if(strcasecmp($data['component'], 'GPU')==0){
                    $gpu = array();
                    $gpu['gpu_type'] = $request->gpu_type;
                    $gpu['gpu_speed'] = $request->gpu_speed;
                    $gpu['gpu_memory'] = $request->gpu_memory;
                    DB::table('gpu')->where('id',$product->spec_gpu)->update($gpu);
                }
                else if(strcasecmp($data['component'], 'storage')==0){
                    $storage = array();
                    $storage['storage_type'] = $request->storage_type;
                    $storage['storage_speed'] = $request->storage_speed;
                    $storage['storage_capacity'] = $request->storage_capacity;
                    DB::table('storage')->where('id',$product->spec_storage)->update($storage);
                }
                else if(strcasecmp($data['component'], 'PSU')==0){
                    $psu = array();
                    $psu['psu_type'] = $request->psu_type;
                    $psu['psu_power'] = $request->psu_power;
                    $psu['psu_efficiency'] = $request->psu_efficiency;
                    DB::table('psu')->where('id',$product->spec_psu)->update($psu);
                }
                else if(strcasecmp($data['component'], 'Mouse')==0){
                    $mouse = array();
                    $mouse['mouse_type'] = $request->mouse_type;
                    $mouse['mouse_dpi'] = $request->mouse_dpi;
                    $mouse['mouse_wireless'] = $request->mouse_wireless;
                    DB::table('mouse')->where('id',$product->spec_mouse)->update($mouse);
                }
                else if(strcasecmp($data['component'], 'Keyboard')==0){
                    $keyboard = array();
                    $keyboard['keyboard_qty'] = $request->keyboard_qty;
                    $keyboard['keyboard_wireless'] = $request->keyboard_wireless;
                    $keyboard['keyboard_color'] = $request->keyboard_color;
                    $keyboard['keyboard_switch'] = $request->keyboard_switch;
                    DB::table('keyboard')->where('id',$product->spec_keyboard)->update($keyboard);
                }
                else if(strcasecmp($data['component'], 'Headphone')==0){
                    $headphone = array();
                    $headphone['headphone_type'] = $request->headphone_type;
                    $headphone['headphone_wireless'] = $request->headphone_wireless;
                    $headphone['headphone_micro'] = $request->headphone_micro;
                    DB::table('headphone')->where('id',$product->spec_headphone)->update($headphone);
                }
                else if(strcasecmp($data['component'], 'Case')==0){
                    $case = array();
                    $case['case_type'] = $request->case_type;
                    $case['case_size'] = $request->case_size;
                    $case['case_brand'] = $request->case_brand;
                    DB::table('case')->where('id',$product->spec_case)->update($case);
                }
                else if(strcasecmp($data['component'], 'Motherboard')==0){
                    $motherboard = array();
                    $motherboard['motherboard_size'] = $request->motherboard_size;
                    $motherboard['motherboard_socket'] = $request->motherboard_socket;
                    $motherboard['motherboard_chipset'] = $request->motherboard_chipset;
                    DB::table('motherboard')->where('id',$product->spec_motherboard)->update($motherboard);
                }
                DB::table('Product')->where('product_id',$product_id)->update($data);
                
                Session::put('message', 'Update product successfully');
                return Redirect::to('admin/view_product');
            }else{
            Session::put('message','File is incorrect . Try again');
            return Redirect::to('admin/view_product');
            }
        }else{
            DB::table('Product')->where('product_id',$product_id)->update($data);
            Session::put('message', 'Update product successfully');
            return Redirect::to('admin/view_product');
        } 
    }

    
}
