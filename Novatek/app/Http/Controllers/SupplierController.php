<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Social;
use Laravel\Socialite\Facades\Socialite;
session_start();

class SupplierController extends Controller
{
    public function create_supplier(){
        return view('admin.supplier.create_supplier');
    }

    public function save_supplier(Request $request){
        $data = $request->all();
        $supplier = array();
        $supplier['supplier_name'] = $data['supplier_name'];
        $supplier['supplier_address'] = $data['supplier_address'];
        $supplier['supplier_phone'] = $data['supplier_phone'];
        DB::table('Suppliers')->insert($supplier);
        Session::put('message','Create supplier successfully');
        return Redirect::to('admin/view_supplier');
    }

    public function view_supplier(){
        $suppliers = DB::table('Suppliers')->get();
        return view('admin.supplier.view_supplier',compact('suppliers'));
    }

    public function update_supplier($supplier_id){
        $suppliers = DB::table('Suppliers')->where('supplier_id',$supplier_id)->first();
        return view('admin.supplier.update_supplier',compact('suppliers'));
    }


    public function saveUpdate_supplier(Request $request,$supplier_id){
        $data = $request->all();
        $supplier = array();
        $supplier['supplier_name'] = $data['supplier_name'];
        $supplier['supplier_address'] = $data['supplier_address'];
        $supplier['supplier_phone'] = $data['supplier_phone'];
        DB::table('Suppliers')->where('supplier_id',$supplier_id)->update($supplier);
        Session::put('message','Update supplier successfully');
        return Redirect::to('admin/view_supplier');
    }
}
